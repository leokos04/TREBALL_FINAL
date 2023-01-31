<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH ."connection/conexion.php";
require_once ROOT_PATH ."crud/crud.php";

function comprobarSiExiste($tabla, $nombre)
{
  $ddbb = new Crud();
  return $ddbb->getRows("SELECT COUNT(*) FROM `canciones` WHERE $tabla = '$nombre'");
}

$id = $_POST["id"];
$dataBase = new Crud();

$resultado = $dataBase->getRows("SELECT * FROM canciones where id='$id'");
if(comprobarSiExiste("imagen",$resultado["imagen"]) <= 1){
  unlink(ROOT_PATH."img/".$resultado['imagen']);
}
if(comprobarSiExiste("mp3",$resultado["mp3"]) <= 1){
  unlink(ROOT_PATH."music/".$resultado['mp3']);
}

$dataBase->deleteCancion($id);
