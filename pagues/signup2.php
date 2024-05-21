<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="../css/sig2.css">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="header">
    <h1>Choose a password</h1>
</div>

<div class="main-content">    
    <div class="container" style="width: 500px;">
        <form id="loginForm" method="POST" action="../backend/singback2.php">
            <input type="hidden" name="accion" value="login">

            <div class="form-group">
                <h2>Choose a password</h2>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" name="password" class="password-input form-control" placeholder="Enter your password">
                    <div class="input-group-append">
                        <button type="button" class="password-icon btn btn-outline-secondary" style="border: none;" onclick="togglePasswordVisibility('password', 'togglePasswordIcon1')">
                            <i class="fas fa-eye" id="togglePasswordIcon1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h2>Confirm password</h2>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password2" name="password2" class="password-input form-control" placeholder="Repeat your password">
                    <div class="input-group-append">
                        <button type="button" class="password-icon btn btn-outline-secondary" style="border: none;" onclick="togglePasswordVisibility('password2', 'togglePasswordIcon2')">
                            <i class="fas fa-eye" id="togglePasswordIcon2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h2>Must be at least 8 characters.</h2>
            </div>
            <div class="form-group">
                <button type="submit" name="btnpass" class="btn btn-primary" onclick="return validateForm()">Next</button>
            </div>
        </form>
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
            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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

<script>
    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var icon = document.getElementById(iconId);
        
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
