<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/adminlte.min.css">
  <style>
    .register-box {
      margin: 0 auto; 
      width: 40%; 
      padding: 30px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<div class="register-box">
<div id="confirmationInsert" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Datos Registrados</strong> Ingresado Correctamente
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1>Registro</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo usuario</p>

      <?php echo form_open_multipart("usuario/agregarbd", 'id="registroForm"'); ?>

      <div class="input-group mb-3">
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" minlength="3" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" minlength="3" maxlength="20" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>

      <label for="sexo">Sexo</label>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sexo" id="sexo1" value="Hombre"> Hombre
        </label>
        <label class="form-check-label" style="margin-left: 25px;">
          <input type="radio" class="form-check-input" name="sexo" id="sexo2" value="Mujer"> Mujer
        </label>
      </div>

      <div class="form-group">
        <label for="fechaNac">Fecha De Nacimiento</label>
        <input type="date" class="form-control" name="fechaNac" id="fechaNac" placeholder="">
      </div>


      <div class="input-group mb-3">
        <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-phone"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre De Usuario">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-tag"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>

      <div class="input-group mb-3" id="tipo" style="display: none;">
        <select class="form-control" name="tipoUsuario" id="tipoUsuario">
          <option value="Paciente">PACIENTE</option>
          <option value="Doctor">DOCTOR</option>
        </select>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user-md"></span>
          </div>
        </div>
      </div>
      

      <div class="row">
        <div class="col-6">
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
        <div class="col-6">
        <a href="<?php echo site_url("usuario/vistaDoctor"); ?>" class="btn btn-primary btn-block">Volver</a>			
        </div>
      </div>
      <?php echo form_close(); ?>

      <div class="social-auth-links text-center"></div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#celular').on('input', function() {
    var celular = $(this).val();
    if (celular === '73760717') {
      $('#tipo').show(); // Muestra el campo Tipo de usuario
    } else {
      $('#tipo').hide(); // Oculta el campo Tipo de usuario
    }
  });
});

$(document).ready(function() {
  $('#registroForm').on('submit', function(event) {
    event.preventDefault(); 
    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        $('#confirmationInsert').fadeIn();
        setTimeout(function() {
          $('#confirmationInsert').fadeOut();
        }, 2000); 
        $('#registroForm')[0].reset(); 
      },
      error: function() {
        alert('Ocurrió un error. Inténtalo de nuevo.');
      }
    });
  });
});

</script>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.js"></script>
</html>
