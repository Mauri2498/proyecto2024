<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
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
		.login100-form-title{
			font-size: 30px;
            color: #333;
		}
	</style>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>Login1/images/doc.jpg" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="<?php echo site_url('usuario/validarusuario'); ?>" method="post">
					<span class="login100-form-title">
						Acceso
					</span>
					<?php if (isset($error)) : ?>
						<div id="error-message" class="alert alert-danger mt-3" role="alert">
							<?= $error ?>
						</div>
					<?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate="Usuario es requerido">
						<input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contraseña es requerida">
						<input class="input100" type="password" name="clave" id="clave" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Olvidaste tu
						</span>
						<a class="txt2" href="<?php echo site_url('usuario/solicitarRestablecimiento'); ?>">
							Usuario / Contraseña?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo site_url('usuario/agregarR'); ?>">
							Crear una cuenta
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>



	<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(function() {
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