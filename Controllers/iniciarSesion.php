<?php

require '../Models/dao/conexion';
$id = htmlentities($_POST['id']);
$contrasena = htmlentities($_POST['contrasena']);

$sql = "SELECT * 
FROM tblUsuario 
WHERE (correo=:id OR documento=:id) AND contrasena=:contrasena";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->bindValue(":contrasena", $contrasena);
$stmt->execute();
$resultado = $stmt->rowCount();
if ($resultado) {
    $documentoUsuario = $stmt->fetch(PDO::FETCH_OBJ);
    //Llamado al documento independiente si ingresa correo o documento
    $documento = $documentoUsuario->documento;
    //Inicio de sesión
    session_start();
    $_SESSION["documento"] = $documento;
    echo "<script>document.location.href='../Views/dashboard/dist/index';</script>";
} else {
    echo "<script>alert('Credenciales incorrectas, intenta nuevamente');</script>";
    echo "<script>document.location.href='../Views/navegacion/index';</script>";
}
