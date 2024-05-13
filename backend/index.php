<?php
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

$error_message = ""; // Inicializa el mensaje de error como vacío

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verifica las credenciales en la base de datos
    $consulta = "SELECT * FROM adminis WHERE Email = :email AND Password = :password";
    $statement = $conexion->prepare($consulta);
    $statement->execute(array(":email" => $email, ":password" => $password));
    $usuario = $statement->fetch(PDO::FETCH_ASSOC);

    // Si se encuentra un usuario con las credenciales proporcionadas, redirige a la página principal
    if ($usuario) {
        header("Location: ../principal/index.html");
        exit();
    } else {
        // Si las credenciales son incorrectas, establece el mensaje de error
        $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

// Si hay un mensaje de error, no redirigir al usuario
if (!empty($error_message)) {
    header("Location: ../index.html");
    exit(); // Termina el script
}
?>
