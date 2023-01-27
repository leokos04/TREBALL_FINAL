<?php
include("../conexion/conexion.php");
include("../conexion/crud.php");
include("../conexion/error.php");
$id = $_POST["id"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$plazas = $_POST["plazas"];


$ddbb = new Crud();
$result = $ddbb->editCoches($id,$marca, $modelo, $plazas);

header("location:../index.html");
