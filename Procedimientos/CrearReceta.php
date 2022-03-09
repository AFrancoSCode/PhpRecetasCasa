<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['Validar'])){
        if(!empty($_GET['Precio'])) {
            $query = "INSERT INTO recetas(Nombre, Precio_Prom) VALUES ('".$_GET['Nombre']."', ".$_GET['Precio'].")";
        }
        else{
            $query = "INSERT INTO recetas(Nombre) VALUES ('".$_GET['Nombre']."')";
        }
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed!");
        }
    }
    $query_Etiqueta = "INSERT INTO recetasetiquetas(Id_Etiqueta, Id_Receta) VALUES (".$_GET['Etiqueta'].", (SELECT LAST_INSERT_ID()))";
    $result = mysqli_query($conn, $query_Etiqueta);
    if(!$result){
        die("Query Failed!");
    }

    header("Location: ../Views/Administrador/RecetasAdmin.php");
?>
