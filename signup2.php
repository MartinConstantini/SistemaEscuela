<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS para estilos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .form-group {
            position: relative;
            margin-bottom: 15px;
        }

        .password-input {
            width: 100%;
            padding-right: 30px; /* Espacio para el icono */
            box-sizing: border-box;
        }

        .password-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        .image-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Udemy school, Choose your password</h1>
    <div class="container">
        <form id="loginForm" method="POST" action="backend/index.php" onsubmit="return validateForm()">
            <input type="hidden" name="accion" value="login">

            <div class="form-group">
                <h2>Choose a password</h2>
            </div>

            <div class="form-group">
                <input type="password" id="password" class="password-input" placeholder="Enter your password">
                <span class="password-icon" onclick="togglePasswordVisibilityy()">
                    <i class="fas fa-eye" id="togglePasswordIcon1"></i>
                </span>
            </div>

            <div class="form-group">
                <h2>Confirm password</h2>
            </div>

            <div class="form-group">
                <input type="password" id="password2" class="password-input" placeholder="Repeat your password">
                <span class="password-icon" onclick="togglePasswordVisibility2()">
                    <i class="fas fa-eye" id="togglePasswordIcon2"></i>
                </span>
            </div>

            <div class="form-group">
                <h2>Must be at least 8 characters.</h2>
            </div>
            <div class="form-group">
                <button type="submit" name="btnpass">Next</button>
            </div>
        </form>
    </div>
    <div class="image-container">
    <img src="udemy-logo.png" alt="Udemy Logo">
    </div>
    <script>
        function togglePasswordVisibilityy() {
            var passwordInput = document.getElementById("password");
            var icon = document.getElementById("togglePasswordIcon1");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById("password2");
            var icon = document.getElementById("togglePasswordIcon2");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        function validateForm() {
            var password = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }
            if (password !== password2) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
