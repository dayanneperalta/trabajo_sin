<?php
session_start();

if (isset($_SESSION["cart"][$_GET["id"]])) {

  if (isset($_GET["remove_all"])) {
    unset($_SESSION["cart"][$_GET["id"]]);
  }
  if ($_SESSION["cart"][$_GET["id"]]["qty"] < 1) {
    unset($_SESSION["cart"][$_GET["id"]]);
  }
  if (isset($_GET["add"])) {
    $_SESSION["cart"][$_GET["id"]]["qty"]++;
  } else {
    $_SESSION["cart"][$_GET["id"]]["qty"]--;
  }
}
header("location: carrito.php");
