<?php
session_start();

// Recopilar datos del formulario
if(isset($_POST['namead'], $_POST['namesc'], $_POST['email'])) {
    $namead = $_POST['namead'];
    $namesc = $_POST['namesc'];
    $email = $_POST['email'];

    // Guardar datos en variables de sesión
    $_SESSION['namead'] = $namead;
    $_SESSION['namesc'] = $namesc;
    $_SESSION['email'] = $email;
    
    // Redireccionar a otra página
    header("Location: ../signup2.php");
    exit();
} else {
    // Manejar caso en que no se reciban datos del formulario
    echo "Error: No se recibieron los datos del formulario.";
}
?>
