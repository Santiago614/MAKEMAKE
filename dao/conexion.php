<?php

$nombrehost = "localhost";
$nombreBD = "bd_makemake";
$host = "mysql:host=$nombrehost;dbname=$nombreBD";
$usuario = "root";
$contrasena = "";

try {
    //Conexion exitosa	
    $pdo = new PDO($host, $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Error Conexion
    print "Error! " . $e->getMessage();
    die();
}