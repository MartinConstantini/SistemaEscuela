<?php
session_start();

// Verificar si se han establecido todas las variables de sesión necesarias
if (isset($_SESSION['namead'], $_SESSION['namesc'], $_SESSION['email'], $_SESSION['password'], $_SESSION['StafN'], $_SESSION['AdressEs'])) {
    // Obtener los valores de las variables de sesión
    $email = $_SESSION['email'];
    $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT); // Se encripta la contraseña
    $namead = $_SESSION['namead'];
    $schoolAddress = $_SESSION['AdressEs'];
    $schoolName = $_SESSION['namesc'];
    $staffNumber = $_SESSION['StafN'];

    // Establecer conexión con la base de datos
    $servername = "localhost:8889";  // Cambia esto a tu servidor
    $username = "root";         // Cambia esto a tu nombre de usuario de la base de datos
    $passwordDB = "root";           // Cambia esto a tu contraseña de la base de datos
    $dbname = "escuela"; // Cambia esto al nombre de tu base de datos

    $conn = new mysqli($servername, $username, $passwordDB, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y vincular la consulta SQL
    $stmt = $conn->prepare("INSERT INTO `adminis`(`Email`, `Password`, `Nombre`, `Dirreccion`, `Escuela`, `StafN`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $password, $namead, $schoolAddress, $schoolName, $staffNumber);

    // Ejecutar la consulta
    if ($stmt->execute()) {
      //  echo "Registro completado con éxito.";
        header("Location: ../pagues/login.php");
        // Redirigir a otra página o mostrar un mensaje de éxito
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();

    // Opcionalmente, destruir las variables de sesión
    session_unset();
    session_destroy();
} else {
    // Redirigir a la primera página del formulario si faltan datos
    header("Location: ../pagues/Signup1.php");
    exit();
}
?>
