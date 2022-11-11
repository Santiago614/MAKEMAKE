<?php
require 'includes/header.php';
?>




<link rel="stylesheet" href="css/iniciarsesion.css">
<!-- <script src="js/iniciarsesion.js"></script> -->

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="second">
                <div class="myform form">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Registro</h1>
                        </div>
                    </div>
                    <form action="controller/registro.php" method="POST" name="registration">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa tu apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input type="number" name="documento" class="form-control" id="documento" placeholder="Ingresa tu número de documento" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control" id="correo" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Regístrate</button>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <p class="text-center"><a href="./iniciarSesion.php" id="signin">¿Tienes cuenta?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require 'includes/footer.php';
?>