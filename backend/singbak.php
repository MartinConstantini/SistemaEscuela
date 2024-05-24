<?php
session_start();

// Conexión a la base de datos
$servidor = "mysql:host=localhost:8889;dbname=escuela;charset=utf8";
$usuario = "root";
$password = "root";

try {
    $conexion = new PDO($servidor, $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

// Recopilar datos del formulario
if (isset($_POST['namead'], $_POST['namesc'], $_POST['email'])) {
    $namead = $_POST['namead'];
    $namesc = $_POST['namesc'];
    $email = $_POST['email'];

    // Consulta para verificar si el email o el nombre ya están registrados
    $query = $conexion->prepare("SELECT * FROM adminis WHERE `Email` = ? OR `Nombre` = ?");
    $query->execute([$email, $namead]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Si ya existe un registro con el mismo email o nombre, muestra la alerta
        $_SESSION["error"] = "This user is already registered—check it out!";
        header("Location: ../pagues/Signup1.php");
        exit();
    } else {
        // Si no existe un registro con el mismo email o nombre, guarda los datos en variables de sesión
        $_SESSION['namead'] = $namead;
        $_SESSION['namesc'] = $namesc;
        $_SESSION['email'] = $email;

        // Redireccionar a otra página
        header("Location: ../pagues/signup2.php");
        exit();
    }
} else {
    // Manejar caso en que no se reciban datos del formulario
    echo "Error: No se recibieron los datos del formulario.";
}
?>
