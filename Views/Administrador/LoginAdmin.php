<?php include("../../Include/Header.php") ?>

    <div class="text-center">
        <h1 class="display-4 m-3">Login Administrador</h1>
        <hr class="border border-dark"/>
    </div>

    <div class="container d-flex justify-content-center">
        <form class="border border-dark rounded p-3 m-3" action="IndexAdmin.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2">                
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

<?php include("../../Include/Footer.php") ?>