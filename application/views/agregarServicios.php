<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Servicios</title>
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
  </div>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1>Registro de Servicios</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo servicio</p>

      <?php echo form_open_multipart("servicios/agregarbd", 'id="registroForm"'); ?>

      <div class="input-group mb-3">
        <input type="text" name="nombreServicio" id="nombreServicio" class="form-control" placeholder="Nombre del Servicio" minlength="3" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-tag"></span>
          </div>
        </div>
      </div>

      <div class="input-group mb-3">
          <input type="number" name="costoServicio" id="costoServicio" class="form-control" placeholder="Costo del Servicio Bs." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-dollar-sign"></span>
            </div>
          </div>
        </div>
        
      <div class="row">
        <div class="col-6">
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
        <div class="col-6">
          <a href="<?php echo site_url("servicios/listaServicios"); ?>" class="btn btn-primary btn-block">Volver</a>			
        </div>
      </div>
      <?php echo form_close(); ?>

      <div class="social-auth-links text-center"></div>
    </div>
  </div>
</div>

<script>
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
<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.js"></script>
</html>