<br><br>
<h1>Modificar Cita</h1>
<br>

<?php foreach($citas->result() as $row): ?>

<section class="content">
    <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("agendarCita/modificarbd"); ?>
                    <div class="form-group">
                        <label for="usuario_idusuario">Paciente</label>
                        <input type="text" class="form-control" value="<?= $row->nombreUsuario ?> <?= $row->apellidosUsuario ?>" readonly>
                        <!-- Campo oculto para enviar el id del usuario -->
                        <input type="hidden" name="usuario_idusuario" value="<?= $row->usuario_idusuario ?>">
                        <!-- Campo oculto para enviar el id de la cita -->
                        <input type="hidden" name="idagendarcita" value="<?php echo $row->idagendarcita; ?>">
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
                            <a href="<?php echo site_url("agendarcita/listaCitas"); ?>" class="btn btn-primary btn-block">Volver</a>			
                        </div>
                    </div>

                <?php echo form_close(); ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</section>

<?php endforeach; ?>
