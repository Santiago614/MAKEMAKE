<?php

if (isset($_POST['login']) || isset($_POST['registro'])) {
    if (isset($_POST['login'])) {
        $datos = json_decode($_POST['login']);
        //Captura de información
        $idUsuario = htmlentities($datos->id);
        $contrasena = htmlentities($datos->contrasena);
        /* Instanciar la clase */
        $iniciar = new InicioSesion();
        /* Asignación de los parametros a la función */
        $iniciar->iniciarSesion($idUsuario, $contrasena);
    }else if (isset($_POST['registro'])) {
        $datos = json_decode($_POST['registro']);
        //Capturo información para registro usuario
        $docIdentidad = htmlentities($datos->documento);
        $nombre = htmlentities($datos->nombre);
        $apellido = htmlentities($datos->apellido);
        $email = htmlentities($datos->correo);
        $contrasena = htmlentities($datos->contrasena);
        //Se instancia la clase
        $registro = new Registro();
        //Asignación de argumentos a la función
        $registro->registrarUsuario($docIdentidad, $nombre, $apellido, $email, $contrasena);
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
        FROM tblusuario 
        WHERE (correo=:id OR documento=:id) AND contrasena=:contrasena";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":contrasena", $contrasena);
        $stmt->execute();
        //Contar registros
        $resultado = $stmt->rowCount();
        if ($resultado) {
            $sqlEstado = "SELECT * 
            FROM tblusuario 
            WHERE (correo=:id OR documento=:id) AND contrasena=:contrasena AND estado=:estado";
            $stmt = $pdo->prepare($sqlEstado);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":contrasena", $contrasena);
            $stmt->bindValue(":estado", $estado);
            $stmt->execute();
            //Contar registros
            $resultadoEstado = $stmt->rowCount();
            if ($resultadoEstado) {
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
        } else {
            echo 3;
        }
    }
}

class Registro
{
    public function registrarUsuario($docId, $nombres, $apellidos, $correo, $pass)
    {
        //Llamar a la conexion base de datos
        require '../../../Models/dao/conexion.php';
        //Verificación si el id ya existe 
        $sqlExistente = "SELECT * FROM tblusuario WHERE documento = :id OR correo = :correo";
        $consultaExistente = $pdo->prepare($sqlExistente);
        $consultaExistente->bindValue(":id", $docId);
        $consultaExistente->bindValue(":correo", $correo);
        $consultaExistente->execute();
        $resultadoExistente = $consultaExistente->rowCount();
        if (!$resultadoExistente) { //En caso de que el correo no exista en BD
            $estado = '1';
            $imagen = "userDefault.png";
            $rol = '2';
            //Consulta correo ingresado no existe en BD
            //sentencia Sql
            $sqlRegistro = "INSERT INTO tblusuario (documento, nombres, apellidos, correo, contrasena, estado, imagen, rol) 
            VALUES (:id, :nombre, :apellido, :correo, :contrasena, :estado, :imagen, :rol)";
            //Preparar consulta
            $consultaRegistro = $pdo->prepare($sqlRegistro);
            //Se asignan los datos recibidos
            $consultaRegistro->bindValue(":id", $docId);
            $consultaRegistro->bindValue(":nombre", $nombres);
            $consultaRegistro->bindValue(":apellido", $apellidos);
            $consultaRegistro->bindValue(":correo", $correo);
            $consultaRegistro->bindValue(":contrasena", $pass);
            $consultaRegistro->bindValue(":estado", $estado);
            $consultaRegistro->bindValue(":imagen", $imagen);
            $consultaRegistro->bindValue(":rol", $rol);
            //Ejecutar la sentencia
            $consultaRegistro->execute();
            session_start();
            $_SESSION["documento"] = $docId;
            //Comprador/Proveedor
            echo 1;
        } else {
            echo 2;
        }
    }
}
