<?php
if(!empty($_SESSION["rol"])){
  
}

if ($_SESSION["type"] != "admin") {
  header("Location:./index.php");
}
