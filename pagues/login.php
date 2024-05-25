<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
// Verifica si hay una alerta definida en la URL
if (isset($_GET['alert'])) {
    // Muestra la alerta de error si se recibe 'error' como parámetro
    if ($_GET['alert'] === 'error') {
        echo '<div class="alert alert-danger" role="alert" style="position: absolute; top: 20px; right: 20px; z-index: 9999;">';
        echo 'Fail to sign up';
        echo '</div>';
    }
    // Muestra la alerta de éxito si se recibe 'success' como parámetro
    elseif ($_GET['alert'] === 'success') {
        echo '<div class="alert alert-success" role="alert" style="position: absolute; top: 20px; right: 20px; z-index: 9999;">';
        echo 'Registration Successful!';
        echo 'LogIn NOW';
        echo '</div>';
    }
    // Muestra la alerta de advertencia si se recibe 'errorLog' como parámetro
    elseif ($_GET['alert'] === 'errorLog') {
        echo '<div class="alert alert-warning" role="alert" style="position: absolute; top: 20px; right: 20px; z-index: 9999;">';
        echo 'Emmail Or Password are Incorrer.  Try Again';
        echo '</div>';
    }
}
?>

    <h1>Welcome, Log into your account</h1>

    <div class="main-content">
        <div class="container" style="width: 500px;">
            <form id="loginForm" method="POST" action="../backend/index.php">
                <input type="hidden" name="accion" value="login">

                <div class="form-group">
                    <h2>It is our great pleasure to have</h2>
                    <h2>you on board!</h2>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="email" placeholder="Enter the school email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group button-container">
                    <button type="submit" name="btnsig">Next</button>
                </div>
            </form>
            <div class="signup-text">
                <p>Don't have an account? <a href="Signup1.php" class="signup-link">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
// Script para ocultar las alertas después de 5 segundos
window.onload = function() {
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.style.display = 'none';
        });

        // Elimina el parámetro 'alert' de la URL
        var url = new URL(window.location.href);
        url.searchParams.delete('alert');
        window.history.replaceState(null, null, url);
    }, 5000); // 5000 milisegundos = 5 segundos
};
</script>
</body>
</html>
