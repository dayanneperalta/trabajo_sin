<?php
include "./connection.php";
include "./header.php";


echo $header_html;

if (isset($_SESSION['user_id'])) {
  echo "<h3 class='mt-3 ms-2'>Bienvenido, " . $_SESSION['user_id'] . "</h3>";
  echo '<form action="./login.php" method=post>
  <button class="btn btn-primary ms-2" name="logout">LOG OUT</button>
  </form>';
} else {
  echo '
<h4>Iniciar sesión:</h4>
  <form action="" method="post">
    <div class="row mb-3">
      <label for="nickname" class="col-sm-2 col-form-label">Nickname:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="nickname" name="nickname" autofocus required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="password" class="col-sm-2 col-form-label">Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
  </form>
  <div>
  <a href="./newUser.php">Registrarse</a>
  </div>
  ';


  $nickname = '';
  $password = '';

  if (!empty($_POST["nickname"]) && !empty($_POST["password"])) {
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];

    if ($conn) {
      $qry = $conn->query("SELECT idUSUARIO,nickname FROM usuarios WHERE nickname = '$nickname'");
      if (mysqli_num_rows($qry) == 1) {
        $user = mysqli_fetch_array($qry);
        $pass = md5($password);

        $qry2 = $conn->query('SELECT idCONTRASENA FROM contrasenas WHERE idUSUARIO =' . $user['idUSUARIO'] . " AND contrasena = '$pass'");
        if (mysqli_num_rows($qry2) == 1) {
          $_SESSION['user_id'] = $nickname;
          header("Location: ./login.php");
        } else {
          echo
          '<script language="javascript">alert("Contraseña inválida");</script>';
        }
      } else {
        echo
        '<script language="javascript">alert("No existe usuario con nickname ' . $nickname . ' ");</script>';
      }
    }
  }
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: ./login.php");
}









echo $footer_html;
