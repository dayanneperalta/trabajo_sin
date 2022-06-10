<?php
include './connection.php';

$rol = $_POST["rol"];

if ($conn) {
  echo "Successful connection with rol: $rol";
} else {
  echo "Error to connect database with rol: $rol";
}
