<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container content">
        <h1 class="text-center">Modificar Usuario</h1>
        <br>

        <?php foreach($usuario->result() as $row): ?>

        <section class="content">
            <div class="container-fluid">
                <div id="confirmacionInsert"></div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <?php echo form_open_multipart("usuario/modificarbdU"); ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idusuario" value="<?php echo $row->idusuario; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" minlength="3" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="<?php echo $row->apellidos; ?>" minlength="3" maxlength="20" required>
                            </div>
                            <div class="form-group">
                                <label for="sexo">Sexo</label>
                                <select class="form-control" name="sexo" required>
                                    <option value="Hombre" <?php if($row->sexo == 'HOMBRE') echo 'selected'; ?>>HOMBRE</option>
                                    <option value="Mujer" <?php if($row->sexo == 'MUJER') echo 'selected'; ?>>MUJER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fechaNac">Fecha De Nacimiento</label>
                                <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="<?php echo $row->fechaNac; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular" required value="<?php echo $row->celular; ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipoUsuario">Tipo de Usuario</label>
                                <select class="form-control" name="tipoUsuario" id="tipoUsuario">
                                    <option value="Paciente" <?php if($row->tipoUsuario == 'PACIENTE') echo 'selected'; ?>>PACIENTE</option>
                                    <option value="Doctor" <?php if($row->tipoUsuario == 'DOCTOR') echo 'selected'; ?>>DOCTOR</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre De Usuario" value="<?php echo $row->usuario; ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-tag"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success">Modificar Usuario</button>
                                </div>

                                <div class="col-6">
                                    <a href="<?php echo site_url("usuario/listaUsuarios"); ?>" class="btn btn-primary btn-block">Volver</a>			
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </section>

        <?php endforeach; ?>
    </div>
</body>
</html>
