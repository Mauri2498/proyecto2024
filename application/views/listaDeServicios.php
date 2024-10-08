<title>Lista De Servicios</title>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Servicios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--     <div class="card-header">
        <h3 class="card-title">Agregar Servicio</h3><br> <br>
        <h3>
            <a href="<?php echo base_url(); ?>index.php/servicios/servicio">
                <button type="button" class="btn btn-primary">Agregar</button>
            </a>
        </h3>
    </div> -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

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
                            <h3 class="card-title">Lista De Servicios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombre Del Servicio</th>
                                        <th>Costo Bs.</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $contador = 1; ?>
                                    <?php foreach ($servicios as $servicio): ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $servicio->nombreServicio ?></td>
                                            <td><?php echo $servicio->costo; ?> Bs.</td>
                                            <td>
                                                <?php echo form_open_multipart("servicios/modificar"); ?>
                                                <input type="hidden" name="idservicios" value="<?php echo $servicio->idservicios; ?>">
                                                <button type="submit" class="btn btn-warning fas fa-edit"></button>
                                                <?php echo form_close(); ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger fas fa-trash-alt" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $servicio->idservicios; ?>"></button>
                                            </td>

                                        </tr>
                                        <?php $contador++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombre Del Servicio</th>
                                        <th>Costo Bs.</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
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
                ¿Estás seguro de eliminar este servicio?
            </div>
            <div class="modal-footer">
                <?php echo form_open_multipart("servicios/eliminarbd"); ?>
                <input type="hidden" name="idservicios" id="deleteUserId" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('error')): ?>
            $('#errorModal').modal('show');
        <?php endif; ?>

        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id');
            var modal = $(this);
            modal.find('#deleteUserId').val(userId);
        });
    });
</script>