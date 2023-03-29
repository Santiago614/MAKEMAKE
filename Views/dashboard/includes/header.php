<?php
require "../../Controllers/php/users/usuarios.php";
$respGetUserData = GetUsuario();
?>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="../navegacion/index" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MasterGym</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/<?php echo $respGetUserData['imagen'] ?>" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo $respGetUserData['nombres'] . " " . $respGetUserData['apellidos'] ?></h6>
                <span><?php echo $respGetUserData['nombre'] ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button" class="dropdown-item">Buttons</a>
                    <a href="typography" class="dropdown-item">Typography</a>
                    <a href="element" class="dropdown-item">Other Elements</a>
                </div>
            </div>
            <a href="widget" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
            <a href="crearProducto" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Crear Productos</a>
            <a href="misProductos" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Mis Productos</a>
            <a href="chart" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->