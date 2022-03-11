<?php 
    include("../../Include/conexion.php");

    include("../../Include/Header.php");
?>

    <div class="text-center">
        <h1 class="display-4 m-3">Lista de Etiquetas Administrador</h1>
        <hr class="border border-dark"/>
    </div>

    <div class="container">
        <form class="row g-3 d-flex align-items-center justify-content-center" action="#" method="GET">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Nombre</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" name="Nombre" autocomplete="off">
            </div>
            <div class="col-auto">                
                <button type="submit" class="btn btn-primary" name="Validar" value="Validar">Validar</button>
            </div>
        </form>

        <div class="container tablalista mt-3">
            <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                    if(!empty($_GET['Validar']) && !empty($_GET['Nombre'])){
                        $query = "SELECT * FROM etiquetas WHERE etiquetas.Nombre = '".$_GET['Nombre']."'";
                    }
                    else
                    {
                        $query = "SELECT * FROM etiquetas";
                    }
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>

                    <tr>
                        <td><?php echo $row['Nombre'] ?></td>
                        <td class="d-flex justify-content-evenly"><a href="../../Procedimientos/EditarEtiqueta.php?id=<?php echo $row['Id_Etiqueta'] ?>" class="btn btn-secondary"><i class="bi bi-pen-fill"></i></a><a href="../../Procedimientos/BorrarEtiqueta.php?id=<?php echo $row['Id_Etiqueta'] ?>" class="btn btn-danger"><i class="bi bi-trash2-fill"></i></a></td>
                    </tr>

                <?php 
                    } 
                ?>
            </tbody>
            </table>
        </div>

        <div class="container">
            <h1>Crear nueva etiqueta</h1>
            <hr class="border border-dark">
            <form class="row g-3 d-flex align-items-center justify-content-center" action="../../Procedimientos/CrearEtiqueta.php" method="GET">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Nombre Receta</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputPassword6" class="form-control" name="Nombre" autocomplete="off" required>
                </div>
                <div class="col-auto">                
                    <button type="submit" class="btn btn-primary" name="Validar" value="Validar">Crear</button>
                </div>
            </form>
        </div>
        <a href="../Administrador/IndexAdmin.php" class="btn btn-primary mt-5">Regresar</a>
    </div>

<?php include("../../Include/Footer.php"); ?>