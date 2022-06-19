<?php
include "./connection.php";
include "./header.php";

if ($_SESSION['user_rol'] == 1) {
  echo $header_html;
  if ($conn) {
    $qry = $conn->query('SELECT * from usuarios');

    echo "<div class='col-sm-2 mt-1 mb-2'><a class='ms-2' href='./login.php'>Volver</a></div>
    <div class='container mt-4'>
          <div class='row'>
            <div class='col-sm-auto'>
              <h3>Usuarios</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>idUSUARIO</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Nickname</td>
                    <td>Rol</td>
                    <td>Ciudad</td>
                  </tr>
                </thead>
              <tbody>";

    while ($result = mysqli_fetch_array($qry)) {
      $qryROL = $conn->query('SELECT upper(rol) rol FROM roles  WHERE idROL = ' . $result['idROL']);
      $qryCIUDAD = $conn->query("SELECT * FROM ciudades WHERE idCIUDAD = " . $result['idCIUDAD']);
      $rolRow = mysqli_fetch_array($qryROL);
      $ciudadRow = mysqli_fetch_array($qryCIUDAD);
      echo '<tr>';
      echo '<td>';
      echo $result['idUSUARIO'];
      echo '</td>';
      echo '<td>';
      echo $result['nombres'];
      echo '</td>';
      echo '<td>';
      echo $result['apellidos'];
      echo '</td>';
      echo '<td>';
      echo $result['nickname'];
      echo '</td>';
      echo '<td>';
      echo $rolRow['rol'];
      echo '</td>';
      echo '<td>';
      echo $ciudadRow['ciudad'];
      echo '</td>';
      /* echo '<td>';
      echo '<a href="./deleteCiudad.php?id=' . $result['idCIUDAD'] . '">Eliminar<a/>';
      echo '</td>'; */
    }
  }

  echo $footer_html;
} else {
  echo
  '<script language="javascript">alert("NO POSEE PRIVILEGIOS NECESARIOS PARA INGRESAR");</script>';
}
