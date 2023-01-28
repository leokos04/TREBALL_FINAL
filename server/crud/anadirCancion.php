<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

$name = $_POST["name"];
$artist = $_POST["artist"];
$country = $_POST["country"];
$date = $_POST["date"];
$quantity = $_POST["quantity"];
$image = $_FILES["image"];
$mp3 = $_FILES["mp3"];


move_uploaded_file($_FILES["image"]["tmp_name"], ROOT_PATH."img/". $image['name']);
move_uploaded_file($_FILES["mp3"]["tmp_name"], ROOT_PATH."music/". $mp3['name']);

$ddbb = new Crud();
$result = $ddbb->addCancion($name, $artist, $country, $date, $quantity, $image["name"], $mp3["name"]);

echo "$name, $artist, $country, $date, $quantity,". $image["name"]."," .$mp3["name"];