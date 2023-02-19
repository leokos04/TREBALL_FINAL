<?php
include_once __DIR__ . "/../constant.php";
require_once ROOT_PATH . "connection/conexion.php";
require_once ROOT_PATH . "crud/crud.php";
session_start();
/*SELECT `usuarios`.`email` ,reserva.fecha_adquision,canciones.*
            FROM canciones
            INNER JOIN reserva ON canciones.id = `reserva`.`id_cancion`
            INNER JOIN usuarios ON reserva.id_usuario = usuarios.id WHERE `usuarios`.`email` = '$correo' */

//Recojo las reservas de la sesion iniciada
$bbdd = new Crud();
$correo = $_SESSION["user"];
if (!empty($correo)) {
  $result = $bbdd->getReserva($correo);

  $jsonData = [];
  $i = 0;
  
  while ($row = mysqli_fetch_assoc($result)) {
    $jsonData[$i] = $row;
    ++$i;
  }
  echo json_encode($jsonData);
  exit();
}
echo "error carga reservas";
