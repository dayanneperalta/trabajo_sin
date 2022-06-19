<?php
include './connection.php';
include './header.php';

echo $header_html;
echo '<div class="col-sm-2 mt-1 mb-2"><a class="ms-2" href="./login.php">Volver</a></div>
<h4 class="ms-2">Ingresar rol:</h4>
  <form action="" method="post" class="ms-2">
    <div class="row mb-3">
      <label for="rol" class="col-sm-1 col-form-label">Rol:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="rol" name="rol" autofocus required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar rol</button>
  </form>';

$rol = '';

if (!empty($_POST["rol"])) {
  $rol = $_POST["rol"];
};

if ($conn) {
  $qry = $conn->query('SELECT * from roles');

  echo "<div class='container mt-5'>
          <div class='row'>
            <div class='col-sm-8'>
              <h3>Roles</h3>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-2'>&nbsp;</div>
            <div class='col-sm-8'>
              <table class='table'>
                <thead>
                  <tr>
                    <td>idROL</td>
                    <td>rol</td>
                    <td>Opciones</td>
                  </tr>
                </thead>
              <tbody>";

  while ($result = mysqli_fetch_array($qry)) {
    echo '<tr>';
    echo '<td>';
    echo $result['idROL'];
    echo '</td>';
    echo '<td>';
    echo $result['rol'];
    echo '</td>';
    echo '<td>';
    echo '<a href="./deleteRol.php?id=' . $result['idROL'] . '">Eliminar<a/>';
    echo '</td>';
  }

  if ($rol) {
    $qry2 = $conn->query("INSERT INTO roles (rol) VALUES ('$rol')");
    if ($qry2) {
      header("Location: ./insertRoles.php");
    }
  };
} else {
  echo "Error to connect database with rol: $rol";
}

echo $footer_html;
