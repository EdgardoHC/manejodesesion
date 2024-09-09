<?php
// Inicializar la sesión.
session_start();
// Destruir todas las variables de sesión.
    $_SESSION = array(); //Vaciamos las variables de sesión para luego destruirlas
// para destruir la sesión completamente, borramos también la cookie de sesión.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión y redireccionar al index
    if (session_destroy()) {
        header("Location: ../index.php");
    }
    
   

?>