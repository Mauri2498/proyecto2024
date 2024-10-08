<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Denstista - Free Bootstrap 4 Template by Colorlib</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/open-iconic-bootstrap.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/animate.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/owl.carousel.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/owl.theme.default.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/magnific-popup.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/aos.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/ionicons.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/bootstrap-datepicker.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/jquery.timepicker.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/flaticon.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/icomoon.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>temp/css/style.css"> 
 
    <style> 
        /* Estilo para el panel desplegable */ 
        .dropdown-panel { 
            display: none; 
            background: #f8f9fa; 
            border: 1px solid #ddd; 
            padding: 10px; 
            position: absolute; 
            top: 100%; /* Posiciona el panel justo debajo del contenedor */ 
            left: 0; /* Alinea el panel con el borde izquierdo del contenedor */ 
            z-index: 1000; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Añade sombra para mejor visibilidad */ 
        } 
        .dropdown-panel a { 
            display: block; 
            margin: 5px 0; 
            text-decoration: none; 
            color: #007bff; 
        } 
        .dropdown-panel a:hover { 
            text-decoration: underline; 
        } 
        .dropdown-toggle { 
            cursor: pointer; 
        } 
    </style> 
 
</head> 
<body> 
<div class="py-md-5 py-4 border-bottom"> 
    <div class="container"> 
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0"> 
            <div class="col-md-4 order-md-2 mb-2 mb-md-0 align-items-center text-center"> 
                <a class="navbar-brand" href="index.php">Dentista<span>Clinica Dental</span></a> 
            </div> 
            <div class="col-md-4 order-md-1 d-flex topper mb-md-0 mb-2 align-items-center text-md-right"> 
                <div class="icon d-flex justify-content-center align-items-center order-md-last"> 
                    <span class="icon-map"></span> 
                </div> 
                <div class="pr-md-4 pl-md-0 pl-3 text"> 
                    <p class="con"><span>Llamar a </span> <span>+591 73760717</span></p> 
                    <p class="con">Miguel Achata y Qurimay</p> 
                </div> 
            </div> 
            <div class="col-md-4 order-md-3 d-flex topper mb-md-0 align-items-center"> 
                <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div> 
                <div class="text pl-3 pl-md-3"> 
                    <p class="hr"><span>Horario De Atención</span></p> 
                    <p class="time"><span>Lunes - Domingo:</span> <span>08:00 - 16:00</span></p> 
                </div> 
            </div> 
        </div> 
        <!-- User Info Section --> 
        <div class="row no-gutters d-flex align-items-center"> 
            <div class="col-md-8 d-flex align-items-center" style="position: relative;"> 
                <div class="icon d-flex justify-content-center align-items-center"><span class="icon-user"></span></div> 
                <div class="text pl-3 pl-md-3"> 
                    <div
class="info"> 
                        <a href="#" class="d-block dropdown-toggle"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellidos'); ?></a> 
                    </div> 
                    <!-- Dropdown Panel --> 
                    <div class="dropdown-panel" id="dropdownPanel"> 
                        <a href="<?php echo site_url('usuario/cambiarContrasenia'); ?>">Cambiar Contraseña</a> 
                    </div> 
                </div> 
            </div> 
            <div class="col-md-4 d-flex justify-content-end"> 
                <a href="<?php echo base_url();?>index.php/usuario/logout"> 
                    <button type="button" class="btn btn-danger">Cerrar sesión</button> 
                </a> 
            </div> 
        </div> 
    </div> 
</div> 
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar"> 
    <div class="container d-flex align-items-center"> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="oi oi-menu"></span> Menu 
        </button> 
        <div class="collapse navbar-collapse" id="ftco-nav"> 
            <ul class="navbar-nav m-auto"> 
                <li class="nav-item"><a href="index.php" class="nav-link pl-0">Principal</a></li> 
                <li class="nav-item"><a href="about.php" class="nav-link">Acerca De</a></li> 
                <li class="nav-item"><a href="doctor.php" class="nav-link">Doctor</a></li> 
                <li class="nav-item"><a href="department.php" class="nav-link">Tratamientos</a></li> 
                <li class="nav-item"><a href="contact.php" class="nav-link">Contacto</a></li> 
            </ul> 
        </div> 
    </div> 
</nav> 
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script> 
    $(document).ready(function() { 
        $('.dropdown-toggle').click(function(event) { 
            event.preventDefault(); 
            // Alterna el estado de visibilidad del panel desplegable 
            $('#dropdownPanel').slideToggle(); 
            // Detiene la propagación del clic para evitar que se cierre inmediatamente 
            event.stopPropagation(); 
        }); 
 
        // Cierra el panel si haces clic fuera de él 
        $(document).click(function(event) { 
            if (!$(event.target).closest('.dropdown-toggle, #dropdownPanel').length) { 
                $('#dropdownPanel').slideUp(); 
            } 
        }); 
    }); 
</script> 
</body> 
</html>