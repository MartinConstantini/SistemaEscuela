<?php
session_start();

// Verificar si se ha enviado el formulario
if (isset($_POST['StafN'], $_POST['AdressEs'])) {
    // Obtener los valores del formulario
    $stafnu = $_POST["StafN"];
    $schooladres = $_POST["AdressEs"];

    // Almacenar los datos en variables de sesión
    $_SESSION["StafN"] = $stafnu;
    $_SESSION["AdressEs"] = $schooladres;

    // Redireccionar a la siguiente página
    header("Location: ../backend/sigup.php");
    exit();
} else {
    // Si se intenta acceder a este archivo directamente sin enviar el formulario, redireccionar al formulario
    header("Location: ../pagues/signup3.php");
    exit();
}
?>
