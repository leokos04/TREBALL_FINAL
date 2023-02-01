<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";


$username = $_POST["txt"];
$email = $_POST["email"];
$pass = md5($_POST["pswd"]);
$passConf = md5($_POST["pswdConf"]);

//VALIDACION CAMPOS LLENOS
if(empty($username) || empty($email) || empty($pass) || empty($passConf)){
  echo "Rellene todos los campos";
  exit();
}
//VALIDACION DE CORREO
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Datos del correo no correctos";
  exit();
}
//VALIDACION DE PASS
if($pass != $passConf){
  echo "Las contraseñas no son iguales";
  exit();
}
$ddbb = new Crud();
$emailFound = $ddbb->searchMail($email);
//VALIDACION SI EXISTE EL CORREO ELECTRONICO
if($emailFound != 0){
  echo "Ya hay existente ese correo electronico";
  exit();
}

$ddbb->registerUser([$username,$email,$pass]);
session_start();
$_SESSION["user"] = $email;
$_SESSION["rol"] = "user";
