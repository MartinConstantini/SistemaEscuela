<?php
session_start();
?>
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
    <h1>Welcome, Log into your account</h1>

    <div class="main-content">
        <div class="container" style="width: 500px;">
            <?php
            // Mostrar la alerta si existe un mensaje de error
            if (isset($_SESSION["error_message"])) {
                echo '<div class="alert alert-warning" role="alert">' . $_SESSION["error_message"] . '</div>';
                unset($_SESSION["error_message"]); // Limpiar el mensaje de error
            }
            ?>
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
        // Mostrar la alerta de error después de 3 segundos
        setTimeout(function(){
            var alertElement = document.querySelector('.alert');
            if (alertElement) {
                alertElement.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>
