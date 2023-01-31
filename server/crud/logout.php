<?php
session_start();
session_destroy();
unset($_SESSION["user"]);
unset($_SESSION["rol"]);

header("location:../../public/");