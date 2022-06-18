<?php
include "./connection.php";
include "./header.php";

echo $header_html;

if ($conn) {
  $qry = $conn->query('SELECT * from productos');

  echo "<div class='ms-3 mt-3'><a href='../index.php'>Volver</a></div>
<div class='row mt-2'>";

  while ($result = mysqli_fetch_array($qry)) {
    $qry2 = $conn->query("SELECT marca FROM marcas WHERE idMARCA = " . $result['idMARCA']);

    if (mysqli_num_rows($qry2) == 1) {

      while ($result2 = mysqli_fetch_array($qry2)) {
        echo '
        <div class="card bg-light mb-4 ms-3 col-sm-5" style="max-width: 20rem;">
          <div class="card-header">' . $result2['marca'] . '</div>
          <div class="card-body">
            <h4 class="card-title">' . $result['producto'] . '</h4>
            <img class="picture" src="../img/' . $result['imagen'] . '" alt="imagen de prueba">
            <p class="card-text mt-2">' . $result['descProducto'] . '</p>
          </div>
        </div>';
      }
    }
  }
  echo '</div>';
}











echo $footer_html;
