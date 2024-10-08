<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Cita</title>
  
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .register-box {
      margin: auto;
      width: 50%; /* Ajustado para pantallas grandes */
      padding: 30px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-top: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      width: 100%;
    }

    .footer {
      text-align: center;
      padding: 10px;
      background-color: #f1f1f1;
    }
  </style>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- Menu (asegúrate de que esté bien implementado en inc/menu) -->
  <?php $this->load->view('inc/menu'); ?>

  <h1>Modificar Cita</h1>

  <?php foreach($citas->result() as $row): ?>
    <section class="content">
      <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="register-box">
          <?php echo form_open_multipart("agendarCita/modificarbd"); ?>
          
          <div class="form-group">
            <label for="usuario_idusuario">Paciente</label>
            <input type="text" class="form-control" value="<?= $row->nombreUsuario ?> <?= $row->apellidosUsuario ?>" readonly>
            <input type="hidden" name="usuario_idusuario" value="<?= $row->usuario_idusuario ?>">
            <input type="hidden" name="idagendarcita" value="<?= $row->idagendarcita; ?>">
          </div>

          <div class="form-group">
            <label for="servicios_idservicios">Servicio</label>
            <select class="form-control" name="servicios_idservicios" id="servicios_idservicios">
              <option value="">Seleccionar Servicio</option>
              <?php foreach ($servicios as $servicio): ?>
                <option value="<?= $servicio->idservicios ?>" <?php if ($servicio->idservicios == $row->servicios_idservicios) echo 'selected'; ?>>
                  <?= $servicio->nombreServicio ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="fechaAtencion">Fecha</label>
                <input type="date" class="form-control" name="fechaAtencion" value="<?php echo $row->fechaAtencion; ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="horaAtencion">Hora</label>
                <input type="time" class="form-control" name="horaAtencion" value="<?php echo $row->horaAtencion; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary">Guardar datos</button>
            </div>
            <div class="col-6">
              <a href="<?php echo site_url("agendarcita/listaCitas"); ?>" class="btn btn-primary">Volver</a>
            </div>
          </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </section>
  <?php endforeach; ?>


</body>
</html>
