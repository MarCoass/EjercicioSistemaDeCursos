<?php ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Capacitacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  </head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="Index.php">Cursos de Capacitacion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Operaciones
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="Accion/cargarDatos.php">Cargar desde Endpoint</a></li>
            <li><a class="dropdown-item" href="RegistrarPersona.php">Registrar persona</a></li>
            <li><a class="dropdown-item" href="RegistrarCurso.php">Registrar curso</a></li>
            <li><a class="dropdown-item" href="ListadoPersonas.php">Listar personas</a></li>
            <li><a class="dropdown-item" href="ListadoCursos">Listar cursos</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <button class="btn btn-dark" >
        <a class="dropdown-item" href="Estadisticas.php">Estadisticas</a>
          </button>
        </li>
      </ul>
    </div>
    
  </div>
</nav>