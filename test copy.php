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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
        .flex-item {
            margin: 10px;
        }
        #selectedInfo {
            order: 2;
        }
        .table-container {
            order: 1;
        }
    </style>

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
                <a class="nav-link" href="teachers.php" style="color: white;">
                    <i class="fas fa-fw fa-chalkboard-user"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="nav-item rounded" style="background-color: #2D88D4;">
                <a class="nav-link" href="tablesAlumnos.php" style="color: white;">
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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                        <div class="card shadow mb-1 flex-item table-container" style="width: 900px;">
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
                                                <tr onclick="showSelectedInfo('<?php echo $fila['Ncontrol']; ?>', '<?php echo base64_encode($fila['Imagen']); ?>', '<?php echo $fila['Nombre']; ?>','<?php echo $fila['Carrera']; ?>', '<?php echo $fila['Genero']; ?>', '<?php echo $fila['Edad']; ?>', '<?php echo $fila['About']; ?>')">
                                                    <td>
                                                        <?php
                                                        // Genera la etiqueta <img> con la imagen codificada en base64 si está presente
                                                        if (!empty($fila['Imagen'])) {
                                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($fila['Imagen']) . '" class="rounded-circle" alt="Imagen del estudiante" width="50">';
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
                        <button id="closeButton" class="btn btn-primary">Cerrar</button>
                            <h5 id="selectedNControl" class="card-title"></h5>
                            <img id="selectedImage" src="" class="rounded-circle" alt="Imagen del estudiante" width="100">
                            <p id="selectedNombre" class="card-text"></p>
                            <p id="selectedCarrera" class="card-text"></p>
                            <div>
                                <i class="fas fa-graduation-cap"></i>
                                <i class="fas fa-phone-volume"></i>
                                <i class="fas fa-icon-3"></i>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Estas por Salir</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="backend/logout.php">Salir</a>
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
                <div class="modal-body">
                    <!--FORM-->
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apaterno">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apaterno">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amaterno">Apellido Materno:</label>
                                <input type="text" class="form-control" id="amaterno">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="genero">Género:</label>
                                <select class="form-control" id="genero">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="X">X</option>
                                    <option value="X">Putito</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inscripcion">Número de Inscripción:</label>
                                <input type="number" class="form-control" id="inscripcion" min="1" max="15">
                            </div>
                        </div>
                    </form>
                    <!--FIN FORM-->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-icon-split" style="background-color: #FFFFFF; color: #4F4F4F;" type="button" data-dismiss="modal">
                        <span class="icon" style="background-color: #FFFFFF">
                            <i class="fas fa-circle-plus"></i>
                        </span>
                        <span class="text">Add Another</span>
                    </button>
                    <button class="btn btn-light" style="background-color: #F1F1F1; color: #4F4F4F;" type="button" data-dismiss="modal">Add Student</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN Modal para add alums-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
function showSelectedInfo(ncontrol, image, nombre, carrera, genero, edad, about) {
    document.getElementById('selectedInfo').style.display = 'block';
    document.getElementById('selectedNControl').innerText = "Número de control: " + ncontrol;
    if (image) {
        document.getElementById('selectedImage').src = "data:image/jpeg;base64," + image;
    } else {
        document.getElementById('selectedImage').src = ""; // Si no hay imagen, deja el src vacío
    }
    document.getElementById('selectedNombre').innerText = "Nombre: " + nombre;
    document.getElementById('selectedCarrera').innerText = "Carrera: " + carrera;
    // Supongo que los iconos, about, edad y género ya están en tu base de datos
    // Si no, deberías obtenerlos de algún otro lugar y agregarlos aquí
    // Por ahora, solo los dejaré como texto estático
    document.getElementById('selectedAbout').innerText = ""+ about;
    document.getElementById('selectedEdad').innerText = "Edad: "+ edad;
    document.getElementById('selectedEdadGenero').innerText = "Género: " + genero;
    // La cantidad de personas similares no está en la consulta, así que la dejaré vacía por ahora
    document.getElementById('selectedCantidad').innerText = "Cantidad de personas similares: ";
}

document.getElementById('closeButton').addEventListener('click', function () {
    document.getElementById('selectedInfo').style.display = 'none';
});
</script>



</body>

</html>
