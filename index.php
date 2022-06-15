<?php
include "./php/connection.php";
include "./php/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/tipo3.css">
  <title>Grupo 10</title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">GRUPO 10</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">Inicio
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <form action="" method="post" class="d-flex">
            <input class="form-control me-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>




    <h2>Ingresar datos en la BD: </h2>
    <div>
      <a href="./php/insertRoles.php">Roles</a><br>
      <a href="./php/insertCiudades.php">Ciudades</a><br>
      <a href="./php/insertMarcas.php">Marca</a><br>
      <a href="./php/insertMetodos.php">Método de Pago</a><br>
      <a href="./php/newUser.php">Registrar usuario</a><br>
    </div>
  </div>

  <?php
  echo $footer_html;
