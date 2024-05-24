<?php
// Archivo: backend/consultar_estudiante.php

// Configuración de la conexión a la base de datos
$servidor = "mysql:host=localhost:8889;dbname=escuela;charset=utf8";
$usuario = "root";
$password = "root";
session_start();

// Parámetro recibido desde la consulta AJAX
$clase = $_GET['clase'];
$escuela = $_SESSION['escuela'];

try {
    // Establecer conexión con la base de datos
    $conexion = new PDO($servidor, $usuario, $password);
    
    // Preparar la consulta SQL para contar la cantidad de estudiantes que comparten la misma clase
    $consulta = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM estudiante WHERE Class = :clase AND Escuela = '$escuela'");
    $consulta->bindParam(':clase', $clase, PDO::PARAM_STR);
    
    // Ejecutar la consulta
    $consulta->execute();
    
    // Obtener el resultado de la consulta
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    
    // Retornar la cantidad de estudiantes que comparten la misma clase
    echo $resultado['cantidad'];
    
} catch (PDOException $e) {
    // En caso de error, devolver un mensaje de error
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
