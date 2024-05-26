<?php session_start();
if (empty($_SESSION['escuela']) || empty($_SESSION['nombre'])) {
    // Si está vacía, redirige a la página ../index.php
    header("Location: ../index.php");
    exit(); // Termina el script
}
// Si la variable de sesión $escuela no está vacía, asigna su valor a la variable $escuela
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

     <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/teachers.css" rel="stylesheet">

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../principal/index.php">
                <div class="sidebar-brand-icon ">
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

            <li class="nav-item rounded" style="background-color: #2D88D4;">
                <a class="nav-link" href="" style="color: white;">
                <i class="fas fa-fw fa-chalkboard-user"></i>
                <span>Teachers</span>
                </a>
            </li>

            <li class="nav-item rounded">
                <a class="nav-link" href="alum.php" style="color: white;">            
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
                <span>Setings and profile</span>
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

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                                    
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

<!-- Informacion -->                
<div class="selected-info-container">
    <div id="selectedInfo" class="card flex-item">
        
<button id="closeButton" class="btn"><i class="fas fa-times"></i></button>
        <div class="card-body">
            
            <div class="column">
            <img id="selectedImage" src="" class="rounded-circle" alt="Imagen del estudiante" width="50px">    
            <strong><h5 id="selectedNombre" class="card-title"></h5></strong>
                <p id="selectedCarrera" class="card-text"></p>
                <div id="iconos">
                                <i  class="fas fa-graduation-cap"></i>
                                <i  class="fas fa-phone-volume"></i>
                                <i  class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="column">
                
                <p>About:</p>
                <p id="selectedAbout" class="card-text"></p>
                <br>
                <br>
                <p id="selectedEdadGenero" class="card-text"></p>
                <p id="selectedCantidad" class="card-text"></p>
            </div>
        </div>
    </div>
</div>


<!-- Fin informacion -->
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
                <div class="container-fluid" >
                <a href="#" class="btn btn-light" style="color: #2671B1;">
                <span class="text">Export CSV</span>
                </a>

                <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addTeach" style="background-color: #509CDB; color: white;">
                <span class="text">Add Teachers</span>
                </a>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-1 flex-item table-container" style="width: 100%;">
                            <div class="card-header py-1">
                            <h6 class="m-0 font-weight-bold text-primary">Teachers From <?php echo $escuela; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php
// Conexión a la base de datos
$servidor = "mysql:host=localhost:8889;dbname=escuela;charset=utf8";
$usuario = "root";
$password = "root";


try {
    $conexion = new PDO($servidor, $usuario, $password);
    // Preparar consulta SQL
    $consulta = $conexion->prepare("SELECT `Subject`, `Nombre`, `Email`, `Class`, `Genero`, `Id`, `Escuela`, `Imagen`, `About`, `Age` FROM `maestros` WHERE `Escuela` = :escuela "); // Cambiado a ':escuela' con minúscula
    $consulta->bindParam(':escuela', $escuela, PDO::PARAM_STR);
    // Ejecutar consulta
    $consulta->execute();
    // Obtener resultados
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>

<!-- Ahora, vamos a imprimir los resultados en la tabla -->
<thead>
    <tr>
        <th>Name</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Email</th>
        <th>Gender</th>
    </tr>
</thead>
<tbody>
<?php foreach ($resultados as $fila) : ?>
<tr onclick="showSelectedInfo('<?php echo $fila['Nombre']; ?>', '<?php echo base64_encode($fila['Imagen']); ?>', '<?php echo $fila['Subject']; ?>','<?php echo $fila['About']; ?>', '<?php echo $fila['Age']; ?>', '<?php echo $fila['Genero']; ?>', '<?php echo $fila['Class']; ?>')">
        <td>
        <?php
             // Genera la etiqueta <img> con la imagen codificada en base64 si está presente
            if (!empty($fila['Imagen'])) {
            echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($fila['Imagen']) . '"  alt="Imagen del estudiante" width="50">';
            }
            ?>
            <?php echo $fila['Nombre']; ?>
            </td>
            <td><?php echo $fila['Subject']; ?></td>
            <td><?php echo $fila['Class']; ?></td>
            <td><?php echo $fila['Email']; ?></td>
            <td><?php echo $fila['Genero']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

                                </table>
                            </div>
                        </div>
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


<!-- Modal para add Teachers-->
<div class="modal" id="addTeach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- Botones -->
            <div class="button-container">
                    <a href="#" class="btn add-another-btn">
                    <span class="text" style="color: black;">Manually</span>
        </a>

        <a href="#" class="btn add-another-btn">
        <span class="text" style="color: black;">Import CVS</span>
        </a>
    </div>
            <div class="modal-body">
                
            <!--FORM-->
                
    <form id="teacherForm" action="../backend/addteachr.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nombre">Name</label>
            <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required>
        </div>
        <div class="form-group col-md-4">
            <label for="class">Class</label>
            <input type="text" class="form-control" name="class" id="class" placeholder="Class" autocomplete="off" required>
        </div>
        <div class="form-group col-md-4">
            <label for="genero">Gender</label>
            <select class="form-control" name="genero" id="genero" autocomplete="off" required>
            <option value="" selected disabled>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="None">None</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edad">Age</label>
            <input type="number" class="form-control" name="edad" id="edad" min="1" max="99" autocomplete="off" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="about">About</label>
            <textarea name="about" class="form-control" id="about" cols="30" rows="5" autocomplete="off" required></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="imagen">Photo</label>
            <input type="file" class="form-control" name="imagen" id="imagen" onchange="checkFileSize()" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6">
        <label for="genero">Subject</label>
    <select class="form-control" name="subject" id="subject" autocomplete="off" required>
    <option value="" selected disabled>Select One</option>
    <option value="Mathematics">Mathematics</option>
    <option value="Science">Science</option>
    <option value="English">English</option>
    <option value="History">History</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Physical Education">Physical Education</option>
    <option value="Art">Art</option>
    <option value="Music">Music</option>
    <option value="Geography">Geography</option>
    <option value="Language Arts">Language Arts</option>
    <option value="Social Studies">Social Studies</option>
    <option value="Biology">Biology</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Physics">Physics</option>
    <option value="Economics">Economics</option>
    <option value="Psychology">Psychology</option>
    <option value="Sociology">Sociology</option>
    <option value="Physical Science">Physical Science</option>
    <option value="Health">Health</option>
    <option value="Foreign Language">Foreign Language</option>
    <option value="Literature">Literature</option>
    <option value="Algebra">Algebra</option>
    <option value="Geometry">Geometry</option>
    <option value="Calculus">Calculus</option>
    <option value="Statistics">Statistics</option>
    <option value="Environmental Science">Environmental Science</option>
    <option value="Government">Government</option>
    <option value="Astronomy">Astronomy</option>
    <option value="Anthropology">Anthropology</option>
    <option value="Philosophy">Philosophy</option>
    <option value="World History">World History</option>
    <option value="US History">US History</option>
    <option value="European History">European History</option>
    <option value="Political Science">Political Science</option>
    <option value="Engineering">Engineering</option>
    <option value="Business">Business</option>
    <option value="Marketing">Marketing</option>
    <option value="Management">Management</option>
    <option value="Finance">Finance</option>
    <option value="Accounting">Accounting</option>
    <option value="Medicine">Medicine</option>
    <option value="Nursing">Nursing</option>
    <option value="Dentistry">Dentistry</option>
    <option value="Veterinary Science">Veterinary Science</option>
    <option value="Law">Law</option>
</select>
        </div>
    </div>
    <!-- Botones -->
    <div class="button-container">
        <a href="#" class="btn add-another-btn">
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Another</span>
        </a>
        <input type="submit" value="Add Teacher" name="submit" class="btn btn-light submit-btn">
    </div>
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

    <!-- scripts para infromacion -->
    <script>
    function showSelectedInfo(nombre, imagen, subject, about, edad, genero, clase) {        
    document.getElementById('selectedInfo').style.display = 'block';
    if (imagen) {
        document.getElementById('selectedImage').src = "data:image/jpeg;base64," + imagen;
    } else {
        document.getElementById('selectedImage').src = ""; // Si no hay imagen, deja el src vacío
    }
    document.getElementById('selectedNombre').innerText = "" + nombre;
    document.getElementById('selectedCarrera').innerText = "" + subject;
    document.getElementById('selectedAbout').innerText = "" + about;
    document.getElementById('selectedEdadGenero').innerText = "Gender: " + genero + " Age: " + edad;
    document.getElementById('selectedEdadGenero').style.paddingRight = "20px"; // Ajusta este valor según sea necesario

    // Realiza una consulta para contar la cantidad de estudiantes que comparten la misma clase
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var cantidad = xhr.responseText;
                document.getElementById('selectedCantidad').innerText = "Personas de la misma Clase: " + cantidad;
            } else {
                // Si hay algún error en la solicitud AJAX, muestra un mensaje de error
                console.error('Error en la solicitud AJAX: ' + xhr.statusText);
            }
        }
    };
    xhr.open("GET", "../backend/obNumTeach.php?clase=" + clase, true);
    xhr.send();
}

document.getElementById('closeButton').addEventListener('click', function () {
    document.getElementById('selectedInfo').style.display = 'none';
});
</script>

<!-- FIN scripts para infromacion -->

<script>
function checkFileSize() {
    var fileInput = document.getElementById('imagen');
    if (fileInput.files[0].size > 300000) { // Tamaño máximo en bytes (300 KB = 300000 bytes)
        alert('El tamaño del archivo no puede ser mayor a 300 KB.');
        fileInput.value = ''; // Limpiar el valor del input file
        return false; // Detiene el envío del formulario
    }
    return true; // Continúa con el envío del formulario si el tamaño es válido
}
</script>

<script>
function validateForm() {
    const form = document.getElementById('studentForm');
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    
    for (let input of inputs) {
        if (!input.value.trim()) {
            alert('Por favor complete todos los campos obligatorios.');
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