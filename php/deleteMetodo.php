<?php
include "./connection.php";
include "./header.php";


$idMETODO = '';
if (!empty($_GET["id"])) {
  $GLOBALS['idMETODO'] = $_GET["id"];
}

try {
  $qry = $conn->query("DELETE FROM metodos_pago WHERE idMETODOS_PAGO = $idMETODO");
} catch (\Throwable $th) {
  throw $th;
  echo $th;
}



header("Location: ./insertMetodos.php");
