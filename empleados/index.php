<?php
require 'empleados.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🤖 CRUD con PHP y MySQL 🤖</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/open-iconic@1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos adicionales */
    body {
      background-color: #afeede; /* Cambio de fondo a un gris moderno */
    }

    .modal-content {
      background-color: #76d4c7;
      border-radius: 10px;
    }

    .form-control {
      border-radius: 20px;
    }

    .btn-primary,
    .btn-secondary,
    .btn-success,
    .btn-danger,
    .btn-warning,
    .btn-info,
    .btn-light,
    .btn-dark,
    .btn-link {
      border-radius: 20px;
    }

    .table {
      background-color: #a3f9cc;
      border-radius: 10px;
    }

    .table thead th {
      border-top: none;
      border-bottom: 2px solid #cce4fb;
    }

    .table tbody td {
      border-top: none;
      border-bottom: 1px solid #cce4fb;
    }

    .img-thumbnail {
      border-radius: 50%;
    }

    /* Centro del botón y distancia del borde superior */
    .center-button {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <form 
    action="" 
    method="post" 
    enctype="multipart/form-data">
      <div 
      class="modal fade" 
      id="exampleModal" 
      tabindex="-1" 
      role="dialog" 
      aria-labelledby="exampleModalLabel" 
      aria-hidden="true">

        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Empleado
              </h5>
              <button 
              type="button" 
              class="close" 
              data-dismiss="modal" 
              aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-row">
                <input 
                type="hidden" 
                name="txtID" 
                required 
                value="<?php echo $txtID; ?>" 
                id="txtID">

                <div class="form-group col-12">
                  <label for="">Nombre(s):</label>
                  <input 
                  type="text" 
                  class="form-control <?php echo (isset($error['nombre'])) ? "is-invalid" : ""; ?>" 
                  name="txtNombre" 
                  id="txtNombre" 
                  value="<?php echo $txtNombre; ?>"
                  >

                  <div class="invalid-feedback">
                    <?php echo (isset($error['nombre']))?>
                  </div>
                  <br>
                </div>
                <div class="form-group col-12">
                  
                <label for="">A. Paterno:</label>
                  <input 
                  type="text" 
                  class="form-control <?php echo (isset($error['apaterno'])) ? "is-invalid" : ""; ?>" 
                  name="txtAPaterno" id="txtAPaterno" 
                  value="<?php echo $txtAPaterno; ?>"
                  >

                  <div class="invalid-feedback">
                    <?php echo (isset($error['apaterno']))?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-12">
                  <label for="">A. Materno:</label>
                  <input 
                  type="text" 
                  class="form-control <?php echo (isset($error['amaterno'])) ? "is-invalid" : ""; ?>" 
                  name="txtAMaterno" 
                  id="txtAMaterno" 
                  value="<?php echo $txtAMaterno; ?>">
                  
                  <div class="invalid-feedback">
                    <?php echo (isset($error['amaterno']))?>
                  </div>
                  <br>
                </div>


                <div class="form-group col-12">
                  <label for="">Correo:</label>
                  <input 
                  type="text" 
                  class="form-control <?php echo (isset($error['correo'])) ? "is-invalid" : ""; ?>" 
                  name="txtCorreo" 
                  id="txtCorreo" 
                  value="<?php echo $txtCorreo; ?>">
                  
                  <div class="invalid-feedback">
                    <?php echo (isset($error['correo']))?>
                  </div>
                  <br>
                </div>

                <div class="form-group col-12">
                  <label for="">Foto:</label>
                  <?php if($txtFoto) { ?>
                    <br>
                    <img 
                    class="img-thumbnail rounded mx-auto d-block" 
                    width="100px"
                    src="../imagenes/<?php echo $txtFoto; ?>" 
                    >
                  <?php } ?>
                  <input 
                  type="file" 
                  class="form-control" 
                  name="txtFoto" 
                  id="txtFoto" 
                  accept="image/*" 
                  value="<?php echo $txtFoto; ?>"
                  >
                  <br>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" type="submit" name="accion" value="btnAgregar" <?php echo $accionAgregar; ?>>
                <span class="oi oi-plus"></span> Agregar
              </button>
              <button class="btn btn-warning" type="submit" name="accion" value="btnModificar" <?php echo $accionModificar; ?>>
                <span class="oi oi-pencil"></span> Modificar
              </button>
              <button class="btn btn-danger" type="submit" name="accion" value="btnEliminar" <?php echo $accionEliminar; ?> onclick="return Confirmar('¿Estás seguro?');">
                <span class="oi oi-trash"></span> Eliminar
              </button>
              <button class="btn btn-primary" type="submit" name="accion" value="btnCancelar" <?php echo $accionCancelar; ?>>
                <span class="oi oi-circle-x"></span> Cancelar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Botón "Agregar Registro" centrado -->
    <div class="row mt-2 mb-2 justify-content-center">
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">
        <span class="oi oi-plus"></span> Agregar Registro
      </button>
    </div>


    <!-- Tabla -->
    <div class="row">
      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Foto</th>
            <th>Nombre del usurario</th>
            <th>Correos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listaEmpleados as $empleado) { ?>
            <tr>
              <td>
                <img src="../imagenes/<?php echo $empleado['foto']; ?>" class="img-thumbnail" width="100px">
              </td>
              <td>
                <?php echo $empleado['nombre']; ?> <?php echo $empleado['apaterno']; ?> <?php echo $empleado['amaterno']; ?>
              </td>
              <td>
                <?php echo $empleado['correo']; ?>
              </td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="txtID" value="<?php echo $empleado['id']; ?>">
                  <button type="submit" value="Seleccionar" class="btn btn-danger" name="accion">
                    <span class="oi oi-check"></span> Seleccionar
                  </button>
                  <button type="submit" value="btnEliminar" onclick="return Confirmar('¿Estás seguro?')" class="btn btn-info" name="accion">
                    <span class="oi oi-trash"></span> Eliminar
                  </button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<?php if($mostrarModal) { ?>
  <script>
    $('#exampleModal').modal('show');
  </script>
<?php } ?>

<script src="empleados.js"></script>
</body>
</html>
