<?php
//echo password_hash('123456edgardo', PASSWORD_DEFAULT);
session_start();

if (!isset($_SESSION["USERNAME"])) {//Si no hay sesión iniciada, lo dejará ver esta pantalla.
    ?>
    <!DOCTYPE html>
    <html lang="es-SV">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

          
            <title></title>
        </head>
        <body>
            <div class="container-fluid">
                <!-- Barra superior -->
                <div class="row">
                    <div class="col-sm-2">
                        <!--<img src="imgs/logop.png" class="img-responsive mx-auto d-block" alt="logo">-->
                    </div>
                    <div class="col-sm-8 text-center align-self-center">
                        <!--<strong>Inicio de sesión</strong>-->
                    </div>
                </div>

                <!-- Secciones -->
                <div class="row d-flex justify-content-center">

                    <!-- Inicio de sesión -->
                    <div class="col-sm-5 order-sm-1 py-3">
                        <div class="card">
                            <div class="card-header bg-UM text-center"><i class="fas fa-sign-in-alt small"></i> Inicio de sesi&oacute;n</div>
                            <div class="card-body">
                                <div class="py-3">
                                    <!--<img src="" alt="logo" class="mx-auto d-block img-logo-15v rounded" width="220" height="60"/>-->
                                </div>
                                <div id="error">
                                    <!-- msg err ! -->
                                </div>
                                <form id="loginForm" action="" method="post">

                                    <div class="form-group">

                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" required="true" class="form-control" autofocus />
                                    </div>

                                    <div class="form-group campo">
                                        <label for="contrasena">Contrase&ntilde;a:</label>
                                        <input type="password" name="password" id="password" required="true" class="form-control" />
                                    </div>
                                    <button type="submit" id="btn-login" name="login" class="btn btn-primary">Iniciar Sesión</button>
                                </form>

                            </div>
                            <div id="alerta"></div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <!-- /Inicio de sesión -->

                </div>
                <!-- /Secciones -->

                <hr class="margen-top-20" />
                <div class="d-flex justify-content-center"> <?php echo date("Y"); ?></div>
            </div><!-- container -->

            <!-- Bootstrap -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/index.js"></script>

        </body>
    </html>
    <?php
} else {
    header("Location: inicio/index.php");
}