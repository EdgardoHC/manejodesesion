<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
session_start();
date_default_timezone_set('America/El_Salvador');

require_once '../config/config.php';

//Declaración de variables:
$valid = true;

$idUsuario = $usuario = $contrasena = $usuarioObtenido = $hashContrasena = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // var_dump($_POST);
    if (empty($_POST["usuario"])) {
        $valid = false;
        die('El usuario es obligatorio<br>');
    } else {
        $usuario = $_POST["usuario"];
    }

    if (empty($_POST["password"])) {
        $valid = false;
        die('La contraseña es obligatoria<br>');
    } else {
        $contrasena = $_POST["password"] . $usuario;
    }


    if ($valid) {
        //Prepara la consulta:
        $stmt = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($stmt === false) {
            die("Sucedió un error.");
        }
        if ($result->num_rows > 0) {
            //mostrar los datos
            while ($row = $result->fetch_assoc()) {
                $idUsuario = $row["id"];
                $usuarioObtenido = $row["username"];
                $hashContrasena = $row["password"];
            }

            if ($usuario == $usuarioObtenido && password_verify($contrasena, $hashContrasena)) {
                $_SESSION["ID"] = $idUsuario; //IDUSUARIO 
                $_SESSION["USERNAME"] = $usuarioObtenido;    
                echo "1"; //Indica que todo fue satisfactorio
            } else {

                echo "Usuario  o contraseña no son correctos.<br>";
            }
        } else {
            die('Usuario  o contraseña no son correctos<br>');
        }
        $stmt->close();
        $conn->close();
    }
} 