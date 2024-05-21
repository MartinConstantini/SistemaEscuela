<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 14px; /* Reducir el tamaño de fuente base */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffffff;
        }
        .container {
            max-width: 600px; /* Ajustar el ancho máximo del contenedor */
            width: 90%; /* Asegurar que el contenedor ocupe el 90% del ancho disponible */
            margin: 0 auto; /* Centrar el contenedor en la página */
            padding: 10px; /* Reducir el padding */
            box-sizing: border-box;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px; /* Reducir el margen inferior */
        }
        .form-group h2 {
            font-size: 18px; /* Reducir el tamaño de fuente de los encabezados */
        }
        .form-group input, .form-group button {
            font-size: 14px; /* Ajustar el tamaño de fuente de los inputs y botón */
            padding: 8px; /* Reducir el padding de los inputs y botón */
            width: 100%; /* Ajustar el ancho de los inputs y botón */
        }
        .form-group button {
            margin-top: 15px; /* Añadir margen superior al botón */
        }
        .signup-text p {
            font-size: 14px; /* Reducir el tamaño de fuente del texto de signup */
        }
        .progress-container {
            width: 440px; /* Ancho fijo de la barra de progreso */
            margin: 40px auto 0 auto; /* Centrando la barra de progreso y reducir margen */
            text-align: center;
            position: relative;
        }
        .progress-circles {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            top: -13px; /* Mover los círculos hacia arriba */
        }
        .circle {
            width: 25px; /* Reducir el tamaño de los círculos */
            height: 25px; /* Reducir el tamaño de los círculos */
            border-radius: 50%;
            background-color: #F2F4F7;
            display: inline-block;
            position: relative;
        }
        .circle:first-child {
            background-color: #007bff; /* El primer círculo es azul */
        }
        .circle::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px; /* Reducir el tamaño del círculo interior */
            height: 12px; /* Reducir el tamaño del círculo interior */
            background-color: white;
            border-radius: 50%;
        }
        .progress {
            height: 8px; /* Reducir la altura de la barra de progreso */
            background-color: #e9ecef;
            position: relative;
            margin-top: 15px; /* Reducir el margen superior */
            width: 100%; /* Asegurar que la barra de progreso llene el contenedor */
        }
        .progress-bar {
            height: 100%;
            background-color: #007bff;
        }
        .progress-text {
            display: flex;
            justify-content: space-between;
            margin-top: 5px; /* Reducir el margen superior */
        }
        .progress-text div {
            text-align: center;
            width: 33%; /* Ancho igual para cada bloque de texto */
            font-size: 12px; /* Reducir el tamaño de fuente del texto */
        }
        .progress-text .text-title {
            color: #344054;
            margin: 0;
        }
        .progress-text .text-subtitle {
            color: #667085;
            margin: 0;
        }
        .button-container {
            text-align: center; /* Centrar el botón */
        }
        .header {
            text-align: center;
            padding: 20px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            
            background-color: #ffffff;
        }
        .footer {
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000;
            background-color: #ffffff;
        }
        .main-content {
            margin-top: 80px; /* Ajustar el margen superior para evitar que el contenido se superponga con el encabezado */
            margin-bottom: 80px; /* Ajustar el margen inferior para evitar que el contenido se superponga con el pie de página */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome, create your school account</h1>
    </div>

    <div class="main-content">
        <div class="container" style="width: 500px;">
            <form id="loginForm" method="POST" action="../backend/singbak.php">
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
                <div class="form-group button-container">
                    <button type="submit" name="btnsig">Next</button>
                </div>

            </form>
            <div class="signup-text">
                <p>Already have an account? <a href="login.php" class="signup-link">Log In</a></p>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="progress-container">
            <div class="progress-circles">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="progress progress-sm mb-2">
                <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="progress-text">
                <div>
                    <p class="text-title">Your details</p>
                    <p class="text-subtitle">Name and Email</p>
                </div>
                <div>
                    <p class="text-title">Choose a password</p>
                    <p class="text-subtitle">Choose a secure password</p>
                </div>
                <div>
                    <p class="text-title">Invite your team</p>
                    <p class="text-subtitle">Start collaborating</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>