<?php session_start();
if (empty($_SESSION['escuela']) || empty($_SESSION['nombre'])) {
    header("Location: /escuela/pagues/login.php");
    exit();
}
$escuela = $_SESSION['escuela'];
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Manager <?php echo $escuela; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/alumta.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #152259;">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-fw fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">School Manager <?php echo $escuela; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item rounded">
                <a class="nav-link" href="dashboar.php" style="color: white;">
                    <i class="fas fa-fw fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item rounded">
                <a class="nav-link" href="teacher.php" style="color: white;">
                    <i class="fas fa-fw fa-chalkboard-user"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="nav-item rounded" style="background-color: #2D88D4;">
                <a class="nav-link" href="" style="color: white;">
                    <i class="fas fa-fw fa-user-pen"></i>
                    <span>Students/class</span>
                </a>
            </li>

            <li class="nav-item rounded">
                <a class="nav-link" href="#" style="color: white;">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Billing</span>
                </a>
            </li>

            <li class="nav-item rounded">
                <a class="nav-link" href="#" style="color: white;">
                    <i class="fas fa-fw fa-gear"></i>
                    <span>Settings and profile</span>
                </a>
            </li>

            <li class="nav-item rounded">
                <a class="nav-link" href="#" style="color: white;">
                    <i class="fas fa-fw fa-file-lines"></i>
                    <span>Exams</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Alertas -->
<?php
// Verifica si hay una alerta definida en la URL
if (isset($_GET['alert'])) {
    // Muestra la alerta de error si se recibe 'error' como parámetro
    if ($_GET['alert'] === 'error') {
        echo '<div class="alert alert-danger" role="alert" style="position: absolute; top: 20px; right: 20px; z-index: 9999;">';
        echo 'Registration Error: Existing User or Duplicate Fields';
        echo '</div>';
    }
    // Muestra la alerta de éxito si se recibe 'success' como parámetro
    elseif ($_GET['alert'] === 'success') {
        echo '<div class="alert alert-success" role="alert" style="position: absolute; top: 20px; right: 20px; z-index: 9999;">';
        echo 'Registration Successful!';
        echo '</div>';
    }
}
?>


                <!-- FIN Alertas -->




                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="#" class="btn btn-light" style="color: #2671B1;">
                        <span class="text">Export CSV</span>
                    </a>

                    <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addAlum" style="background-color: #509CDB; color: white;">
                        <span class="text">Add student</span>
                    </a>

                    <div class="flex-container">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-1 flex-item table-container" style="width: 75%;">
                            <div class="card-header py-2">
                                <h6 class="m-0 font-weight-bold text-primary">Students From <?php echo $escuela; ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-striped">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                                        $servidor = "mysql:host=localhost:8889;dbname=escuela;charset=utf8";
                                        $usuario = "root";
                                        $password = "root";

                                        try {
                                            $conexion = new PDO($servidor, $usuario, $password);
                                            $consulta = $conexion->prepare("SELECT `Ncontrol`, `Nombre`, `Genero`, `Email`, `Escuela`, `Edad`, `Carrera`, `About`, `Imagen`, `Class` FROM `estudiante` WHERE `Escuela` = :escuela ");
                                            $consulta->bindParam(':escuela', $escuela, PDO::PARAM_STR);
                                            $consulta->execute();
                                            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                                        } catch (PDOException $e) {
                                            echo "Error al conectar a la base de datos: " . $e->getMessage();
                                        }
                                        ?>

                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>N Control</th>
                                                <th>Email</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($resultados as $fila) : ?>
                                                <tr onclick="showSelectedInfo('<?php echo $fila['Ncontrol']; ?>', '<?php echo base64_encode($fila['Imagen']); ?>', '<?php echo $fila['Nombre']; ?>','<?php echo $fila['Carrera']; ?>', '<?php echo $fila['Genero']; ?>', '<?php echo $fila['Edad']; ?>', '<?php echo $fila['About']; ?>', '<?php echo $fila['Class']; ?>')">
                                                    <td>
                                                        <?php
                                                        // Genera la etiqueta <img> con la imagen codificada en base64 si está presente
                                                        if (!empty($fila['Imagen'])) {
                                                            echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($fila['Imagen']) . '"  alt="Imagen del estudiante" width="50">';
                                                        }
                                                        ?>
                                                        <!-- Muestra siempre el nombre del estudiante -->
                                                        <?php echo $fila['Nombre']; ?>
                                                    </td>
                                                    <td><?php echo $fila['Ncontrol']; ?></td>
                                                    <td><?php echo $fila['Email']; ?></td>
                                                    <td><?php echo $fila['Class']; ?></td>
                                                    <td><?php echo $fila['Genero']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- inicio tarjeta de informacion-->
                        <div id="selectedInfo" class="card flex-item" style="width: 18rem; display: none;">
                        <div class="card-body">
                        <button id="closeButton" class="btn"><i class="fas fa-x"></i></button>
                            <h5 id="selectedNControl" class="card-title"></h5>
                            <img id="selectedImage" src="" class="rounded-circle" alt="Imagen del estudiante" width="200">
                            <p id="selectedNombre" class="card-text"></p>
                            <p id="selectedCarrera" class="card-text"></p>
                            <div id="iconos">
                                <i  class="fas fa-graduation-cap"></i>
                                <i  class="fas fa-phone-volume"></i>
                                <i  class="fas fa-envelope"></i>
                            </div>
                            <br>
                            <p>About:</p>
                            <p id="selectedAbout" class="card-text"></p>
                            <p id="selectedEdad" class="card-text"></p>
                            <p id="selectedEdadGenero" class="card-text"></p>
                            <p id="selectedCantidad" class="card-text"></p>

                        </div>
                    </div>


                        <!-- fin tarjeta de informacion -->


                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">See you </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../backend/logout.php">Exit</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal para add alums-->
    <div class="modal" id="addAlum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Botones -->
                    <div class="button-container">
                    <a href="#" class="btn btn-light add-another-btn">
            <span class="text">Manually</span>
        </a>

        <a href="#" class="btn btn-light add-another-btn">
            <span class="text">Inport CVS</span>
        </a>
    </div>


                <div class="modal-body">
     


                     <!--FORM-->
                     <form id="studentForm" action="../backend/addstudens.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required>

    <select class="custom-select" name="genero" id="genero" autocomplete="off" required>
        <option value="" selected disabled>Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="None">None</option>
    </select>

    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" autocomplete="off" required>

    <label for="edad">Age:</label>
    <input type="number" name="edad" id="edad" min="1" max="99" placeholder="Age" autocomplete="off" required>

    <select class="custom-select" name="carrera" id="carrera" autocomplete="off" required>
    <option value="" selected disabled>Selec a carrier</option>
        <option value="Accounting">Accounting</option>
<option value="Administration">Administration</option>
<option value="Agriculture">Agriculture</option>
<option value="Architecture">Architecture</option>
<option value="Biology">Biology</option>
<option value="Business Administration">Business Administration</option>
<option value="Chemistry">Chemistry</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Communication">Communication</option>
<option value="Computer Science">Computer Science</option>
<option value="Criminal Justice">Criminal Justice</option>
<option value="Dentistry">Dentistry</option>
<option value="Economics">Economics</option>
<option value="Education">Education</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Environmental Science">Environmental Science</option>
<option value="Finance">Finance</option>
<option value="Geology">Geology</option>
<option value="History">History</option>
<option value="Human Resources">Human Resources</option>
<option value="Industrial Engineering">Industrial Engineering</option>
<option value="International Relations">International Relations</option>
<option value="Law">Law</option>
<option value="Linguistics">Linguistics</option>
<option value="Management">Management</option>
<option value="Marketing">Marketing</option>
<option value="Mathematics">Mathematics</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Medicine">Medicine</option>
<option value="Nursing">Nursing</option>
<option value="Pharmacy">Pharmacy</option>
<option value="Philosophy">Philosophy</option>
<option value="Physics">Physics</option>
<option value="Political Science">Political Science</option>
<option value="Psychology">Psychology</option>
<option value="Public Administration">Public Administration</option>
<option value="Public Health">Public Health</option>
<option value="Sociology">Sociology</option>
<option value="Software Engineering">Software Engineering</option>
<option value="Statistics">Statistics</option>
<option value="Supply Chain Management">Supply Chain Management</option>
<option value="Telecommunications">Telecommunications</option>
<option value="Theater">Theater</option>
<option value="Tourism">Tourism</option>
<option value="Veterinary Medicine">Veterinary Medicine</option>
<option value="Visual Arts">Visual Arts</option>
        <option value="Other">Other</option>
    </select>

    <br>
    <label for="about">About:</label>
    <textarea name="about" id="about" cols="30" rows="5" autocomplete="off" required></textarea>
    <br>
    <div class="file-upload">
        <input type="file" name="imagen" id="imagen" onchange="checkFileSize()" class="file-input" autocomplete="off" required>
        <label for="imagen" class="file-label">
            <i class="fas fa-cloud-upload-alt"></i> Choose Photo Max 300KB
        </label>
    </div>

    <br>

    <input type="text" name="class" id="class" placeholder="Class" autocomplete="off" required>
    <br>
    <br>

    <!-- Espacio independiente -->
    <div class="form-container">
    </div>

    <!-- Botones -->
    <div class="button-container">
        <a href="#" class="btn btn-light add-another-btn">
            <span class="icon text-gray-600">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add another</span>
        </a>
        <input type="submit" value="Add student" name="submit" class="btn btn-light submit-btn">
    </div>
<!-- Botones -->

</form>

<!--FIN FORM-->


                </div>
                
            </div>
        </div>
    </div>
    <!-- FIN Modal para add alums-->





    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        function showSelectedInfo(ncontrol, image, nombre, carrera, genero, edad, about, clase) {
    document.getElementById('selectedInfo').style.display = 'block';
    document.getElementById('selectedNControl').innerText = "" + ncontrol;
    if (image) {
        document.getElementById('selectedImage').src = "data:image/jpeg;base64," + image;
    } else {
        document.getElementById('selectedImage').src = ""; // Si no hay imagen, deja el src vacío
    }
    document.getElementById('selectedNombre').innerText = "" + nombre;
    document.getElementById('selectedCarrera').innerText = "" + carrera;
    document.getElementById('selectedAbout').innerText = ""+ about;
    document.getElementById('selectedEdad').innerText = "Age: "+ edad;
    document.getElementById('selectedEdadGenero').innerText = "Gender: " + genero;
    
    // Realiza una consulta para contar la cantidad de estudiantes que comparten la misma clase
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var cantidad = xhr.responseText;
                document.getElementById('selectedCantidad').innerText = "People From the same Class: " + cantidad;
            } else {
                // Si hay algún error en la solicitud AJAX, muestra un mensaje de error
                console.error('Error en la solicitud AJAX: ' + xhr.statusText);
            }
        }
    };
    xhr.open("GET", "../backend/obNumAlum.php?clase=" + clase, true);
    xhr.send();
}

document.getElementById('closeButton').addEventListener('click', function () {
    document.getElementById('selectedInfo').style.display = 'none';
});
</script>

<script>
function checkFileSize() {
    var fileInput = document.getElementById('imagen');
    if (fileInput.files[0].size > 300000) { // Tamaño máximo en bytes (100 KB = 102400 bytes)
        alert('El tamaño del archivo no puede ser mayor a 100 KB.');
        fileInput.value = ''; // Limpiar el valor del input file
    }
}
</script>

<script>
function validateForm() {
    const form = document.getElementById('studentForm');
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    
    for (let input of inputs) {
        if (!input.value.trim()) {
            alert('Please fill out all required fields.');
            input.focus();
            return false;
        }
    }
    return true;
}
</script>

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
