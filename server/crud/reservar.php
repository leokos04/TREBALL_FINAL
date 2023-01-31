<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

$id = $_POST['id'];

$bbdd = new Crud();
$bbdd->setReserva($id);