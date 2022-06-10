<?php
include './connection.php';

$ciudad = $_POST["ciudad"];

if (/* $conn &&  */isset($_POST["ciudad"])) {
  /* $qry = $conn->query('SELECT * FROM ciudades');
  while ($row = mysqli_fetch_array($qry)) { */
  echo 'Ciudad: ';
} else {
  echo "Error to connect database with rol: $ciudad";
}
