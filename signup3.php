<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number and Adress</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS para estilos -->
    <style>
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .image-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Udemy school, Choose your staffs</h1>
    <div class="container">
        <form id="loginForm" method="POST" action="backend/index.php">
            <input type="hidden" name="accion" value="login">

            <div class="form-group">
                <select name="staffNumber" id="staffNumber" required>
                    <option value="">Select staff number</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>

            <div class="form-group">
                <select name="schoolAddress" id="schoolAddress" required>
                    <option value="">Select school address</option>
                    <option value="Irapuato">Irapuato</option>
                    <option value="Salamanca">Salamanca</option>
                    <option value="Leon">Leon</option>
                    <option value="Celaya">Celaya</option>
                    <option value="Abasolo">Abasolo</option>
                    <option value="Juventino Rosas">Juventino Rosas</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" name="btnsig">Next</button>
            </div>
        </form>
    </div>
    <div class="image-container">
    <img src="content.png" alt="Udemy Logo">
    </div>
</body>
</html>
