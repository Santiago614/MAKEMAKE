<?php

require '../dao/conexion.php';
$id = $_POST['id'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * 
FROM tblusuario 
WHERE (correo=:id OR documento=:id) AND contrasena=:contrasena";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->bindValue(":contrasena", $contrasena);
$stmt->execute();
$resultado=$stmt->rowCount();
print_r($resultado);
if ($resultado) {
    echo "<script>alert('Te has loggeado correctamente :)');</script>";
    echo "<script>document.location.href='../dashboard/dist/index.html';</script>";
}else{
    echo "<script>alert('Credenciales incorrectas, intenta nuevamente :(');</script>";
    echo "<script>document.location.href='../iniciarsesion.php';</script>";
}
