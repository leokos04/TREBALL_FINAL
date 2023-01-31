<?php
session_start();
if(empty($_SESSION)){
  echo "0";
  exit();
}

if ($_SESSION["rol"] == "user") {
  echo "1";
  exit();
}

if ($_SESSION["rol"] == "admin") {
  echo "2";
  exit();
}