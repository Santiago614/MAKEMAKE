<?php
require '../../../Models/dao/conexion.php';

$documento = $_SESSION['documento'];
$sql = "SELECT * FROM tblusuario WHERE documento = :documento";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':documento', $documento);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);


?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="../../navegacion/index">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="media-body ml-2 d-none d-lg-block">
        <span class="mb-0 text-sm font-weight-bold text-light"><?= $result->nombres . ' ' . $result->apellidos ?></span>
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form action="../../../Controllers/php/users/usuarios" method="post">
                        <input type="hidden" name="cerrarSesion" />
                        <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>