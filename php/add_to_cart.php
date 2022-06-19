<?php
include "./connection.php";
session_start();

if (isset($_SESSION["cart"][$_GET["id"]])) {
  $qry = $conn->query('SELECT s.stock stock from productos p, stock_local s, locales l WHERE p.idPRODUCTO = s.idPRODUCTO AND s.idLOCAL = l.idLOCAL and l.idCIUDAD = ' . $_SESSION['idCiudad'] . ' AND s.idPRODUCTO =' . $_GET["id"]);
  $stockTienda = mysqli_fetch_array($qry);
  if ($_SESSION["cart"][$_GET["id"]]["qty"] >= $stockTienda['stock']) {
    $_SESSION["alert"] = 'Ya no hay más stock. ';
  } else {
    $_SESSION["cart"][$_GET["id"]]["qty"]++;
    $_SESSION["alert"] = 'Producto añadido al carrito correctamente. ';
  }
} else {
  $_SESSION["cart"][$_GET["id"]]["qty"] = 1;
  $_SESSION["alert"] = 'Producto añadido al carrito correctamente. ';
}





header("location: showProducts.php");
