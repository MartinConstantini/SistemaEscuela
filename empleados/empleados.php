<?php
include ('../conexion/conexion.php');
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : '';
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : '';
$txtAPaterno = (isset($_POST['txtAPaterno'])) ? $_POST['txtAPaterno'] : '';
$txtAMaterno = (isset($_POST['txtAMaterno'])) ? $_POST['txtAMaterno'] : '';
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : '';
$txtFoto = (isset($_FILES['txtFoto']['name'])) ? $_FILES['txtFoto']['name'] : '';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : '';

$error = array();

$accionAgregar = '';
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

switch ($accion) {
    case 'btnAgregar':
        // Verificar los campos obligatorios
        if ($txtNombre == '') {
            $error['Nombre'] = 'Nombre no puede ir vacio';
        }
        if ($txtAPaterno == '') {
            $error['APaterno'] = 'Apaterno no puede ir vacio';
        }
        if ($txtAMaterno == '') {
            $error['AMaterno'] = 'Amaterno no puede ir vacio';
        }
        if ($txtCorreo == '') {
            $error['Correo'] = 'Correo no puede ir vacio';
        }
        if (count($error) > 0) {
            $mostrarModal = true;
            break;
        }
        // Preparar la consulta para agregar un nuevo empleado
        $query = $pdo->prepare('INSERT INTO
        empleados(nombre,apaterno,amaterno,correo,foto) 
        VALUES(:nombre, :apaterno, :amaterno, :correo, :foto)');
        $query->bindParam(':nombre', $txtNombre);
        $query->bindParam(':apaterno', $txtAPaterno);
        $query->bindParam(':amaterno', $txtAMaterno);
        $query->bindParam(':correo', $txtCorreo);
        $fecha = new DateTime(); // Corregir DataTime a DateTime
        $nombreFoto = ($txtFoto != '') ? $fecha->getTimestamp() . '_' . $_FILES['txtFoto']['name'] : 'imagen.jpg';
        $tmpFoto = $_FILES['txtFoto']['tmp_name'];

        if ($tmpFoto != '') {
            move_uploaded_file($tmpFoto, '../imagenes/' . $nombreFoto);
        }

        $query->bindParam(':foto', $nombreFoto);
        $query->execute();
        header('Location: index.php'); // Redirigir después de agregar el registro
        break;

    case 'btnEliminar':
        $queryEliminar = $pdo->prepare('SELECT foto FROM empleados WHERE id=:id');
        $queryEliminar->bindParam(':id', $txtID);
        $queryEliminar->execute();
        $empleado = $queryEliminar->fetch(PDO::FETCH_LAZY);

        if (isset($empleado['foto']) && $empleado['foto'] != 'imagen.jpg') {
            if (file_exists('../imagenes/' . $empleado['foto'])) {
                unlink('../imagenes/' . $empleado['foto']);
            }
        }
        $queryDelete = $pdo->prepare('DELETE FROM empleados WHERE id=:id');
        $queryDelete->bindParam(':id', $txtID);
        $queryDelete->execute();
        header('Location: index.php');
        echo $txtID;
        echo 'Presionaste eliminar';
        break;

        case 'btnModificar':
            $queryUpdate = $pdo->prepare("UPDATE empleados SET
                    nombre=:nombre,
                    apaterno=:apaterno,
                    amaterno=:amaterno,
                    correo=:correo 
                    WHERE id=:id");
            $queryUpdate->bindParam(':nombre', $txtNombre);
            $queryUpdate->bindParam(':apaterno', $txtAPaterno);
            $queryUpdate->bindParam(':amaterno', $txtAMaterno);
            $queryUpdate->bindParam(':correo', $txtCorreo);
            $queryUpdate->bindParam(':id', $txtID);
            $queryUpdate->execute();
    
            if ($_FILES['txtFoto']['name'] != '') {
                $extension = pathinfo($_FILES['txtFoto']['name'], PATHINFO_EXTENSION);
                $nombreFoto = uniqid() . '.' . $extension;
                $rutaFoto = '../imagenes/' . $nombreFoto;
    
                move_uploaded_file($_FILES['txtFoto']['tmp_name'], $rutaFoto);
    
                $queryFoto = $pdo->prepare('SELECT foto FROM empleados WHERE id=:id');
                $queryFoto->bindParam(':id', $txtID);
                $queryFoto->execute();
                $empleado = $queryFoto->fetch(PDO::FETCH_ASSOC);
    
                if ($empleado && $empleado['foto'] != 'image.jpg') {
                    $rutaFotoActual = '../imagenes/' . $empleado['foto'];
                    if (file_exists($rutaFotoActual)) {
                        unlink($rutaFotoActual);
                    }
                }
                $queryUpdateFoto = $pdo->prepare('UPDATE empleados SET foto=:foto WHERE id=:id');
                $queryUpdateFoto->bindParam(':foto', $nombreFoto);
                $queryUpdateFoto->bindParam(':id', $txtID);
                $queryUpdateFoto->execute();
            }
            header('Location: index.php');
            break;
        

        case 'btnCancelar':
            header('Location: index.php');
            break;
        case 'Seleccionar':
            $accionAgregar = "disabled";
            $accionModificar = $accionEliminar = $accionCancelar = '';
            $mostrarModal = true;
            $queryEmpleado = $pdo->prepare('SELECT * FROM empleados WHERE id=:id');
            $queryEmpleado->bindParam(':id', $txtID);
            $queryEmpleado->execute();
            $empleado = $queryEmpleado->fetch(PDO::FETCH_LAZY);
            $txtNombre = $empleado['nombre'];
            $txtAPaterno = $empleado['apaterno'];
            $txtAMaterno = $empleado['amaterno'];
            $txtCorreo = $empleado['correo'];
            $txtFoto = $empleado['foto'];
            break;
    

        }

$querySelect = $pdo->prepare('SELECT * FROM empleados');
$querySelect->execute();
$listaEmpleados = $querySelect->fetchAll(PDO::FETCH_ASSOC);
?>