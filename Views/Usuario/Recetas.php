<?php include("../../Include/Header.php"); ?>
<?php include("../../Include/conexion.php"); ?>

    <div class="text-center">
        <h1 class="display-4 m-3">Lista de Recetas</h1>
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
                <label for="inputPassword6" class="col-form-label">Etiquetas</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="Etiqueta">
                    <option value="" selected>Selecciona Etiqueta</option>
                    <?php
                        $query = "SELECT * FROM etiquetas";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>

                        <option value="<?php echo $row['Id_Etiqueta'] ?>"><?php echo $row['Nombre'] ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Precio</label>
            </div>
            <div class="col-auto">
                <input type="number" id="inputPassword6" class="form-control" name="Precio">
            </div>
            <div class="col-auto">                
                <button type="submit" class="btn btn-primary" name="Validar" value="Validar">Validar</button>
            </div>
        </form>

        <div class="container tablalista mt-3">
            <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th scope="col">Seleccionar</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio Promedio</th>
                <th scope="col">Etiquetas</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                    if(!empty($_GET['Validar'])){
                        if (!empty($_GET['Etiqueta'])){
                            $query = "SELECT recetas.Id_Receta, recetas.Nombre, recetas.Precio_Prom FROM recetas INNER JOIN recetasetiquetas ON recetas.Id_Receta = recetasetiquetas.Id_Receta AND recetasetiquetas.Id_Etiqueta = ".$_GET['Etiqueta'];
                            if (!empty($_GET['Nombre'])) $query = $query." AND recetasetiquetas.Id_Receta = (SELECT Id_Receta FROM recetas WHERE recetas.Nombre LIKE '%".$_GET['Nombre']."%')";
                            if (!empty($_GET['Precio'])) $query = $query." AND recetas.Precio_Prom = ".$_GET['Precio'];
                        }
                        else{
                            $query = "SELECT * FROM recetas WHERE ";
                            if (!empty($_GET['Nombre'])){
                                $query = $query."recetas.Nombre LIKE '%".$_GET['Nombre']."%'";
                                if (!empty($_GET['Precio'])) $query = $query." AND recetas.Precio_Prom = ".$_GET['Precio'];
                            }
                            else{
                                if (!empty($_GET['Precio'])){
                                    $query = $query."recetas.Precio_Prom = ".$_GET['Precio'];
                                }
                                else{
                                    $query = "SELECT * FROM recetas";
                                }
                            }
                        }
                    }
                    else
                    {
                        $query = "SELECT * FROM recetas";
                    }
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>

                    <tr>
                        <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                        <td><?php echo $row['Nombre'] ?></td>
                        <td><?php echo $row['Precio_Prom'] ?></td>
                        <td>
                            <select class="form-select">
                                <?php
                                    $queryEtiqueta = "SELECT Id_Etiqueta, Nombre FROM etiquetas WHERE etiquetas.Id_Etiqueta IN (SELECT Id_Etiqueta FROM recetasetiquetas WHERE recetasetiquetas.Id_Receta = ".$row['Id_Receta'].")";
                                    $result_tasksEtiquetas = mysqli_query($conn, $queryEtiqueta);

                                    while($rowEtiqueta = mysqli_fetch_array($result_tasksEtiquetas)){ ?>

                                    <option value="<?php echo $rowEtiqueta['Id_Etiqueta'] ?>"> <?php echo $rowEtiqueta['Nombre'] ?> </option>
                                    
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                <?php 
                    } 
                ?>
            </tbody>
            </table>
        </div>

        <div class="d-grid gap-2">
            <p class="mt-2">2 Elementos Seleccionados</p>
            <button class="disabled btn btn-primary" type="button">Confirmar</button>
        </div>
        <a href="../Usuario/Index.php" class="btn btn-primary mt-5">Regresar</a>
    </div>

<?php include("../../Include/Footer.php"); ?>