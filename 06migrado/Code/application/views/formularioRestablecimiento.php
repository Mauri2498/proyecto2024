<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restablecer Contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>Login1/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/css/main.css">
    <!--===============================================================================================-->
    <style>
        .wrap-login10 {
            width: 100%;
            max-width: 600px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            padding: 55px 55px 37px 55px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 auto;
        }

        .wrap-input100 {
            position: relative;
            width: 100%;
            z-index: 1;
            margin-bottom: 30px;
        }

        .input100 {
            font-family: Poppins-Medium;
            font-size: 15px;
            line-height: 1.5;
            color: #666666;
            display: block;
            width: 100%;
            background: #e6e6e6;
            height: 60px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
            box-sizing: border-box;
        }

        .focus-input100 {
            position: absolute;
            display: block;
            width: calc(100% + 2px);
            height: calc(100% + 2px);
            top: -1px;
            left: -1px;
            border-radius: 25px;
            margin-top: 10px;
        }

        .symbol-input100 {
            font-size: 15px;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 25px;
            padding: 0 35px;
            color: #666666;
            height: 100%; /* Asegura que el contenedor del ícono tenga la altura completa del input */
            top: 0;
            left: 0; /* Ajusta la posición del ícono */
        }

        .symbol-input100 i {
            position: absolute;
            left: 15px;
            line-height: 60px; /* Centra verticalmente el ícono dentro del input */
        }

        .container-login100-form-btn {
            width: 100%;
            display: flex;
            justify-content: center; /* Centra el botón en la línea */
        }

        .login100-form-btn {
            font-family: Poppins-Medium;
            font-size: 16px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;
            width: 100%; /* Ocupa todo el ancho disponible */
            height: 50px;
            border-radius: 25px;
            background: #333333;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 25px;
            transition: all 0.4s;
        }

        .login100-form-btn:hover {
            background: #555555;
        }
    </style>
</head>

<body>
    <div class="limiter" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div class="container-login100">
            <div class="wrap-login10">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div id="error-message" class="alert alert-danger mt-3" role="alert">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form class="login100-form validate-form" action="<?php echo site_url('usuario/procesarRestablecimiento'); ?>" method="post">
                    <span class="login100-form-title">
                        Restablecer Contraseña
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Correo Electrónico es requerido">
                        <input class="input100" type="email" name="correo" placeholder="Correo Electrónico" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Nueva Contraseña es requerida">
                        <input class="input100" type="password" name="nuevaContrasenia" placeholder="Nueva Contraseña" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Confirmar Contraseña es requerida">
                        <input class="input100" type="password" name="confirmarContrasenia" placeholder="Confirmar Contraseña" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Restablecer Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal de éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    La contraseña se restableció correctamente.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>Login1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/js/main.js"></script>
    <script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')): ?>
            $('#successModal').modal('show');

            // Redirigir al hacer clic en "Aceptar" en el modal
            $('#successModal .btn-primary').click(function() {
                window.location.href = "<?php echo site_url('usuario/login'); ?>";
            });

/*             // Redirigir automáticamente después de 3 segundos
            setTimeout(function() {
                window.location.href = "<?php echo site_url('usuario/login'); ?>";
            }, 3000);
        <?php endif; ?> */

        // Código para ocultar el mensaje de error después de 5 segundos
        var errorMessage = $('#error-message');
        if (errorMessage.length) {
            setTimeout(function () {
                errorMessage.fadeOut('slow');
            }, 5000);
        }
    });
</script>


</body>

</html>
