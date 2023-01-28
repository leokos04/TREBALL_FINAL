<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH ."connection/conexion.php";
require_once ROOT_PATH ."crud/crud.php";

$id = $_POST["id"];
$dataBase = new Crud();
$dataBase->deleteCancion($id);
