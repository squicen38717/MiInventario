<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //datos del formulario
    $nombre =  $_POST["nombre"];
    $cantidad =  $_POST["cantidad"];
    $precio =  $_POST["precio"];

    if (!empty($nombre) && !empty($cantidad) && !empty($precio)) {
        //conectar
        include "conDB.php";
    
        // preparar
        $stmt = $conn->prepare("INSERT INTO producto (nombre, cantidad, precio) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $nombre, $cantidad, $precio); // string, integer, double

        // ejecutar
        if ($stmt->execute()) {
            echo "nuevo Registro.";
            header("location:../respuestas/exito.html");
        } else {
            echo "Error: " . $stmt->error;
            header("location:../respuestas/error.html");
        }

        // cerrar conexion
        $stmt->close();
        $conn->close();
    } else {
        echo "Ingreso inválido";
        header("location:../respuestas/error.html");
    }
} else {
    echo "Método inválido.";
    header("location:../respuestas/error.html");
}

?>
