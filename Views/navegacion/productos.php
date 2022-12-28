<?php
require '../includes/header.php';
require "dao/conexion";
$sql = "SELECT * FROM tblProducto";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll();
?>
<header class="masthead bg-primary text-white text-center">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Productos</h1>
            <p class="">Aqui encontrarás los productos referentes a Gamers</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($resultado as $datos) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?= $datos["imagen"] ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $datos["nombre"] ?></h5>
                                <!-- Product price-->
                                $<?= $datos["precio"] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="producto">Ver producto</a></div>
                            <br>
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Añadir al carrito</a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php
require '../includes/footer.php';
?>