<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS para estilos -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px; /* Ajustar el ancho máximo del contenedor */
            margin: 0 auto; /* Centrar el contenedor en la página */
            padding: 20px;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome, create your school account</h1>
    <div class="container">
        <form id="loginForm" method="POST" action="backend/index.php">
            <input type="hidden" name="accion" value="login">

            <div class="form-group">
                <h2>It is our great pleasure to have</h2>
                <h2>you on board!</h2>
            </div>
            <div class="form-group">
                <input type="text" name="namead" id="namead" placeholder="Enter the name of admin" required>
            </div>
            <div class="form-group">
                <input type="text" name="namesc" id="namesc" placeholder="Enter the name of school" required>
            </div>
            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Enter the school email" required>
            </div>
            <div class="form-group">
                <button type="submit" name="btnsig">Next</button>
            </div>
        </form>
        <div class="signup-text">
            <p>Already have an account? <a href="SignUp" class="signup-link">Sign Up</a></p>
        </div>
    </div>
    <div class="image-container">
        <img src="udemy-logo0.png" alt="Udemy Logo">
    </div>
</body>
</html>
