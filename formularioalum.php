<!-- formulario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div id="formulario-container" style="display: none;">
    <form id="formulario" class="p-4 bg-light">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Ingrese su email">
      </div>
      <button id="cancelar" class="btn btn-danger mr-2">Cancelar</button>
      <button id="guardar" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
  $("#formulario-container").fadeIn(); // Mostrar el contenedor del formulario con un efecto de desvanecimiento

  // Agregar acción al botón "Cancelar"
  $("#cancelar").click(function(){
    // Ocultar el formulario
    $("#formulario-container").fadeOut();
  });

  // Agregar acción al botón "Guardar"
  $("#guardar").click(function(){
    // Aquí puedes agregar la lógica para procesar los datos ingresados
    // Por ejemplo, puedes enviar los datos a otro script PHP para procesarlos
    // Puedes usar AJAX para enviar los datos sin recargar la página
    // Una vez procesados los datos, puedes mostrar un mensaje de éxito o redirigir a otra página
    alert("Datos guardados correctamente");
    // Ocultar el formulario
    $("#formulario-container").fadeOut();
  });
});
</script>

</body>
</html>
