<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";

$idMusica = $_POST["id_musica"];
$idReserva = $_POST["id_reserva"];
//Elimina la reserva de la musica y del user

if(!empty($idMusica) && !empty($idReserva)){
  $bbdd = new Crud();
  $bbdd->delReservaUserMusic($idReserva,$idMusica);
  echo true;
  exit();
}
echo false;
exit();