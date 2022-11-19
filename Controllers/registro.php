<?php

require '../dao/conexion.php';
$documento = htmlentities($_POST['documento']);
$correo = htmlentities($_POST['correo']);
$sqlExistente = "SELECT *
FROM tblUsuario 
WHERE correo = :correo OR documento = :documento";
$consultaExistente = $pdo->prepare($sqlExistente);
//Se asignan los datos recibidos
$consultaExistente->bindValue(":correo", $correo);
$consultaExistente->bindValue(":documento", $documento);
$consultaExistente->execute();
$resultadoExistente = $consultaExistente->rowCount();

if (!$resultadoExistente) {
    $contrasena = htmlentities($_POST['contrasena']);
    $nombres = htmlentities($_POST['nombres']);
    $apellidos = htmlentities($_POST['apellidos']);
    $sql = "INSERT INTO tblUsuario (documento, nombres, apellidos, correo, contrasena) VALUES (:documento, :nombres, :apellidos, :correo, :contrasena)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":documento", $documento);
    $stmt->bindValue(":nombres", $nombres);
    $stmt->bindValue(":apellidos", $apellidos);
    $stmt->bindValue(":correo", $correo);
    $stmt->bindValue(":contrasena", $contrasena);
    $stmt->execute();
    $resultado = $stmt->rowCount();
    //Inicio de sesión
    session_start();
    $_SESSION["documentoIdentidad"] = $documento;
    echo "<script>document.location.href='../dashboard/dist/index.php';</script>";
    echo "<script>alert('Cuenta creada correctamente');</script>";
} else {
    //Impresión correo ingresado, ya existe en BD
    echo "<script>alert('¡El correo y/o número de documento ingresado ya existen! Por favor verifícalos e intenta nuevamente.');</script>";
    echo "<script> document.location.href='../registro.php';</script>";
}
