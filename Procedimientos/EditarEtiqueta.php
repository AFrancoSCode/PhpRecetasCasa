<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['id'])){
        $query = "SELECT * FROM etiquetas WHERE etiquetas.Id_Etiqueta = ".$_GET['id'];
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    }
?>

<?php include("../Include/Header.php") ?>

    <div class="text-center">
        <h1 class="display-4 m-3">Editar: <?php echo $row['Nombre'] ?></h1>
        <hr class="border border-dark"/>
    </div>

    <div class="container d-flex justify-content-center">
        <form class="border border-dark rounded p-3 m-3" action="ActualizarEtiquetas.php">
            <input type="hidden" value="<?php echo $row['Id_Etiqueta'] ?>" name="idEtiqueta">
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" id="idEtiqueta" disabled>
            </div>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="NombreEtiqueta" required autocomplete="off">
            </div>
            <div class="d-grid gap-2">                
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="container">
        <a href="../Views/Administrador/EtiquetasAdmin.php" class="btn btn-primary mt-5">Regresar</a>
    </div>

    <script>
        <?php if(!empty($row['Id_Etiqueta'])){ ?> 
            document.getElementById('idEtiqueta').value = <?php echo $row['Id_Etiqueta'] ?>;
        <?php } ?>
        <?php if(!empty($row['Nombre'])){ ?>
            document.getElementById('Nombre').value = '<?php echo $row['Nombre'] ?>';
        <?php } ?>
    </script>

<?php include("../Include/Footer.php") ?>