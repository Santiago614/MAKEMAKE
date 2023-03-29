<?php

if (isset($_REQUEST['cerrarSesion'])) {
    CerrarSesion();
}

function CerrarSesion()
{
    session_start(); //Se necesita para que el session_destroy funciona, de lo contrario no se destrirá la sesión.
    session_destroy();
    echo "<script> document.location.href='../../../Views/navegacion/index';</script>";
}

function GetUsuario()
{
    require "../../Models/dao/conexion.php";
    $documento = $_SESSION['documento'];
    $sql = "SELECT US.nombres, US.apellidos, US.imagen, RO.nombre 
    FROM tblusuario as US
    INNER JOIN tblroles AS RO ON US.rol=RO.id
    WHERE documento=:documento";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":documento", $documento);
    $stmt->execute();
    return $stmt->fetch();
}
