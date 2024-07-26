
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">


        <div class="row">
            <div id="confimacionInsertCobro">
            
            </div>
        </div>

        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Registro Cobros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
            <div class="col-1">
            
            </div>
        <div class="col-8">
            <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                    <label for="servicios_idservicios">Servicio</label>
                            <select class="form-control" name="servicios_idservicios" id="servicios_idservicios">
                                <option value="0">Seleccionar Servicio</option>
                                <?php foreach ($servicios as $servicio): ?>
                                    <option value="<?= $servicio->idservicios ?>"><?= $servicio->nombreServicio ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>

                <div class="col-6">
                <div class="form-group">
                    <label for="usuario_idusuario">Paciente</label>
                            <select class="form-control" name="usuario_idusuario" id="usuario_idusuario">
                                <option value="0">Seleccionar Paciente</option>
                                <?php foreach ($pacientes as $paciente): ?>
                                    <option value="<?= $paciente->idusuario ?>"><?= $paciente->nombre ?> <?= $paciente->apellidos ?></option>
                                <?php endforeach; ?>
                            </select>          
                    </select>
                    </div>
                </div>
               
            </div>
                

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label for="">Monto</label>
                        <input type="text"
                            class="form-control" name="monto" id="monto" aria-describedby="helpId" placeholder="Monto (Bs)">
                        
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="form-group">
                        <label for="">Deuda</label>
                        <input type="text"
                            class="form-control" name="deuda" id="deuda" aria-describedby="helpId" placeholder="Deudad (Bs)">
                        
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date"
                            class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                        
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="">Descripcion</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripcion Cobro"></textarea>
                </div>

                <button type="button" class="btn btn-primary" onClick="cobrar();">Registrar Cobro</button>

                

            </form>    
        </div>
        <div class="col-3">
            
        </div>
    </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  