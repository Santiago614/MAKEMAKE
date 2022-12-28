<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Master GYM | Proyecto SENA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/slick/slick.css" rel="stylesheet">
    <link href="../lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    require '../includes/header.php';
    ?>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                <li class="breadcrumb-item"><a href="productLista">Productos</a></li>
                <li class="breadcrumb-item active">Login & Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-form">
                        <form action="../../Controllers/registro" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Documento</label>
                                    <input class="form-control" type="number" name="documento" placeholder="Numero De Documento" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="nombres" placeholder="Nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Apellido</label>
                                    <input class="form-control" type="text" name="apellidos" placeholder="Apellido" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Correo Electronico</label>
                                    <input class="form-control" type="email" name="correo" placeholder="Correo Electronico" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Numero De Telefono</label>
                                    <input class="form-control" type="number" name="celular" placeholder="Numero De Telefono" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Contraseña</label>
                                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Verificar Contraseña</label>
                                    <input class="form-control" type="password" name="repcontrasena" placeholder="Verificar Contraseña" required>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    require '../includes/footer.php';
    ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>