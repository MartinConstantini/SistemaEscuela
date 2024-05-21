<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Establece la variable $escuela como vacía
$escuela = "";

// Redirige a la página de inicio o a cualquier otra página deseada
header("Location: /escuela/pagues/login.php");
exit();
?>
