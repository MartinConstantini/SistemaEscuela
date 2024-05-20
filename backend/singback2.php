<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $password = $_POST["password"];

    // Almacenar los datos en variables de sesión
    $_SESSION["password"] = $password;

    // Redireccionar a la siguiente página
    header("Location: ../signup3.php");
    exit;
} else {
    // Si se intenta acceder a este archivo directamente sin enviar el formulario, redireccionar al formulario
    header("Location: ../signup2.php");
    exit;
}
?>
