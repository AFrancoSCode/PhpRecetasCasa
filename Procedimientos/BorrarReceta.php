<?php
    include("../Include/conexion.php");

    if(!empty($_GET['id'])){
        $query = "DELETE FROM recetas WHERE recetas.Id_Receta = ".$_GET['id'];
        $borrarEtiqueta = "DELETE FROM recetasetiquetas WHERE recetasetiquetas.Id_Receta = ".$_GET['id'];
        $resultEtiqueta = mysqli_query($conn, $borrarEtiqueta);
        if(!$resultEtiqueta){
            die("Query Failed!");
        }
        $resultQuery = mysqli_query($conn, $query);
        if(!$resultQuery){
            die("Query Failed!");
        }
    }

    header("Location: ../Views/Administrador/RecetasAdmin.php")
?>