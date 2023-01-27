<?php
 class Connection {
  
  private $server = "localhost";
  private $user = "leokos";
  private $password = "329LasaLa";
  private $db = "ldk_prototipo";

  public function getConnection()
  {
    return new mysqli
    (
      $this->server,
      $this->user,
      $this->password,
      $this->db
    );
  }
  public function isConnected()
  {
    $bbdd = $this->getConnection();
    return $bbdd->connect_error;
  }
}
