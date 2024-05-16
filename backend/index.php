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
$escuela = ""; // Inicializa la variable de la escuela

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verifica las credenciales en la base de datos
    $consulta = "SELECT * FROM adminis WHERE Email = :email AND Password = :password";
    $statement = $conexion->prepare($consulta);
    $statement->execute(array(":email" => $email, ":password" => $password));
    $usuario = $statement->fetch(PDO::FETCH_ASSOC);

    // Si se encuentra un usuario con las credenciales proporcionadas
    if ($usuario) {
        // Realiza la nueva consulta para obtener el nombre de la escuela
        $consulta_escuela = "SELECT `Escuela` FROM `adminis` WHERE `Email` = :email";
        $statement_escuela = $conexion->prepare($consulta_escuela);
        $statement_escuela->execute(array(":email" => $email));
        $result_escuela = $statement_escuela->fetch(PDO::FETCH_ASSOC);

        // Almacena el nombre de la escuela en la variable $escuela
        $escuela = $result_escuela['Escuela'];
        
        // Realiza la nueva consulta para obtener el nombre del estudiante
        $consulta_nombre = "SELECT `Nombre` FROM `adminis` WHERE `Email` = :email";
        $statement_nombre = $conexion->prepare($consulta_nombre);
        $statement_nombre->execute(array(":email" => $email));
        $result_nombre = $statement_nombre->fetch(PDO::FETCH_ASSOC);



// Almacena el nombre del estudiante en la variable $nombre
        $nombre = $result_nombre['Nombre'];

        // Almacena la escuela en una sesión
        session_start();
        $_SESSION['escuela'] = $escuela;
        $_SESSION['nombre'] = $nombre;
        // Redirige a la página principal
        header("Location: ../dashboar.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, establece el mensaje de error
        $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

// Si hay un mensaje de error o la escuela no está definida, no redirigir al usuario
if (!empty($error_message) || empty($escuela)) {
    header("Location: ../index.html");
    exit(); // Termina el script
}
?>
