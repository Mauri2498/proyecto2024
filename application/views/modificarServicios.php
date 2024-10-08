<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Servicio</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
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
<body>
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1>Modificar Servicio</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Editar servicio existente</p>

      <?php echo form_open("servicios/modificarbd", 'id="modificarForm"'); ?>
      <input type="hidden" name="idservicios" value="<?php echo $servicio->idservicios; ?>">
      
      <div class="input-group mb-3">
        <input type="text" name="nombreServicio" class="form-control" value="<?php echo $servicio->nombreServicio; ?>" placeholder="Nombre del Servicio" minlength="3" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-tag"></span>
          </div>
        </div>
      </div>

      <div class="input-group mb-3">
            <input type="number" name="costoServicio" class="form-control" value="<?php echo $servicio->costo; ?>" placeholder="Costo del Servicio" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
        </div>

      <div class="row">
        <div class="col-6">
          <button type="submit" class="btn btn-primary btn-block">Modificar</button>
        </div>
        <div class="col-6">
          <a href="<?php echo site_url("servicios/listaServicios"); ?>" class="btn btn-primary btn-block">Volver</a>			
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.js"></script>
</body>
</html>
