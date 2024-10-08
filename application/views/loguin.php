<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Consultorio Dental</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>login/assets/images/fav.jpg">
  <link rel="stylesheet" href="<?php echo base_url(); ?>login/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>login/assets/css/fontawsom-all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/assets/css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="h-100">
  <div class="container-fluid full-bg h-100">
    <div class="container h-100 d-flex justify-content-center align-items-center">
      <div class="row no-margin w-100">
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="login-box">
            <i class="fab fa-codepen mb-4"></i>
            <h3 class="text-center mb-4">Login</h3>
            <form action="<?php echo site_url('usuario/validarusuario'); ?>" method="post">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" placeholder="Usuario" aria-label="Username">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="clave" id="clave" class="form-control form-control-sm" placeholder="Contraseña" aria-label="Password">
              </div>
<!--               <p class="text-center mb-4">
                <a href="#">Olvidaste tu contraseña?</a>
              </p> -->
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
              <p class="text-center mt-3">
                Not a member yet? <a href="<?php echo site_url('usuario/agregarR'); ?>">Registrarse</a>
              </p>
            </form>
            <?php if(isset($error)): ?>
            <div class="alert alert-danger mt-3" role="alert">
              <?= $error ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>login/assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>login/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>login/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>login/assets/js/script.js"></script>
</body>

</html>
