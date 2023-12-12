<?php
include 'sql/conexion.php';

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_accesorio"])) {
    $conn = Conecta();
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];
    $activo = isset($_POST["activo"]) ? 1 : 0;

    $sql = "INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo) VALUES ('$nombre', $precio, $existencias, '$ruta_imagen', $activo)";

    if ($conn->query($sql) === TRUE) {
        Desconecta($conn);
        // Redirección después de la creación exitosa
        header("Location: listar_accesorios.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// READ
$conn = Conecta();
$sql = "SELECT * FROM tiendabowser.accesorio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Listado de Accesorios</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th>Ruta Imagen</th>
                <th>Activo</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_accesorio"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["precio"] . "</td>
                <td>" . $row["existencias"] . "</td>
                <td><img src='" . $row["ruta_imagen"] . "' alt='Imagen de la consola' style='max-width: 100px; max-height: 100px;'></td>
                <td>" . ($row["activo"] == 1 ? 'Sí' : 'No') . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No hay accesorios en la base de datos.";
}

Desconecta($conn);
// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_accesorio"])) {
    $conn = Conecta();
    
    // Asegúrate de que todos los campos necesarios estén presentes en $_POST
    $id_accesorio = $_POST["id_accesorio"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];
    $activo = isset($_POST["activo"]) ? 1 : 0;

    // Evita inyección SQL utilizando sentencias preparadas
    $sql = "UPDATE tiendabowser.accesorio SET nombre=?, precio=?, existencias=?, ruta_imagen=?, activo=? WHERE id_accesorio=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdisii", $nombre, $precio, $existencias, $ruta_imagen, $activo, $id_accesorio);
    
    if ($stmt->execute()) {
        echo "Accesorio actualizado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
    Desconecta($conn);
    header("Location: listar_accesorios.php");
    exit();
}

// DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_accesorio"])) {
    $conn = Conecta();
    $id_accesorio = $_POST["id_accesorio"];

    $sql = "DELETE FROM tiendabowser.accesorio WHERE id_accesorio=$id_accesorio";

    if ($conn->query($sql) === TRUE) {
        echo "Accesorio eliminado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Desconecta($conn);
    header("Location: listar_accesorios.php");
    exit();
}

