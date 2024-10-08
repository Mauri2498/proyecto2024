<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <title>AdminLTE 3 | DataTables</title>
 -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <style>
    
    /* Estilos personalizados para la barra de navegación */
    .main-header {
      background-color: #343a40; /* Color de fondo oscuro para la barra de navegación */
    }
    
    .main-header .navbar-nav .nav-link {
      color: #fff; /* Color del texto blanco para los enlaces de navegación */
    }
    
    .main-header .navbar-nav .nav-link:hover {
      color: #f8f9fa; /* Color del texto blanco claro al pasar el ratón */
    }

    .main-header .dropdown-menu {
      background-color: #343a40; /* Fondo oscuro para el menú desplegable */
    }

    .main-header .dropdown-menu .dropdown-item {
      color: #fff; /* Color del texto blanco para los elementos del menú desplegable */
    }

    .main-header .dropdown-menu .dropdown-item:hover {
      background-color: #495057; /* Fondo gris oscuro al pasar el ratón sobre los elementos del menú desplegable */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left Navbar Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas pdobars"></i></a>
        </li>
      </ul>

      <!-- Right Navbar Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?php echo base_url(); ?>adminlte/dist/img/doc-1.jpg" class="img-circle elevation-2" alt="User Image" style="width: 30px; height: 30px;">
            <strong> <?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellidos'); ?></strong>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Perfil
            </a> -->
            <a href="<?php echo site_url('usuario/cambiarContrasenia'); ?>" class="dropdown-item">
              <i class="fas fa-cogs mr-2"></i> Cambiar Contraseña
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url();?>index.php/usuario/logout" class="dropdown-item ">
              <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
            </a>
          </div>
        </li>
      </ul>
    </nav>
