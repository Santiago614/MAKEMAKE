<?php

require "../../Models/dao/conexion";
$documento = 123456;

$sql = "SELECT PR.nombre, PR.descripcion, PR.precio, CA.cantidad,PR.imagen, (CA.cantidad * PR.precio) AS Total 
FROM tblusuario AS US INNER JOIN tblcarrito AS CA ON US.documento=CA.documentoUsuario 
INNER JOIN tblproducto AS PR ON PR.usuario=US.documento 
WHERE CA.documentoUsuario=:documento";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":documento", $documento);
$stmt->execute();

$result = $stmt->fetchAll();


?>
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
                <li class="breadcrumb-item"><a href="productDetalle">Productos</a></li>
                <li class="breadcrumb-item active">Carrito</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php foreach ($result as $data) { ?>

                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="../assets/img/product-1.jpg" alt="Image"></a>
                                                    <p><?= $data['nombre']?></p>
                                                </div>
                                            </td>
                                            <td><?= number_format($data['precio'], 0, '', '.'); ?></td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus" id="sumar"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?= $data['cantidad']?>" min="1">
                                                    <button class="btn-plus" id="restar"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$<?= number_format($data['Total'], 0, '', '.'); ?></td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="coupon">
                                    <!-- <input type="text" placeholder="Coupon Code">
                                    <button>Apply Code</button> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Total Carrito</h1>
                                        <p>Sub Total<span>$99</span></p>
                                        <p>IVA<span>$1</span></p>
                                        <h2>Total a pagar<span>$100</span></h2>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Update Cart</button>
                                        <button>Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

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