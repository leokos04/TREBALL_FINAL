<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

/* Checking if any of the fields are empty. If they are, it will display an error message. */
if (
  empty($_POST["name"]) || empty($_POST["artist"]) || empty($_POST["country"]) ||
  empty($_POST["date"]) || empty($_POST["quantity"]) || empty($_FILES["image"]) || empty($_FILES["mp3"])
) {
  echo "Faltan campos por completar";
  exit();
}

$name = $_POST["name"];
$artist = $_POST["artist"];
$country = $_POST["country"];
$date = $_POST["date"];
$quantity = $_POST["quantity"];
$image = $_FILES["image"];
$mp3 = $_FILES["mp3"];

// Validar que los archivos subidos sean de tipo imagen y mp3
$allowed_image_types = array("image/jpeg", "image/jpg", "image/png");
$allowed_mp3_types = array("audio/mpeg");

/* Validaciones de tipo para los input tipo file */
if (!in_array($image["type"], $allowed_image_types)) {
  echo "Solo se permiten imágenes en formato JPEG, JPG o PNG";
  exit();
}

if (!in_array($mp3["type"], $allowed_mp3_types)) {
  echo "Solo se permiten archivos de audio en formato MP3";
  exit();
}

// Mover archivos a la carpeta correspondiente
/* Moving the files to the corresponding folder. */
move_uploaded_file($image["tmp_name"], ROOT_PATH . "img/" . $image['name']);
move_uploaded_file($mp3["tmp_name"], ROOT_PATH . "music/" . $mp3['name']);

$ddbb = new Crud();
$ddbb->addCancion($name, $artist, $country, $date, $quantity, $image["name"], $mp3["name"]);

