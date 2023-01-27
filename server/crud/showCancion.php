<?php
include("../connection/conexion.php");
include("./crud.php");


$ddbb = new Crud();
$result = $ddbb->getRows("SELECT * FROM canciones");

$jsonData = [];
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $jsonData[$i]= $row;
  ++$i;
}

echo json_encode($jsonData);