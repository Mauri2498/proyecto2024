<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div id="confimacionInsertCobro"></div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro Cobros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"></ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <form action="" method="post" id="formCobro">
                    <div class="row">
<!--                         <div class="col-6">
                            <div class="form-group">
                                <label for="servicios_idservicios">Servicio</label>
                                <select class="form-control" name="servicios_idservicios" id="servicios_idservicios">
                                    <option value="0" data-costo="0">Seleccionar Servicio</option>
                                    <?php foreach ($servicios as $servicio): ?>
                                        <option value="<?= $servicio->idservicios ?>" data-costo="<?= $servicio->costo ?>"><?= $servicio->nombreServicio ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-6">
                            <div class="form-group">
                                <label for="usuario_idusuario">Paciente</label>
                                <select class="form-control" name="usuario_idusuario" id="usuario_idusuario" onChange="mostrarDetallePaciente(this.value);">
                                    <option value="0">Seleccionar Paciente</option>
                                    <?php foreach ($pacientes as $paciente): ?>
                                        <option value="<?= $paciente->idusuario ?>"><?= $paciente->nombre ?> <?= $paciente->apellidos ?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="monto">Monto a Pagar Bs.</label>
                                <input type="text" class="form-control" name="monto" id="monto" aria-describedby="helpId" placeholder="Monto (Bs)">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId">
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción del Cobro"></textarea>
                    </div> -->

                    <button type="button" class="btn btn-primary" onClick="registrarCobro();">Registrar Cobro</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </section>

    <!-- Div to display patient details -->
    <section class="content">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div id="detallePaciente"></div>
            </div>
            <div class="col-1"></div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#servicios_idservicios').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var costo = selectedOption.data('costo');
            $('#monto').val(costo);
        });
    });

    function mostrarDetallePaciente(idUsuario) {
        if (idUsuario == 0) {
            $('#detallePaciente').html('');
            return;
        }

        $.ajax({
            url: '<?= site_url("cobros/detallePaciente") ?>',
            type: 'POST',
            data: { idUsuario: idUsuario },
            success: function(response) {
                $('#detallePaciente').html(response);
            },
            error: function() {
                alert('Error al obtener detalles del paciente.');
            }
        });
    }

    
</script>
