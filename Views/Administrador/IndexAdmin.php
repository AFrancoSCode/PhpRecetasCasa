<?php include("../../Include/Header.php") ?>

    <div class="text-center">
        <h1 class="display-4 m-3">Inicio Administrador</h1>
        <hr class="border border-dark"/>
    </div>

    <div class="container d-flex justify-content-center options">
        <a href="RecetasAdmin.php" class="d-flex align-items-center justify-content-center rounded">
            <div class="box-option rounded d-flex align-items-center justify-content-center">
                <i class="bi bi-apple"></i>    
                <h1 class="text-light display-4 text-center m-0">Recetas</h1>
            </div>
        </a>
        <a href="" class="d-flex align-items-center justify-content-center rounded">
            <div class="box-option rounded d-flex align-items-center justify-content-center">
                <i class="bi bi-calendar-week-fill"></i> 
                <h1 class="text-light display-4 text-center m-0">Historial</h1>
            </div>
        </a>
        <a href="" class="d-flex align-items-center justify-content-center rounded">
            <div class="box-option rounded d-flex align-items-center justify-content-center">
                <i class="bi bi-pencil-fill"></i>
                <h1 class="text-light display-4 text-center m-0" style="font-size: 50px;">Etiquetas</h1>
            </div>
        </a>
        <a href="" class="d-flex align-items-center justify-content-center rounded">
            <div class="box-option rounded d-flex align-items-center justify-content-center">
                <h1 class="text-danger display-4 text-center m-0">No definido</h1>
            </div>
        </a>
    </div>

<?php include("../../Include/Footer.php") ?>