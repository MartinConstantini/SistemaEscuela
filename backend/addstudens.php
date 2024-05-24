<?php
session_start();

if (empty($_SESSION['escuela'])) {
    // Si está vacía, redirige a la página ../pagues/login.php
    header("Location: ../pagues/login.php");
    exit(); // Termina el script
}

// Si la variable de sesión $escuela no está vacía, asigna su valor a la variable $escuela
$escuela = $_SESSION['escuela'];

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "escuela";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$carrera = $_POST['carrera'];
$about = $_POST['about'];
$image_data = isset($_FILES["imagen"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])) : null;
$class = $_POST['class'];

// Validar campos vacíos
if (empty($nombre) || empty($genero) || empty($email) || empty($edad) || empty($carrera) || empty($about) || empty($image_data) || empty($class)) {
    // Redirigir a otra página si algún campo está vacío
    header("Location: ../pagues/alum.php?alert=error");
    exit(); // Termina el script
}

// Validar si ya existe un registro con el mismo nombre o correo electrónico
$sql_check_duplicate = "SELECT COUNT(*) AS count FROM estudiante WHERE (Nombre = '$nombre' OR Email = '$email') AND Escuela = '$escuela'";
$result_check_duplicate = $conn->query($sql_check_duplicate);
$row_check_duplicate = $result_check_duplicate->fetch_assoc();

if ($row_check_duplicate['count'] > 0) {
    // Redirigir a otra página si ya existe un registro con el mismo nombre o correo electrónico
    header("Location: ../pagues/alum.php?alert=error");
    exit(); // Termina el script
}

$sql = "INSERT INTO `estudiante`(`Nombre`, `Genero`, `Email`, `Edad`, `Carrera`, `About`, `Imagen`, `Class`, `Escuela`) VALUES ('$nombre', '$genero', '$email', '$edad', '$carrera', '$about', '$image_data', '$class', '$escuela')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a otra página si la inserción es exitosa
    header("Location: ../pagues/alum.php?alert=success");
    exit(); // Termina el script
} else {
    header("Location: ../pagues/alum.php?alert=error");
    exit();
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
