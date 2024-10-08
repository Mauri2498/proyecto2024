<div class="content-wrapper">
    <div class="container-fluid pt-3">
        <h1>Lista de citas atendidas</h1>
        <br>

        <a href="<?php echo base_url();?>index.php/agendarCita/listaCitas"> 
            <button type="button" class="btn btn-warning">Ver Citas No Atendidas</button>
        </a>

        <table class="table">
            <thead>
                <th>No.</th>
                <th>Paciente</th>
                <th>Tipo De Atencion</th>
                <th>Fecha De Atención</th>
                <th>Hora De Atencion</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                <?php 
                    $contador=1;
                    foreach($cita->result() as $row)
                    {
                ?>			 
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td><?php echo $row->nombreUsuario . ' ' . $row->apellidosUsuario; ?></td>
                    <td><?php echo $row->nombreServicio; ?></td>
                    <td><?php echo $row->fechaAtencion; ?></td>
                    <td><?php echo $row->horaAtencion; ?></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $row->idAgendarCita; ?>">Eliminar</button>
                    </td>
                </tr>
                <?php 
                    $contador++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar esta cita?
            </div>
            <div class="modal-footer">
                <?php echo form_open_multipart("agendarCita/eliminarbdAtendidos"); ?>
                <input type="hidden" name="idagendarcita" id="deleteCitaId" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var citaId = button.data('id');
            var modal = $(this);
            modal.find('#deleteCitaId').val(citaId);
        });
    });
</script>
