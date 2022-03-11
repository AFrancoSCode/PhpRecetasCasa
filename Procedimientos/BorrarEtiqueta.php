<?php
    include("../Include/conexion.php");

    if(!empty($_GET['id'])){
        $query = "DELETE FROM etiquetas WHERE etiquetas.Id_Etiqueta = ".$_GET['id'];
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }

    header("Location: ../Views/Administrador/EtiquetasAdmin.php")
?>