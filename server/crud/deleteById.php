<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

/**
 * Funcion que retorna el numero de elementos que existen en una tabla.
 * 
 * @param tabla Nombre de la tabla busqueda
 * @param nombre Nombre de la busqueda del elemento
 */
function comprobarSiExiste($tabla, $nombre)
{
  $ddbb = new Crud();
  return $ddbb->getRows("SELECT COUNT(*) as C FROM `canciones` WHERE $tabla = '$nombre'")->fetch_assoc()["C"];
}

$id = $_POST["id"];
$dataBase = new Crud();

$resultadoImagen = mysqli_fetch_assoc($dataBase->getRows("SELECT * FROM canciones where id=$id"));
$existeReserva = $dataBase->getRows("SELECT COUNT(*) as C FROM canciones INNER JOIN reserva ON canciones.id = `reserva`.`id_cancion` INNER JOIN usuarios ON reserva.id_usuario = usuarios.id WHERE `canciones`.`id` = $id")->fetch_assoc()["C"];



if ($existeReserva <= 0) {
  //Comprueba en la tabla imagen si hay más de 1 elemento 
  if (comprobarSiExiste("imagen", $resultadoImagen["imagen"]) <= 1) {
    try {
      unlink(ROOT_PATH . "img/" . $resultadoImagen['imagen']);
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  if (comprobarSiExiste("mp3", $resultadoImagen["mp3"]) <= 1) {
    try {
      //code...
      unlink(ROOT_PATH . "music/" . $resultadoImagen['mp3']);
    } catch (\Throwable $th) {
      //throw $th;
      echo $th;
    }
  }

  $dataBase->deleteCancion($id);
} else {
  echo "Hay una relacion entre esa musica y un usuario";
}
