<?php
 class Connection {
  
  private $server = "localhost";
  private $user = "root";
  private $password = "bbdd";
  private $db = "ldk_spotiuwu";

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
