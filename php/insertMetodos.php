<?php
include './connection.php';

$metodo = $_POST["metodo"];

if ($conn) {
  echo "Successful connection with metodo: $metodo";
} else {
  echo "Error to connect database with metodo: $metodo";
}
