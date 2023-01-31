<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";



function comprobarSiExiste($tabla, $nombre)
{
  $ddbb = new Crud();
  return $ddbb->getRows("SELECT COUNT(*) FROM `canciones` WHERE $tabla = '$nombre'");
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


if (
  empty($_POST["name"]) || empty($_POST["artist"]) ||
  empty($_POST["date"]) || empty($_POST["country"])
) {
  echo "Faltan campos por completar";
  exit();
}
if(empty($quantity)){
  $quantity = 0;
}

$allowed_image_types = array("image/jpeg", "image/jpg", "image/png");
$allowed_mp3_types = array("audio/mpeg");


//COMPROBAR SI SE HA SUBIDO UNA IMAGEN EN CASO DE QUE NO SE SEGUIRA UTILIZANDO EL ACTUAL
if ($image["error"] != 0) {
  $image["name"] = $nameImageActual;
} else {
  if (!in_array($image["type"], $allowed_image_types)) {
    echo "Solo se permiten imágenes en formato JPEG, JPG o PNG";
    exit();
  }
  if (comprobarSiExiste("imagen", $image["name"]) <= 1) {
    unlink(ROOT_PATH . "img/$nameImageActual");
  }
  move_uploaded_file($image["tmp_name"], ROOT_PATH . "img/" . $image['name']);
}

if ($mp3["error"] != 0) {
  $mp3["name"] = $nameMp3Actual;
} else {
  if (!in_array($mp3["type"], $allowed_mp3_types)) {
    echo "Solo se permiten archivos de audio en formato MP3";
    exit();
  }
  if (comprobarSiExiste("mp3", $mp3["name"]) <= 1) {
    unlink(ROOT_PATH . "music/$nameMp3Actual");
  }
  move_uploaded_file($mp3["tmp_name"], ROOT_PATH . "music/" . $mp3['name']);
}

$ddbb = new Crud();
$ddbb->editCancion($id, $name, $artist, $country, $date, $quantity, $image["name"], $mp3["name"]);

