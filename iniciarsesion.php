<?php
require 'includes/header.php';
?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="css/iniciarsesion.css"> 
<script src="js/iniciarsesion.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Iniciar Sesión</h1>
                        </div>
                    </div>
                    <form action="controller/iniciarsesion.php" method="post" name="login">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo o Documento</label>
                            <input type="text" name="id" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo o documento" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contraseña</label>
                            <input type="password" name="contrasena" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Ingrese su contraseña" required>
                        </div>

                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Iniciar</button>
                        </div>

                        <div class="form-group">
                            <p class="text-center">No tienes cuenta? <a href="registro.php" id="signup">Registrate aquí</a></p>
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