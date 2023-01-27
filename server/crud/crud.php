<?php
include("./error.php");
class Crud{
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
  public function addCancion($nombre,$grupo,$pais,$fecha,$cantidad){
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $mySQL->query("INSERT INTO `canciones` (`id`, `nombre`, `grupo`, `pais`, `fecha_creacion`, `cantidad`) VALUES (NULL, '$nombre', '$grupo', '$pais', '$fecha', '$cantidad');");
  }
  public function editCancion($id,$nombre,$grupo,$pais,$fecha,$cantidad)
  {
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $mySQL->query("UPDATE `canciones` SET `nombre` = '$nombre', `grupo` = '$grupo', `pais` = '$pais', `fecha_creacion` = '$fecha', `cantidad` = '$cantidad' WHERE `canciones`.`id` = $id");
  }
  public function deleteCancion($data){
    $sqlconnection = new Connection();
    $mySQL = $sqlconnection->getConnection();
    $sql = "DELETE FROM canciones WHERE id='$data'";
    $mySQL->query($sql);
  }
}
