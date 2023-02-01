<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

$user = $_POST["email"];
$pass = md5($_POST["pswd"]);

$ddbb = new Crud();
$resultado = mysqli_fetch_assoc($ddbb->loginUser([$user, $pass]));


if ($resultado) {
  session_start();
  $_SESSION["user"] = $resultado["email"];
  $_SESSION["rol"] = $resultado["rol"];
  echo "../";
  exit();
}
echo "./index.html?error";
