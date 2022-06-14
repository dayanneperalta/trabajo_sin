<?php
include "./connection.php";
include "./header.php";


$idROL = '';
if (!empty($_GET["id"])) {
  $GLOBALS['idROL'] = $_GET["id"];
}

try {
  $qry = $conn->query("DELETE FROM roles WHERE idROL = $idROL");
} catch (\Throwable $th) {
  throw $th;
  echo $th;
}



header("Location: ./insertRoles.php");
