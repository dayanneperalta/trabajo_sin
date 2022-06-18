<?php
include "./connection.php";
include "./header.php";


$idLOCAL = '';
if (!empty($_GET["id"])) {
  $idLOCAL = $_GET["id"];
}

try {
  $qry = $conn->query("DELETE FROM locales WHERE idLOCAL = $idLOCAL");
} catch (\Throwable $th) {
  throw $th;
  echo $th;
}



header("Location: ./newLocal.php");
