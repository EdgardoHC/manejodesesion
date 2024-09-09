<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Enlace 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Enlace 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Enlace 3</a>
    </li>
    <li class="nav-item dropdown ml-auto">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle"></i> <?php echo $_SESSION["USERNAME"]; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item small" href="../includes/logout.php">Cerrar sesi&oacute;n</a>
    </div>
</li>
  </ul>
</nav>
<br>

<div class="container-fluid">
  <h3>Bienvenido <?php echo $_SESSION["USERNAME"];?></h3>
  <p>Esta es la página de inicio</p>
  
</div>

</body>
</html>
