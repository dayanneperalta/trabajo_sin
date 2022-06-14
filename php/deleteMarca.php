<?php
include "./connection.php";
include "./header.php";


$idMARCA = '';
if (!empty($_GET["id"])) {
  $GLOBALS['idMARCA'] = $_GET["id"];
}

try {
  $qry = $conn->query("DELETE FROM marcas WHERE idMARCA = $idMARCA");
} catch (\Throwable $th) {
  throw $th;
  echo $th;
}



header("Location: ./insertMarcas.php");
