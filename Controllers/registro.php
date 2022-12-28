<?php

require '../Models\dao/conexion';
$documento = htmlentities($_POST['documento']);
$correo = htmlentities($_POST['correo']);
$sqlExistente = "SELECT *
FROM tblUsuario 
WHERE documento = :documento";
$consultaExistente = $pdo->prepare($sqlExistente);
//Se asignan los datos recibidos
$consultaExistente->bindValue(":documento", $documento);
$consultaExistente->execute();
$resultadoExistente = $consultaExistente->rowCount();

if (!$resultadoExistente) {
    $contrasena = htmlentities($_POST['contrasena']);
    $nombres = htmlentities($_POST['nombres']);
    $apellidos = htmlentities($_POST['apellidos']);
    $rol = 2;
    $sql = "INSERT INTO tblUsuario (documento, nombres, apellidos, correo, contrasena, rol) VALUES (:documento, :nombres, :apellidos, :correo, :contrasena, :rol)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":documento", $documento);
    $stmt->bindValue(":nombres", $nombres);
    $stmt->bindValue(":apellidos", $apellidos);
    $stmt->bindValue(":correo", $correo);
    $stmt->bindValue(":contrasena", $contrasena);
    $stmt->bindValue(":rol", $rol);
    $stmt->execute();
    $resultado = $stmt->rowCount();
    //Inicio de sesión
    session_start();
    $_SESSION["documento"] = $documento;
    echo "<script>document.location.href='../Views/dashboard/dist/index';</script>";
    echo "<script>alert('Cuenta creada correctamente');</script>";
} else {
    //Impresión correo ingresado, ya existe en BD
    echo "<script>alert('¡El número de documento ingresado ya existe! Por favor verifícalos e intenta nuevamente.');</script>";
    echo "<script> document.location.href='../Views/navegacion/registro';</script>";
}
