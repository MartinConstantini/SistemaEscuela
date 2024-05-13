<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dcdcdc; /* Cambiado a gris claro */
        }

        .container {
            width: 500px;
            margin: 100px auto;
            text-align: center;
            background-color: white; /* Cambiado a blanco */
            padding: 20px; /* Añadido un poco de espacio alrededor del formulario */
            border-radius: 8px; /* Añadido un poco de borde redondeado al formulario */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Añadida una sombra alrededor del formulario */
        }

        h1 {
            text-align: center; 
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left; /* Centrar texto del grupo de formulario */
        }

        label {
            margin: 0 auto; /* Centrar los inputs */
            display: block; 
            font-weight: bold; /* Hacer el texto del label en negrita */
        }
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin: 0 auto; /* Centrar los inputs */
            display: block; /* Hacer que los inputs ocupen todo el ancho disponible */
        }

        button {
            background-color: #2D88D4; /* Cambiar el color del botón */
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 auto; /* Centrar los inputs */
            display: block; 
            width: 80%;
        }

        button:hover {
            background-color: #1F6CB7; /* Cambiar color de fondo en hover */
        }

        .signup-text {
            margin-top: 15px; /* Agregar espacio entre el botón y el texto de registro */
        }

        .signup-link {
            color: #2D88D4; /* Cambiar color del enlace */
            text-decoration: none; /* Quitar subrayado */
        }

        .signup-link:hover {
            text-decoration: underline; /* Agregar subrayado al pasar el mouse */
        }
    </style>
</head>
<body>
<h1>Welcome, Log into your account</h1>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <p>It is our great pleasure to have you on board!</p>
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="signup-text">
            <p>Don't have an account? <a href="SignUp" class="signup-link">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
