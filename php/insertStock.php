<?php
include "./connection.php";
include "./header.php";

echo $header_html;

if ($conn) {
  $qry = $conn->query('SELECT * FROM productos');
  $qry2 = $conn->query('SELECT * FROM locales');
  echo '<br>';
  echo '<div class="col-sm-2">&nbsp<a href="../index.php">Volver</a></div>';
  echo '<br>';
  echo '<form action="" method="post" enctype="multipart/form-data">';
  echo '<div class="row mb-3">';
  echo    '<label for="stock" class="col-sm-2 col-form-label">Stock:</label>';
  echo    '<div class="col-sm-4">';
  echo      '<input type="number" class="form-control" id="stock" name="stock" autofocus required>';
  echo    '</div>';
  echo  '</div>';
  echo '<div class="row mb-3">';
  echo    '<label for="producto" class="col-sm-2 col-form-label">Producto:</label>';
  echo    '<div class="col-sm-4">';
  echo      '<select class="form-select" name="producto" id="producto" required>';
  echo  '<option value="">--Escoge un producto--</option>';
  while ($result = mysqli_fetch_array($qry)) {
    $qry3 = $conn->query("SELECT * FROM marcas WHERE idMARCA = " . $result['idMARCA']);
    $qryMarca = mysqli_fetch_array($qry3);
    echo '<option value="' . $result['idPRODUCTO'] . '">' . $result['producto'] . ' - ' . $qryMarca['marca'] . '</option>';
  }
  echo '</select>';
  echo    '</div>';
  echo  '</div>';
  echo '<div class="row mb-3">';
  echo    '<label for="local" class="col-sm-2 col-form-label">Local:</label>';
  echo    '<div class="col-sm-4">';
  echo      '<select class="form-select" name="local" id="local" required>';
  echo  '<option value="">--Escoge un local--</option>';
  while ($result = mysqli_fetch_array($qry2)) {
    $qry4 = $conn->query("SELECT * FROM ciudades WHERE idCIUDAD = " . $result['idCIUDAD']);
    $qryCiudad = mysqli_fetch_array($qry4);
    echo '<option value="' . $result['idLOCAL'] . '">' . $result['local'] . ' - ' . $qryCiudad['ciudad'] . '</option>';
  }
  echo '</select>';
  echo    '</div>';
  echo  '</div>';
  echo  '<button type="submit" class="btn btn-primary">Ingresar stock de producto</button>';
  echo '</form>';

  echo "<div class='container mt-5'>
          <div class='row'>
            <div class='col-sm-8'>
              <h3>STOCK</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>Local</td>
                    <td>Producto</td>
                    <td>STOCK</td>
                  </tr>
                </thead>
              <tbody>";

  $qry5 = $conn->query('SELECT * FROM stock_local');
  while ($result = mysqli_fetch_array($qry5)) {
    $qry6 = $conn->query('SELECT * FROM productos WHERE idPRODUCTO = ' . $result['idPRODUCTO']);
    $qryProducto = mysqli_fetch_array($qry6);
    $qry7 = $conn->query('SELECT * FROM locales WHERE idLOCAL = ' . $result['idLOCAL']);
    $qryLocal = mysqli_fetch_array($qry7);
    $qry8 = $conn->query('SELECT * FROM ciudades WHERE idCIUDAD = ' . $qryLocal['idCIUDAD']);
    $qryCiudad = mysqli_fetch_array($qry8);

    echo '<tr>';
    echo '<td>';
    echo $qryLocal['local'] . ' - ' . $qryCiudad['ciudad'];
    echo '</td>';
    echo '<td>';
    echo $qryProducto['producto'];
    echo '</td>';
    echo '<td>';
    echo $result['stock'];
    echo '</td>';
    /*  echo '<td>';
    echo '<a href="./deleteRol.php?id=' . $result['idROL'] . '">Eliminar<a/>';
    echo '</td>'; */
  }
}

$stock = '';
$producto = '';
$local = '';

if (!empty($_POST["stock"]) && !empty($_POST["producto"]) && !empty($_POST["local"])) {
  $GLOBALS['stock'] = $_POST["stock"];
  $GLOBALS['producto'] = $_POST["producto"];
  $GLOBALS['local'] = $_POST["local"];

  $validar = $conn->query("SELECT * FROM stock_local WHERE idPRODUCTO = '$producto' AND idLOCAL = '$local'");
  if (mysqli_num_rows($validar) == 0) {
    $qry2 = $conn->query("INSERT INTO stock_local (stock, idPRODUCTO, idLOCAL) VALUES ($stock,'$producto','$local')");
  } else {
    $Antiguo = mysqli_fetch_array($validar);
    $qry2 = $conn->query("UPDATE stock_local SET stock = " . $Antiguo['stock'] . " + $stock WHERE idPRODUCTO = '$producto' AND idLOCAL = '$local'");
  }


  if ($qry2) {
    header("Location: ./insertStock.php");
  } else {
    echo
    '<script language="javascript">alert("ERROR AL REGISTRAR LOCAL. Local ya existe. Intente nuevamente.");</script>';
  }
};


echo $footer_html;
