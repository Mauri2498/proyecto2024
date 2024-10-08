<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda de citas</title>

  <style>
 body, html {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    .register-box {
      margin: auto;
      width: 40%; 
      padding: 30px;
    }

  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agenda De Citas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- Campo confirmacion de registro -->
            <div id="confimacionInsert"></div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista De Citas No Atendidas</h3><br> <br>
                            <h3>
                                <a href="<?php echo base_url();?>index.php/agendarCita/citasatendidas">
                                    <button type="button" class="btn btn-primary">Ver Citas Atendidas</button>
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Paciente</th>
                                        <th>Tipo De Atencion</th>
                                        <th>Fecha De Atención</th>
                                        <th>Hora De Atencion</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
        <tbody>
            <?php $contador = 1; ?>
            <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td><?php echo $cita->nombreUsuario . ' ' . $cita->apellidosUsuario; ?></td>
                    <td><?php echo $cita->nombreServicio; ?></td>
                    <td><?php echo formatearFecha($cita->fechaAtencion); ?></td>
                    <td><?php echo $cita->horaAtencion; ?></td>
                    <td>
                        <?php echo form_open_multipart("agendarCita/modificar"); ?>
                        <input type="hidden" name="idagendarcita" value="<?php echo $cita->idAgendarCita; ?>">
                        <button type="submit" class="btn btn-warning fas fa-edit"></button>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger fas fa-trash-alt" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $cita->idAgendarCita; ?>"></button>
                    </td>
                    <td>
                        <?php echo form_open_multipart("agendarCita/deshabilitarbd");?>
                        <input type="hidden" name="idagendarcita" value="<?php echo $cita->idAgendarCita;?>">
                        <button type="submit" class="btn btn-success" >Atendido</button>
                        <?php echo form_close();?>				
                    </td>
                </tr>
                <?php $contador++; ?>
            <?php endforeach; ?>
        </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Paciente</th>
                                        <th>Tipo De Atencion</th>
                                        <th>Fecha De Atención</th>
                                        <th>Hora De Atencion</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        <th>Estado</th>
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
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
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
                ¿Estás seguro de que quieres eliminar esta cita?
            </div>
            <div class="modal-footer">
                <?php echo form_open_multipart("agendarCita/eliminarbd"); ?>
                <input type="hidden" name="idagendarcita" id="deleteCitaId" value="">
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
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var citaId = button.data('id');
            var modal = $(this);
            modal.find('#deleteCitaId').val(citaId);
        });
    });
</script>
