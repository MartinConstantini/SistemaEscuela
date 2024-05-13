<?php
$servidor = "mysql:host=localhost:8889;dbname=sistema;charset=utf8";
$usuario = "root";
$password = "root";
try {
    $pdo = new PDO($servidor, $usuario, $password);
} catch (PDOException $e) {
    echo "No nos pudimos conectar: " . $e->getMessage();
}
?>