<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar y Agendar Cita</title>
    <style>
        .register-box {
            margin: auto;
            width: 50%;
            padding: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="register-box">
        <div id="confirmationInsert" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Datos Registrados</strong> Ingresado Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>Registrar y Agendar Cita</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrar nuevo usuario y agendar cita</p>
                <?php echo form_open_multipart("usuario/agregarbdYagendarbd", 'id="registroForm"'); ?>

                <div class="input-group mb-3">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" minlength="3" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" minlength="3" maxlength="20" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <label for="sexo">Sexo</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sexo" id="sexo1" value="Hombre"> Hombre
                    </label>
                    <label class="form-check-label" style="margin-left: 25px;">
                        <input type="radio" class="form-check-input" name="sexo" id="sexo2" value="Mujer"> Mujer
                    </label>
                </div>

                <!-- Campo de fecha de nacimiento -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fechaNac">Fecha de nacimiento</label>
                            <div class="d-flex">
                                <select id="dia" name="dia" class="form-control mr-2"></select>
                                <select id="mes" name="mes" class="form-control mr-2"></select>
                                <select id="anio" name="anio" class="form-control"></select>
                            </div>
                            <input type="hidden" id="fechaNac" name="fechaNac">
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre De Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-tag"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <!-- El ícono de "ojito" -->
                        <div class="input-group-text">
                            <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
                        </div>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3" id="tipo" style="display: none;">
                    <select class="form-control" name="tipoUsuario" id="tipoUsuario">
                        <option value="Paciente">PACIENTE</option>
                        <option value="Doctor">DOCTOR</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-md"></span>
                        </div>
                    </div>
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
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" min="1" value="1">
                </div>
                <!-- Campo de fecha de atención que NO es afectado -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fechaAtencion">Fecha de Atención</label>
                            <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="horaAtencion">Hora</label>
                            <div class="d-flex">
                                <select id="hora" name="hora" class="form-control mr-2"></select>
                                <select id="minuto" name="minuto" class="form-control"></select>
                            </div>
                            <input type="hidden" id="horaAtencion" name="horaAtencion">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Registrar y Agendar</button>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo site_url("usuario/panel"); ?>" class="btn btn-primary btn-block">Volver</a>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script>
        function generarContrasenia() {
            const contrasenia = Math.floor(Math.random() * 900) + 100;
            return contrasenia.toString();
        }

        $(document).ready(function() {
            const contraseniaAleatoria = generarContrasenia();
            $('#contrasenia').val(contraseniaAleatoria);

            var today = new Date().toISOString().split('T')[0];
            $('#fechaAtencion').attr('min', today);

            $('#registroForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#confirmationInsert').html('<strong>Éxito!</strong> Usuario registrado y cita agendada correctamente.').fadeIn();
                            setTimeout(function() {
                                $('#confirmationInsert').fadeOut('slow');
                            }, 3000);
                            $('#registroForm')[0].reset();
                            $('#contrasenia').val(generarContrasenia());
                            $('html, body').animate({
                                scrollTop: 0
                            }, 'slow');
                        } else {
                            alert('Hubo un problema al registrar el usuario o agendar la cita.');
                        }
                    },
                    error: function() {
                        alert('Ocurrió un error. Por favor, intenta de nuevo.');
                    }
                });
            });

            $(document).on('click', '.close', function() {
                $(this).closest('.alert').fadeOut('slow');
            });
        });

        $(document).ready(function() {
            var horaSelect = $('#hora');
            var minutoSelect = $('#minuto');
            var horaAtencionInput = $('#horaAtencion');

            for (var i = 6; i <= 20; i++) {
                horaSelect.append($('<option>', {
                    value: i.toString().padStart(2, '0'),
                    text: i.toString().padStart(2, '0') + ':00'
                }));
            }

            for (var i = 20; i <= 55; i += 5) {
                minutoSelect.append($('<option>', {
                    value: i.toString().padStart(2, '0'),
                    text: i.toString().padStart(2, '0')
                }));
            }

            function actualizarHoraAtencion() {
                var hora = horaSelect.val();
                var minuto = minutoSelect.val();
                horaAtencionInput.val(hora + ':' + minuto);
            }

            horaSelect.change(actualizarHoraAtencion);
            minutoSelect.change(actualizarHoraAtencion);

            actualizarHoraAtencion();
        });

        $(document).ready(function() {
            var diaSelect = $('#dia');
            var mesSelect = $('#mes');
            var anioSelect = $('#anio');
            var fechaNacInput = $('#fechaNac');

            for (var i = 1; i <= 31; i++) {
                diaSelect.append($('<option>', {
                    value: i.toString().padStart(2, '0'),
                    text: i.toString().padStart(2, '0')
                }));
            }

            for (var i = 1; i <= 12; i++) {
                mesSelect.append($('<option>', {
                    value: i.toString().padStart(2, '0'),
                    text: i.toString().padStart(2, '0')
                }));
            }

            var currentYear = new Date().getFullYear();
            for (var i = currentYear; i >= 1900; i--) {
                anioSelect.append($('<option>', {
                    value: i,
                    text: i
                }));
            }

            function actualizarFechaNac() {
                var dia = diaSelect.val();
                var mes = mesSelect.val();
                var anio = anioSelect.val();
                fechaNacInput.val(anio + '-' + mes + '-' + dia);
            }

            diaSelect.change(actualizarFechaNac);
            mesSelect.change(actualizarFechaNac);
            anioSelect.change(actualizarFechaNac);

            actualizarFechaNac();
        });

        $('#togglePassword').on('click', function() {
            const passwordField = $('#contrasenia');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    </script>

    <script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.js"></script>
</body>

</html>