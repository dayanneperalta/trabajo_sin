<?php
include './connection.php';
include './header.php';

echo $header_html;

echo '
<h4>Ingresar método de pago:</h4>
  <form action="" method="post">
    <div class="row mb-3">
      <label for="metodo" class="col-sm-2 col-form-label">Método de pago:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="metodo" name="metodo" autofocus required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar método de pago</button>
  </form>';

$metodo_pago = '';

if (!empty($_POST["metodo"])) {
  $metodo_pago = $_POST["metodo"];
};

if ($conn) {
  $qry = $conn->query('SELECT * from metodos_pago');

  echo "<div class='container mt-5'>
          <div class='row'>
            <div class='col-sm-2'><a href='../index.php'>Volver</a></div>
            <div class='col-sm-8'>
              <h3>Métodos de pago</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>idMETODOS_PAGO</td>
                    <td>Método de pago</td>
                    <td>Opciones</td>
                  </tr>
                </thead>
              <tbody>";

  while ($result = mysqli_fetch_array($qry)) {
    echo '<tr>';
    echo '<td>';
    echo $result['idMETODOS_PAGO'];
    echo '</td>';
    echo '<td>';
    echo $result['metodo_pago'];
    echo '</td>';
    echo '<td>';
    echo '<a href="./deleteMetodo.php?id=' . $result['idMETODOS_PAGO'] . '">Eliminar<a/>';
    echo '</td>';
  }

  if ($metodo_pago) {
    $qry2 = $conn->query("INSERT INTO metodos_pago (metodo_pago) VALUES ('$metodo_pago')");
    if ($qry2) {
      header("Location: ./insertMetodos.php");
    }
  };
} else {
  echo "Error to connect database with metodo: $metodo_pago";
}

echo $footer_html;
