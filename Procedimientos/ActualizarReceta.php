<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['NombreReceta'])){
        if(!empty($_GET['PrecioReceta'])){
            $query = "UPDATE recetas SET recetas.Nombre = '".$_GET['NombreReceta']."', recetas.Precio_Prom = ".$_GET['PrecioReceta']." WHERE recetas.Id_Receta = ".$_GET['idReceta'];
        }
        else{
            $query = "UPDATE recetas SET recetas.Nombre = '".$_GET['NombreReceta']."' WHERE recetas.Id_Receta = ".$_GET['idReceta'];
        }
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }

    header("Location: ../Views/Administrador/RecetasAdmin.php");
?>