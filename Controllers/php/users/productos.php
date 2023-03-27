<?php

if (isset($_POST['crearProducto'])) {
    $datos = json_decode($_POST['crearProducto']);
    $nombre = htmlentities($datos->nombre);
    $descripcion = htmlentities($datos->descripcion);
    $cantidad = htmlentities($datos->cantidad);
    $stock = htmlentities($datos->stock);
    $precio = htmlentities($datos->precio);
    $categoria = htmlentities($datos->categoria);

    $producto = new Producto();
    $crearProducto = $producto->crearProducto($nombre, $descripcion, $precio, $cantidad, $stock,  $categoria);
    //echo $getCarrito;
}
function getCategorias()
{
    require_once "../../Models/dao/conexion.php";
    $sql = "SELECT * FROM tblcategoria";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
class Producto
{
    function crearProducto($nombre, $descripcion, $precio, $cantidad, $stock,  $categoria)
    {
        session_start();
        $documento = $_SESSION['documento'];
        require "../../../Models/dao/conexion.php";
        $sql = "INSERT INTO tblproducto (nombre, descripcion, precio, usuario, cantidad, stockMin, categoria, estado) 
        VALUES (:nombre, :descripcion, :precio, :usuario, :cantidad, :stock, :categoria, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":nombre", $nombre);
        $stmt->bindValue(":descripcion", $descripcion);
        $stmt->bindValue(":precio", $precio);
        $stmt->bindValue(":usuario", $documento);
        $stmt->bindValue(":cantidad", $cantidad);
        $stmt->bindValue(":stock", $stock);
        $stmt->bindValue(":categoria", $categoria);
        $stmt->bindValue(":estado", 0);
        $stmt->execute();
        echo 1;
    }
    function GetMisPublicaciones()
    {
        $documento = $_SESSION['documento'];
        require "../../Models/dao/conexion.php";
        $sql="SELECT * FROM tblproducto WHERE usuario=:documento";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(":documento", $documento);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
