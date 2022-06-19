<?php
include './connection.php';
include './header.php';

echo $header_html;

echo '<div class="col-sm-2 mt-1 mb-2"><a class="ms-2" href="./login.php">Volver</a></div>
<h4 class="ms-2">Ingresar ciudad:</h4>
  <form action="" method="post" class="ms-2">
    <div class="row mb-3">
      <label for="ciudad" class="col-sm-1 col-form-label">Ciudad:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="ciudad" name="ciudad" autofocus required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar ciudad</button>
  </form>';

$ciudad = '';

if (!empty($_POST["ciudad"])) {
  $ciudad = $_POST["ciudad"];
};

if ($conn) {
  $qry = $conn->query('SELECT * from ciudades');

  echo "<div class='container mt-5'>
          <div class='row'>
            <div class='col-sm-8'>
              <h3>Ciudades</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>idCIUDAD</td>
                    <td>Ciudad</td>
                    <td>Opciones</td>
                  </tr>
                </thead>
              <tbody>";

  while ($result = mysqli_fetch_array($qry)) {
    echo '<tr>';
    echo '<td>';
    echo $result['idCIUDAD'];
    echo '</td>';
    echo '<td>';
    echo $result['ciudad'];
    echo '</td>';
    echo '<td>';
    echo '<a href="./deleteCiudad.php?id=' . $result['idCIUDAD'] . '">Eliminar<a/>';
    echo '</td>';
  }

  if ($ciudad) {
    $qry2 = $conn->query("INSERT INTO ciudades (ciudad) VALUES ('$ciudad')");
    if ($qry2) {
      header("Location: ./insertCiudades.php");
    }
  };
} else {
  echo "Error to connect database with ciudad: $ciudad";
}

echo $footer_html;
