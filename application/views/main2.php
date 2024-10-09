<title>Página principal</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menú</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="<?php echo site_url('usuario/agregar'); ?>" class="small-box bg-info">
                        <div class="inner">
                            <br><br>
                            <p>Agregar Paciente</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="small-box-footer">Agregar <i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="<?php echo site_url('agendarCita/agendar'); ?>" class="small-box bg-info">
                        <div class="inner">
                            <br><br>
                            <p>Agendar Una Cita</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="small-box-footer">Agendar <i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                </div>


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="<?php echo site_url('servicios/servicio'); ?>" class="small-box bg-info">
                        <div class="inner">
                            <br><br>
                            <p>Agregar Servicio</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="small-box-footer">Agregar <i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="<?php echo site_url('usuario/registrarYagendar'); ?>" class="small-box bg-info">
                        <div class="inner">
                            <br><br>
                            <p>Registrar y Agendar</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-teeth-open"></i>
                        </div>
                        <div class="small-box-footer">Registrar <i class="fas fa-arrow-circle-right"></i></div>
                    </a>
                </div>
            </div>

            
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
