<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['NombreEtiqueta'])){
        $query = "UPDATE etiquetas SET etiquetas.Nombre = '".$_GET['NombreEtiqueta']."' WHERE etiquetas.Id_Etiqueta = ".$_GET['idEtiqueta'];
        
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }

    header("Location: ../Views/Administrador/EtiquetasAdmin.php");
?>