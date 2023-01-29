<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH ."connection/conexion.php";
require_once ROOT_PATH ."crud/crud.php";

$id = $_GET["id"];
if (is_numeric($id)) {
  $dataBase = new Crud();
  $sql = "SELECT * FROM canciones where id=$id";
  $coches = $dataBase->getRows($sql);
  echo json_encode(mysqli_fetch_assoc($coches));
  exit();
}
echo false;