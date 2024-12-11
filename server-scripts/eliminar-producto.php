<?php
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id = $_GET["id"];
    if(!empty($id)){
        include "conDB.php";
        $stmt = $conn->prepare("DELETE FROM producto WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("location:../respuestas/exito.html");
        } else {
            header("location:../respuestas/error.html");
        }
        // cerrar conexion
        $stmt->close();
        $conn->close();

    }
}
?>