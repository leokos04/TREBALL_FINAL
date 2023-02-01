<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";
session_start();

$id = $_POST['id'];

$bbdd = new Crud();
$bbdd->setReserva($id);

$correo = $_SESSION["user"];
$resultado = mysqli_fetch_assoc($bbdd->getRows("SELECT * from usuarios where email = '$correo'")); 
$bbdd->setReservaUserMusic($resultado["id"],$id);