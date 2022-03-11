<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['Validar']) && !empty($_GET['Nombre'])){
        $query = "INSERT INTO etiquetas(Nombre) VALUES ('".$_GET['Nombre']."')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }

    header("Location: ../Views/Administrador/EtiquetasAdmin.php");
?>