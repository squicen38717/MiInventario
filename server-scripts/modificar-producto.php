<?php
include_once "conDB.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $cantidad = intval($_POST['cantidad']);
    $precio = floatval($_POST['precio']);

    $sql = "UPDATE producto SET nombre = '$nombre', cantidad = $cantidad, precio = $precio WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../inventario.php?status=success");
    } else {
        header("Location: ../inventario.php?status=error");
    }

    $conn->close();
}
?>
