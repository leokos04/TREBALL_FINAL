<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

/**
 //Esto deberia de ponerlo en el crud pero bueno no se como ordenar los archivos todavia ^^
 * Funcion que devuelve el numero de elementos con el mismo nombre que existe en la base de datos 
 * (no compruebo el tamaño en caso de que sean iguales pero diferentes tamaño)
 * 
 * @param tabla la tabla que quieres buscar
 * @param nombre del elemento que quieres buscar
 * 
 * @return numero de elementos que existe en la tabla.
 */

function comprobarSiExiste($tabla, $nombre)
{
  $ddbb = new Crud();
  return $ddbb->getRows("SELECT COUNT(*) as C FROM `canciones` WHERE $tabla = '$nombre'")->fetch_assoc()["C"];
}


$id = $_POST["id"];
$nameImageActual = $_POST["img-name-ed"];
$nameMp3Actual = $_POST["mp3-name-ed"];
$name = $_POST["name"];
$artist = $_POST["artist"];
$country = $_POST["country"];
$date = $_POST["date"];
$quantity = $_POST["quantity"];
$image = $_FILES["image"];
$mp3 = $_FILES["mp3"];


/* Comprueba si los campos estan vacios */
if (
  empty($_POST["name"]) || empty($_POST["artist"]) ||
  empty($_POST["date"]) || empty($_POST["country"])
) {
  echo "Faltan campos por completar";
  exit();
}
//En caso que el campo cantidad este vacio por defecto sera 0
if (empty($quantity)) {
  $quantity = 0;
}

//Arrays de tipo de archivo valido para que el usuario puede insertar
$allowed_image_types = array("image/jpeg", "image/jpg", "image/png");
$allowed_mp3_types = array("audio/mpeg");


//Como lo explico...
/**
 * Al presionar editar , si no se sube ningun archivo (FILE) el valor de error sera diferente a 0 es decir que el usuario no ha subido ninguna imagen
 * lo caul utilizaremos la nuestra que teniamos antes, en caso contrario si que se ha subido, se hace la comprobacion del tipo de imagen de los tipos permitidos.
 * 
 * Tambien a la vez de que la imagen anterior guardada se comprueba si esta en uso , en caso de que devuelva 1 lo eliminara.
 * 
 * Por ultimo se subira la imagen actual a la ruta de imagenes con el nombre
 */

if ($image["error"] != 0) {

  $image["name"] = $nameImageActual;

} else {
  if (!in_array($image["type"], $allowed_image_types)) {
    echo "Solo se permiten imágenes en formato JPEG, JPG o PNG";
    exit();
  }
  if (comprobarSiExiste("imagen", $nameImageActual) <= 1) {
    unlink(ROOT_PATH . "img/$nameImageActual");
  }
  move_uploaded_file($image["tmp_name"], ROOT_PATH . "img/" . $image['name']);
}

//explicacion de arriba pero para la musica mp3

if ($mp3["error"] != 0) {
  $mp3["name"] = $nameMp3Actual;
} else {
  if (!in_array($mp3["type"], $allowed_mp3_types)) {
    echo "Solo se permiten archivos de audio en formato MP3";
    exit();
  }
  if (comprobarSiExiste("mp3", $nameMp3Actual) <= 1) {
    unlink(ROOT_PATH . "music/$nameMp3Actual");
  }
  move_uploaded_file($mp3["tmp_name"], ROOT_PATH . "music/" . $mp3['name']);
}


$ddbb = new Crud();
$ddbb->editCancion($id, $name, $artist, $country, $date, $quantity, $image["name"], $mp3["name"]);
