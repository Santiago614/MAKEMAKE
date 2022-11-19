<?php

require '../dao/conexion.php';
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
    $_SESSION["documentoIdentidad"] = $documento;
    echo "<script>document.location.href='../dashboard/dist/index.php';</script>";
} else {
    echo "<script>alert('Credenciales incorrectas, intenta nuevamente');</script>";
    echo "<script>document.location.href='../iniciarSesion.php';</script>";
}
