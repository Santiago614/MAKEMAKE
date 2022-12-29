<?php

if (isset($_POST['login'])) {
    if (isset($_POST['login'])) {
        $datos = json_decode($_POST['login']);
        //Captura de información
        $idUsuario = $datos->id;
        $contrasena = $datos->contrasena;
        /* Instanciar la clase */
        $iniciar = new InicioSesion();
        /* Asignación de los parametros a la función */
        $iniciar->iniciarSesion($idUsuario, $contrasena);
    }
} else {
    echo "Error";
}

class InicioSesion
{
    public function IniciarSesion($idUsuario, $clave)
    {
        require "../../../Models/dao/conexion.php";
        //Capturar información
        //strip_tags->Función que ayuda a evitar la inyección sql
        $id = htmlentities($idUsuario);
        $contrasena = htmlentities($clave);
        $estado = '1';
        $sql = "SELECT * 
        FROM tblUsuario 
        WHERE (correo=:id OR documento=:id) AND contrasena=:contrasena AND estado=:estado";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":contrasena", $contrasena);
        $stmt->bindValue(":estado", $estado);
        $stmt->execute();
        //Contar registros
        $resultado = $stmt->rowCount();
        if ($resultado) {

            //PDO::FETCH_OBJ->Guarda lo que recibe en un objeto
            $dataUsuario = $stmt->fetch(PDO::FETCH_OBJ);
            //Llamado al documento independiente si ingresa correo o documento
            $documento = $dataUsuario->documento;
            //Inicio de sesión
            session_start();
            //Asignación variable de sesión
            $_SESSION["documento"] = $documento;
            echo 1;
        } else {
            echo 2;
        }
    }
}
