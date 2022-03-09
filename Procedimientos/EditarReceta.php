<?php 
    include("../Include/conexion.php");

    if(!empty($_GET['id'])){
        $query = "SELECT * FROM recetas WHERE recetas.Id_Receta = ".$_GET['id'];
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
        <form class="border border-dark rounded p-3 m-3" action="ActualizarReceta.php">
            <input type="hidden" value="<?php echo $row['Id_Receta'] ?>" name="idReceta">
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="text" class="form-control" id="idReceta" disabled>
            </div>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="NombreReceta" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio Promedio</label>
                <input type="number" class="form-control" id="Precio" name="PrecioReceta" autocomplete="off">
            </div>
            <div class="d-grid gap-2">                
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>

        <form class="border border-dark rounded p-3 m-3" action="ActualizarEtiquetas.php">
            <input type="hidden" value="<?php echo $row['Id_Receta'] ?>" name="idReceta">
            <div class="mb-3">
                <p class="form-label">Etiquetas</p>
                <hr class="border border-primary">
            </div>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Lista de etiquetas</label>
                <select class="form-select">
                    <?php
                        $queryEtiqueta = "SELECT Id_Etiqueta, Nombre FROM etiquetas WHERE etiquetas.Id_Etiqueta IN (SELECT Id_Etiqueta FROM recetasetiquetas WHERE recetasetiquetas.Id_Receta = ".$row['Id_Receta'].")";
                        $result_tasksEtiquetas = mysqli_query($conn, $queryEtiqueta);

                        while($rowEtiqueta = mysqli_fetch_array($result_tasksEtiquetas)){ ?>

                        <option value="<?php echo $rowEtiqueta['Id_Etiqueta'] ?>"> <?php echo $rowEtiqueta['Nombre'] ?> </option>
                                    
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Asignar nueva etiqueta</label>
                <select class="form-select" name="etiquetaNueva" required>
                    <?php
                        $queryEtiqueta = "SELECT Id_Etiqueta, Nombre FROM etiquetas WHERE etiquetas.Id_Etiqueta NOT IN (SELECT Id_Etiqueta FROM recetasetiquetas WHERE recetasetiquetas.Id_Receta = ".$row['Id_Receta'].")";
                        $result_tasksEtiquetas = mysqli_query($conn, $queryEtiqueta);

                        while($rowEtiqueta = mysqli_fetch_array($result_tasksEtiquetas)){ ?>

                        <option value="<?php echo $rowEtiqueta['Id_Etiqueta'] ?>"> <?php echo $rowEtiqueta['Nombre'] ?> </option>
                                    
                    <?php } ?>
                </select>
            </div>
            <div class="d-grid gap-2">                
                <button type="submit" class="btn btn-primary">Asignar</button>
            </div>
        </form>
    </div>
    <div class="container">
        <a href="../Views/Administrador/RecetasAdmin.php" class="btn btn-primary mt-5">Regresar</a>
    </div>

    <script>
        <?php if(!empty($row['Id_Receta'])){ ?> 
            document.getElementById('idReceta').value = <?php echo $row['Id_Receta'] ?>;
        <?php } ?>
        <?php if(!empty($row['Nombre'])){ ?>
            document.getElementById('Nombre').value = '<?php echo $row['Nombre'] ?>';
        <?php } ?>
        <?php if(!empty($row['Precio_Prom'])){ ?>
            document.getElementById('Precio').value = <?php echo $row['Precio_Prom'] ?>;
        <?php } ?>
    </script>

<?php include("../Include/Footer.php") ?>