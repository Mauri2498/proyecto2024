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
        .hidden {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }

        .wrap-login10 {
            width: 100%;
            max-width: 500px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            padding: 55px 55px 37px 55px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-align: center;
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
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
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
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 25px;
            padding: 0 35px;
            color: #666666;
        }

        .symbol-input100 i {
            position: absolute;
            left: 15px;
        }

        .container-login100-form-btn {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .login100-form-btn {
            font-family: Poppins-Medium;
            font-size: 16px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: #333333;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
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
                <form class="login100-form validate-form" action="<?php echo site_url('usuario/enviarEnlaceRestablecimiento'); ?>" method="post">
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

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Enviar Enlace
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function () {
                    errorMessage.classList.add('hidden');
                }, 5000); // 5000 ms = 5 segundos
            }
        });
    </script>

    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>Login1/js/main.js"></script>

</body>

</html>
