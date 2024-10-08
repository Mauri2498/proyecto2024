<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Confirmar Cobro</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <form action="<?= base_url('servicios/procesarCobro') ?>" method="post">
                    <input type="hidden" name="usuario_idusuario" value="<?= $usuario_idusuario ?>">
                    <input type="hidden" name="servicios_idservicios" value="<?= $servicios_idservicios ?>">
                    
                    <div class="form-group">
                        <label>Paciente</label>
                        <input type="text" class="form-control" value="<?= $nombre_paciente ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Servicio</label>
                        <input type="text" class="form-control" value="<?= $nombre_servicio ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="monto">Monto Total Bs.</label>
                        <input type="text" class="form-control" id="monto" name="monto" value="<?= $monto ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción del Cobro"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Procesar Cobro</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$(document).ready(function() {
    const montoBase = <?= $monto ?>;
    
    $('#cantidad').on('change', function() {
        const cantidad = $(this).val();
        const montoTotal = montoBase * cantidad;
        $('#monto').val(montoTotal.toFixed(2));
    });
    
    // Establecer la fecha de hoy como predeterminada
    const today = new Date().toISOString().split('T')[0];
    $('#fecha').val(today);
});
</script>