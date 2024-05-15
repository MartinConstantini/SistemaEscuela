<!-- This is a reverse engineering of the "Hyperspace"
     design from HTML5 Up! https://html5up.net/hyperspace -->
     <main class="main">
        <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS para estilos -->
        <aside class="sidebar">
          <nav class="nav">
            <ul>
              <li><a href="../">Dashboard</a></li>
              <li><a href="/escuela/SistemaEscuela/pagues/maestros.html">Teachers</a></li>
              <li><a href="../tablesAlumnos.php">Students/ Classes</a></li>
              <li><a href="#">Billing</a></li>
              <li><a href="#">Settings and profile</a></li>
              <li><a href="#">Exams</a></li>
            </ul>
          </nav>
        </aside>
        <button id="btnCerrarSesion" class="btn-cerrar-sesion">LogOut</button>
      </main>
      <script>
        document.getElementById('btnCerrarSesion').addEventListener('click', function() {
    window.location.href = '../index.php';
    alert('Se cerro la cesion'); // Ejemplo de mensaje de alerta
    });

      </script>