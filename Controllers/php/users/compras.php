<?php

if (isset($_POST['getCarrito'])) {
    $carrito = new Carrito();
    $getCarrito = $carrito->getCarrito();
    echo $getCarrito;
}

class Carrito
{

    function getCarrito()
    {
        session_start();
        $documento = $_SESSION['documento'];
        require "../../../Models/dao/conexion.php";
        $sql = "SELECT PR.nombre, PR.descripcion, PR.precio, CA.cantidad,PR.imagen, (CA.cantidad * PR.precio) AS Total 
        FROM tblusuario AS US INNER JOIN tblcarrito AS CA ON US.documento=CA.documentoUsuario 
        INNER JOIN tblproducto AS PR ON PR.id=CA.idProducto 
        WHERE CA.documentoUsuario=:documento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":documento", $documento);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultado = json_encode($resultado);
        return $resultado;
    }
}
