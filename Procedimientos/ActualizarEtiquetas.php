<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['etiquetaNueva']) && !empty($_GET['idReceta'])){
        $query = "INSERT INTO recetasetiquetas(Id_Etiqueta, Id_Receta) VALUES (".$_GET['etiquetaNueva'].", ".$_GET['idReceta'].")";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }

    // header('Location: ../Procedimientos/EditarReceta.php?id='.$_GET['idReceta']);
?>