<title>Agendar Cita</title>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agendar Cita</h1>
                </div>


            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
        <div id="confirmationInsert" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cita Agendada</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="<?php echo site_url('agendarCita/agendarcita'); ?>" method="post" id="agendarCitaForm">
                        <div class="form-group">
                            <label for="usuario_idusuario">Paciente</label>
                            <select class="form-control" name="usuario_idusuario" id="usuario_idusuario">
                                <option value="">Seleccionar Paciente</option>
                                <?php foreach ($pacientes as $paciente): ?>
                                    <option value="<?= $paciente->idusuario ?>"><?= $paciente->nombre ?> <?= $paciente->apellidos ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="servicios_idservicios">Servicio</label>
                            <select class="form-control" name="servicios_idservicios" id="servicios_idservicios">
                                <option value="">Seleccionar Servicio</option>
                                <?php foreach ($servicios as $servicio): ?>
                                    <option value="<?= $servicio->idservicios ?>"><?= $servicio->nombreServicio ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fechaAtencion">Fecha</label>
                                    <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="horaAtencion">Hora</label>
                                    <input type="time" class="form-control" name="horaAtencion" id="horaAtencion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar datos</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </section>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#agendarCitaForm').on('submit', function(event) {
        event.preventDefault(); // Evitar envío tradicional del formulario
        
        // Realizar la petición AJAX
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#confirmationInsert').fadeIn(); // Mostrar alerta de éxito
                
                // Ocultar la alerta después de 2 segundos
                setTimeout(function() {
                    $('#confirmationInsert').fadeOut();
                }, 2000);

                $('#agendarCitaForm')[0].reset(); // Limpiar formulario después del envío
            },
            error: function() {
                alert('Ocurrió un error. Inténtalo de nuevo.');
            }
        });
    });
});
</script>

