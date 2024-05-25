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
$about = $_POST['about'];
$subject = $_POST['subject'];
$image_data = isset($_FILES["imagen"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])) : null;
$class = $_POST['class'];

// Validar campos vacíos
if (empty($nombre) || empty($genero) || empty($email) || empty($edad) || empty($about) || empty($image_data) || empty($class)) {
    echo "No llegaron datos \t"; // Muestra un mensaje si algún campo está vacío

    // Mostrar los campos que faltan
    if (empty($nombre)) {
        echo "Name is missing<br>";
    } else {
        echo "Name: $nombre<br>";
    }
    if (empty($genero)) {
        echo "Gender is missing<br>";
    } else {
        echo "Gender: $genero<br>";
    }
    if (empty($email)) {
        echo "Email is missing<br>";
    } else {
        echo "Email: $email<br>";
    }
    if (empty($edad)) {
        echo "Age is missing<br>";
    } else {
        echo "Age: $edad<br>";
    }
    if (empty($about)) {
        echo "About is missing<br>";
    } else {
        echo "About: $about<br>";
    }
    if (empty($image_data)) {
        echo "Photo is missing<br>";
    } else {
        echo "Photo is uploaded<br>";
    }
    if (empty($class)) {
        echo "Class is missing<br>";
    } else {
        echo "Class: $class<br>";
    }
    exit(); // Termina el script
}


// Validar si ya existe un registro con el mismo nombre o correo electrónico
$sql_check_duplicate = "SELECT COUNT(*) AS count FROM maestros WHERE (Nombre = '$nombre' OR Email = '$email') AND Escuela = '$escuela'";
$result_check_duplicate = $conn->query($sql_check_duplicate);
$row_check_duplicate = $result_check_duplicate->fetch_assoc();

if ($row_check_duplicate['count'] > 0) {
    // Redirigir a otra página si ya existe un registro con el mismo nombre o correo electrónico
    header("Location: ../pagues/teacher.php?alert=error");
    //echo "Duplicado";
    exit(); // Termina el script
}

$sql = "INSERT INTO `maestros`(`Subject`, `Nombre`, `Email`, `Class`, `Genero`, `Escuela`, `Imagen`, `About`, `Age`) 
VALUES ('$subject', '$nombre', '$email', '$class', '$genero', '$escuela', '$image_data', '$about', '$edad')
";

if ($conn->query($sql) === TRUE) {
    // Redirigir a otra página si la inserción es exitosa
    header("Location: ../pagues/teacher.php?alert=success");
    exit(); // Termina el script
} else {
    header("Location: ../pagues/teacher.php?alert=error");
    exit();
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
