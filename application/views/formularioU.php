<title>Registro</title>

<div class="register-box">
  <div id="confirmationInsert" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Datos Registrados</strong> Ingresado Correctamente
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1>Registro</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo usuario</p>

      <?php echo form_open_multipart("usuario/agregarbdU", 'id="registroForm"'); ?>

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

      <div class="form-group">
        <label for="fechaNac">Fecha de Nacimiento</label>
        <div class="d-flex">
          <select id="dia" name="dia" class="form-control mr-2"></select>
          <select id="mes" name="mes" class="form-control mr-2"></select>
          <select id="anio" name="anio" class="form-control"></select>
        </div>
        <input type="hidden" id="fechaNac" name="fechaNac">
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

      <!-- El campo donde la contraseña aleatoria será insertada -->
      <div class="input-group mb-3">
        <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña">
        <div class="input-group-append">
          <!-- El ícono de "ojito" -->
          <div class="input-group-text">
            <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
          </div>
        </div>
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>

      </div>

      <div class="input-group mb-3" id="tipo" style="">
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


      <div class="row">
        <div class="col-6">
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
        <div class="col-6">
          <a href="<?php echo site_url("usuario/panel"); ?>" class="btn btn-primary btn-block">Volver</a>
        </div>
      </div>
      <?php echo form_close(); ?>

      <div class="social-auth-links text-center"></div>
    </div>
  </div>
</div>

<!-- Script para generar la contraseña aleatoria de 3 dígitos -->
<script>
  function generarContrasenia() {
    // Generar un número aleatorio de 3 dígitos
    const contrasenia = Math.floor(Math.random() * 900) + 100;
    return contrasenia.toString();
  }

  $(document).ready(function() {
    // Generar una contraseña aleatoria cuando se cargue la página
    const contraseniaAleatoria = generarContrasenia();
    $('#contrasenia').val(contraseniaAleatoria);

    // Manejar el envío del formulario
    $('#registroForm').on('submit', function(event) {
        event.preventDefault();  // Evita el envío tradicional del formulario

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Desplazarse inmediatamente hacia la parte superior para mostrar el mensaje de éxito
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');

                // Mostrar el mensaje de confirmación después de desplazarse
                $('#confirmationInsert').fadeIn();
                
                // Ocultar el mensaje después de 3 segundos
                setTimeout(function() {
                    $('#confirmationInsert').fadeOut('slow');
                }, 3000);

                // Limpiar el formulario después de enviar
                $('#registroForm')[0].reset();

                // Generar una nueva contraseña aleatoria
                $('#contrasenia').val(generarContrasenia());
            },
            error: function() {
                alert('Ocurrió un error. Inténtalo de nuevo.');
            }
        });
    });

    // Mostrar u ocultar la contraseña
    $('#togglePassword').on('click', function() {
        const passwordField = $('#contrasenia');
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});


  $(document).ready(function() {
    var diaSelect = $('#dia');
    var mesSelect = $('#mes');
    var anioSelect = $('#anio');
    var fechaNacInput = $('#fechaNac');

    // Poblamos el selector de días (1-31)
    for (var i = 1; i <= 31; i++) {
        diaSelect.append($('<option>', {
            value: i.toString().padStart(2, '0'),
            text: i.toString().padStart(2, '0')
        }));
    }

    // Poblamos el selector de meses (1-12)
    for (var i = 1; i <= 12; i++) {
        mesSelect.append($('<option>', {
            value: i.toString().padStart(2, '0'),
            text: i.toString().padStart(2, '0')
        }));
    }

    // Poblamos el selector de años (desde el año actual hasta 1900)
    var currentYear = new Date().getFullYear();
    for (var i = currentYear; i >= 1900; i--) {
        anioSelect.append($('<option>', {
            value: i,
            text: i
        }));
    }

    // Función para actualizar el campo oculto con la fecha de nacimiento completa
    function actualizarFechaNac() {
        var dia = diaSelect.val();
        var mes = mesSelect.val();
        var anio = anioSelect.val();
        fechaNacInput.val(anio + '-' + mes + '-' + dia); // Formato YYYY-MM-DD
    }

    // Actualizamos la fecha de nacimiento cuando el usuario cambia cualquier campo
    diaSelect.change(actualizarFechaNac);
    mesSelect.change(actualizarFechaNac);
    anioSelect.change(actualizarFechaNac);

    // Inicializamos la fecha con los valores actuales
    actualizarFechaNac();
});

</script>