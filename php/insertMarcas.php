<?php
include './connection.php';
include './header.php';

echo $header_html;

echo '
<h4>Ingresar Marca:</h4>
  <form action="" method="post">
    <div class="row mb-3">
      <label for="marca" class="col-sm-2 col-form-label">Marca:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="marca" name="marca" autofocus required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar Marca</button>
  </form>';

$marca = '';
$descripcion = '';

if (!empty($_POST["marca"]) && !empty($_POST["descripcion"])) {
  $marca = $_POST["marca"];
  $descripcion = $_POST["descripcion"];
};

if ($conn) {
  $qry = $conn->query('SELECT * from marcas');

  echo "<div class='container mt-5'>
          <div class='row'>
            <div class='col-sm-2'><a href='../index.php'>Volver</a></div>
            <div class='col-sm-8'>
              <h3>Marcas</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>idMARCA</td>
                    <td>Marca</td>
                    <td>Descripción</td>
                    <td>Opciones</td>
                  </tr>
                </thead>
              <tbody>";

  while ($result = mysqli_fetch_array($qry)) {
    echo '<tr>';
    echo '<td>';
    echo $result['idMARCA'];
    echo '</td>';
    echo '<td>';
    echo $result['marca'];
    echo '</td>';
    echo '<td>';
    echo $result['descripcion'];
    echo '</td>';
    echo '<td>';
    echo '<a href="./deleteMarca.php?id=' . $result['idMARCA'] . '">Eliminar<a/>';
    echo '</td>';
  }

  if ($marca && $descripcion) {
    $qry2 = $conn->query("INSERT INTO marcas (marca, descripcion) VALUES ('$marca','$descripcion')");
    if ($qry2) {
      header("Location: ./insertMarcas.php");
    }
  };
} else {
  echo "Error to connect database with marca: $marca";
}

echo $footer_html;
