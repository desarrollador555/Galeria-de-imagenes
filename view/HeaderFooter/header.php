<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Datables css basico-->
    <link rel="stylesheet" href="<?php RUTA_ARCHIVOS ?>asset/js/datatable/datatables.min.css">
    <!--Datables css estilo boostrap 4-->
    <link rel="stylesheet" href="<?php RUTA_ARCHIVOS ?>asset/js/datatable/DataTables-1.10.23/css/dataTables.bootstrap4.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script
      src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
      data-auto-a11y="true"
    ></script>
    <link rel="stylesheet" href="<?php RUTA_ARCHIVOS ?>asset/css/estilos.css">
    <title>Galeria de Imagenes</title>
  </head>
  <body>
    <div class="container-fluit">


    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
      <!-- <a class="navbar-brand" href="#">Galeria de imagenes</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
              <a class=" text-white  nav-link" href="index.php?c=galeria&a=index">Galeria de imagenes </a>
          </li>
        <?php if(!empty($_SESSION["usuario"])): ?>          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gestionar imagenes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?c=galeria&a=create">Create</a>
              <a class="dropdown-item" href="index.php?c=galeria&a=manager">Manager</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
              <a class=" text-white  nav-link" href="index.php?c=site&a=Info">Acerca de </a>
          </li>
          <li class="nav-item">
              <a class=" text-white nav-link active" href="<?php RUTA_WEB?>index.php?c=site&a=ClosedSession">Cerrar Sesion[<?= strtoupper($_SESSION['usuario'])?>]</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
              <a class="text-white  nav-link" href="<?= RUTA_WEB ?>index.php?c=site&a=login">Inicia Sesion</a>
          </li>
          <li class="nav-item">
              <a class=" text-white  nav-link" href="index.php?c=site&a=Info">Acerca de </a>
          </li>
        <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    </div>
