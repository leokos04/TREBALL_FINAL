<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

$id = $_POST["id"];
$name = $_POST["name"];
$artist = $_POST["artist"];
$country = $_POST["country"];
$date = $_POST["date"];
$quantity = $_POST["quantity"];
$image = $_FILES["image"];
$mp3 = $_FILES["mp3"];


$ddbb = new Crud();
$result = $ddbb->editCancion($id, $name, $artist, $country, $date, $quantity, $image["name"], $mp3["name"]);
