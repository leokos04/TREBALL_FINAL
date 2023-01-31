<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

function comprobarSiExiste($tabla, $nombre)
{
  $ddbb = new Crud();
  return $ddbb->getRows("SELECT COUNT(*) as C FROM `canciones` WHERE $tabla = '$nombre'")->fetch_assoc()["C"];
}

$id = $_POST["id"];
$dataBase = new Crud();

$resultado =  mysqli_fetch_assoc($dataBase->getRows("SELECT * FROM canciones where id=$id"));

if ( comprobarSiExiste("imagen", $resultado["imagen"]) <= 1) {
  try {
    unlink(ROOT_PATH . "img/" . $resultado['imagen']);
  } catch (\Throwable $th) {
    echo $th;
  }
}
if (comprobarSiExiste("mp3", $resultado["mp3"]) <= 1) {
  try {
    //code...
    unlink(ROOT_PATH . "music/" . $resultado['mp3']);
  } catch (\Throwable $th) {
    //throw $th;
    echo $th;
  }
}

$dataBase->deleteCancion($id);
