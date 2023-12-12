<?php
include 'sql/conexion.php';

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $conn = Conecta();
    $nombre = $_POST["nombre"];
    $consola = $_POST["consola"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];
    $activo = isset($_POST["activo"]) ? 1 : 0;

    $sql = "INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo) VALUES ('$nombre', '$consola', $precio, $existencias, '$ruta_imagen', $activo)";

    if ($conn->query($sql) === TRUE) {
        echo "Juego creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    Desconecta($conn);
    header("Location: listar_juegos.php");
    exit();
}

// READ
$conn = Conecta();
$sql = "SELECT * FROM tiendabowser.juego";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Listado de Juegos</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Consola</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th>Imagen</th>
                <th>Activo</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_juego"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["consola"] . "</td>
                <td>" . $row["precio"] . "</td>
                <td>" . $row["existencias"] . "</td>
                <td><img src='" . $row["ruta_imagen"] . "' alt='Imagen de la consola' style='max-width: 100px; max-height: 100px;'></td>
                <td>" . ($row["activo"] == 1 ? 'Sí' : 'No') . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No hay juegos en la base de datos.";
}

Desconecta($conn);  // Asegurarse de cerrar la conexión después de realizar todas las operaciones necesarias.


// UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $conn = Conecta();

    try {
        $id_juego = $_POST["id_juego"];
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
        $consola = isset($_POST["consola"]) ? $_POST["consola"] : '';
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : 0;
        $existencias = isset($_POST["existencias"]) ? $_POST["existencias"] : 0;
        $ruta_imagen = isset($_POST["ruta_imagen"]) ? $_POST["ruta_imagen"] : '';
        $activo = isset($_POST["activo"]) ? 1 : 0;

        $sql = "UPDATE tiendabowser.juego SET nombre=?, consola=?, precio=?, existencias=?, ruta_imagen=?, activo=? WHERE id_juego=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdiisi", $nombre, $consola, $precio, $existencias, $ruta_imagen, $activo, $id_juego);
        $stmt->execute();

        echo "Juego actualizado exitosamente.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt->close();
        Desconecta($conn);
    }
    header("Location: listar_juegos.php");
    exit();
}


// DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $conn = Conecta();

    try {
        $id_juego = $_POST["id_juego"];
        $sql = "DELETE FROM tiendabowser.juego WHERE id_juego=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_juego);
        $stmt->execute();

        echo "Juego eliminado exitosamente.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt->close();
        Desconecta($conn);
    }
    header("Location: listar_juegos.php");
    exit();
}
