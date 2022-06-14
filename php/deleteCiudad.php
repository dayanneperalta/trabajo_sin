<?php
include "./connection.php";
include "./header.php";


$idCIUDAD = '';
if (!empty($_GET["id"])) {
  $GLOBALS['idCIUDAD'] = $_GET["id"];
}

try {
  $qry = $conn->query("DELETE FROM ciudades WHERE idCIUDAD = $idCIUDAD");
} catch (\Throwable $th) {
  throw $th;
  echo $th;
}



header("Location: ./insertCiudades.php");
