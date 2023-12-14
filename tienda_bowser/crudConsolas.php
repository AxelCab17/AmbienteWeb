<?php
include 'sql/conexion.php';

// CREATE CONSOLA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_consola"])) {
    $conn = Conecta();
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];
    $activo = isset($_POST["activo"]) ? 1 : 0;

    $sql = "INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo) 
            VALUES ('$nombre', $precio, $existencias, '$ruta_imagen', $activo)";

    if ($conn->query($sql) === TRUE) {
        echo "Consola creada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Desconecta($conn);
    header("Location: listar_consolas.php");
    exit();
}

// READ CONSOLA
$conn = Conecta();
$sql = "SELECT * FROM tiendabowser.consola";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>
            <h2 class='text-center text-white'>Listado de Consolas</h2>
            <table class='table table-bordered table-hover'>
                <thead class='thead-light'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Imagen</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td class='text-white'>" . $row["id_consola"] . "</td>
                <td class='text-white'>" . $row["nombre"] . "</td>
                <td class='text-white'>$" . $row["precio"] . "</td>
                <td class='text-white'>" . $row["existencias"] . "</td>
                <td><img src='" . $row["ruta_imagen"] . "' alt='Imagen de la consola' class='img-thumbnail' style='max-width: 100px; max-height: 100px;'></td>
                <td class='text-white'>" . ($row["activo"] == 1 ? 'Sí' : 'No') . "</td>
            </tr>";
    }

    echo "</tbody>
        </table>
    </div>";
} else {
    echo "<p class='text-center mt-5 text-white'>No hay consolas en la base de datos.</p>";
}

Desconecta($conn);

// UPDATE CONSOLA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_consola"])) {
    $conn = Conecta();
    
    $id_consola = $_POST["id_consola"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $ruta_imagen = $_POST["ruta_imagen"];
    $activo = isset($_POST["activo"]) ? 1 : 0;

    $sql = "UPDATE tiendabowser.consola 
            SET nombre='$nombre', precio=$precio, existencias=$existencias, ruta_imagen='$ruta_imagen', activo=$activo 
            WHERE id_consola=$id_consola";

    if ($conn->query($sql) === TRUE) {
        echo "Consola actualizada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Desconecta($conn);
    header("Location: listar_consolas.php");
    exit();
}
// DELETE CONSOLA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_consola"])) {
    $conn = Conecta();

    $id_consola = $_POST["id_consola"];

    $sql = "DELETE FROM tiendabowser.consola WHERE id_consola=$id_consola";

    if ($conn->query($sql) === TRUE) {
        echo "Consola eliminada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Desconecta($conn);
    header("Location: listar_consolas.php");
    exit();
}