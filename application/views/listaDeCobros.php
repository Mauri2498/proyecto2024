<title>Lista De Cobros</title>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cobros</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Campo confirmacion de registro -->
            <div id="confimacionInsert"></div>

            <!-- Mensaje de error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista De Cobros</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Paciente</th>
                                        <th>Tipo de Atención</th>
                                        <th>Fecha del Pago</th>
                                        <th>Total</th>
                                        <th>Monto Pagado</th>
                                        <th>Deuda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $contador = 1; ?>
                                    <?php foreach ($cobros as $cobro): ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $cobro->nombrePaciente . ' ' . $cobro->apellidoPaciente; ?></td>
                                            <td><?php echo $cobro->tipoAtencion; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($cobro->fechaCobro)); ?></td>
                                            <td><?php echo number_format($cobro->total, 2); ?> Bs.</td>
                                            <td><?php echo number_format($cobro->monto, 2); ?> Bs.</td>
                                            <td><?php echo number_format($cobro->deuda, 2); ?> Bs.</td>
                                        </tr>
                                        <?php $contador++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Paciente</th>
                                        <th>Tipo de Atención</th>
                                        <th>Fecha del Pago</th>
                                        <th>Total</th>
                                        <th>Monto Pagado</th>
                                        <th>Deuda</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal de confirmación de eliminación -->
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
                ¿Estás seguro de que quieres eliminar este cobro?
            </div>
            <div class="modal-footer">
                <?php echo form_open_multipart("cobros/eliminarbd"); ?>
                <input type="hidden" name="idcobro" id="deleteCobroId" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('error')): ?>
            $('#errorModal').modal('show');
        <?php endif; ?>

        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var cobroId = button.data('id');
            var modal = $(this);
            modal.find('#deleteCobroId').val(cobroId);
        });
    });
</script>
