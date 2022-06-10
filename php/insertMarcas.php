<?php
include './connection.php';

$marca = $_POST["marca"];

if ($conn) {
  echo "Successful connection with marca: $marca";
} else {
  echo "Error to connect database with marca: $marca";
}
