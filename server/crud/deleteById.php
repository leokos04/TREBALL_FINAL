<?php
include("../conexion/conexion.php");
include("../conexion/crud.php");
include("../conexion/error.php");

$id = $_GET["id"];
$dataBase = new Crud();
$dataBase->deleteCoches($id);


header("location:../index.html");