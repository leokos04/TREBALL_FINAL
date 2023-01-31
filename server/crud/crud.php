<?php
include("./error.php");
class Crud
{
  public function getRows($sql)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $result = $mySQL->query($sql);
    return $result;
  }
  public function showCanciones()
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $result = $mySQL->query("SELECT * FROM canciones");
    return $result;
  }
  public function addCancion($nombre, $grupo, $pais, $fecha, $cantidad, $img, $mp3)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $mySQL->query("INSERT INTO `canciones` (`id`, `nombre`, `grupo`, `pais`, `fecha_creacion`, `cantidad`,`imagen`,`mp3`) VALUES (NULL, '$nombre', '$grupo', '$pais', '$fecha', '$cantidad','$img','$mp3');");
  }
  public function editCancion($id, $nombre, $grupo, $pais, $fecha, $cantidad, $imagen, $mp3)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $mySQL->query("UPDATE `canciones` SET `nombre` = '$nombre', `grupo` = '$grupo', `pais` = '$pais', `fecha_creacion` = '$fecha', `cantidad` = '$cantidad', `imagen` ='$imagen', `mp3` = '$mp3' WHERE `canciones`.`id` = $id");
  }
  public function deleteCancion($data)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $sql = "DELETE FROM canciones WHERE id='$data'";
    $mySQL->query($sql);
  }
  public function loginUser($data)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $sql = "SELECT * FROM `usuarios` WHERE email = '$data[0]' and user_pass = '$data[1]'";
    return $mySQL->query($sql);
    
  }
  public function registerUser($data)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $sql = "INSERT INTO `usuarios` (`id`, `usuario`, `email`, `user_pass`, `rol`) VALUES (NULL, '$data[0]', '$data[1]', '$data[2]', 'user');";
    $mySQL->query($sql);
  }
  public function searchMail($email)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $sql = "SELECT * FROM `usuarios` WHERE email = '$email'";
    return $mySQL->query($sql);
  }
}
