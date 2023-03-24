<?php

if (isset($_POST['crearProducto'])) {
    $datos=$_POST['crearProducto'];
    $nombre=$datos->nombre;
    $descripcion=$datos->descripcion;
    $cantidad=$datos->cantidad;
    $stock=$datos->stock;
    $precio=$datos->precio;
    $categoria=$datos->categoria;

    $producto = new Producto();
    $crearProducto = $producto->crearProducto($nombre, $descripcion, $cantidad, $stock, $precio, $categoria);
    //echo $getCarrito;
}

class Producto{
    function crearProducto($nombre, $descripcion, $cantidad, $stock, $precio, $categoria)
    {
        session_start();
        $documento = $_SESSION['documento'];
        require "../../../Models/dao/conexion.php";
        echo "Hola, entrpe";
    }
}