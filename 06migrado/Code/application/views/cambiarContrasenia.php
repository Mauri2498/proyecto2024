<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Cambiar Contraseña</title> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> 
    <!-- Font Awesome --> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css"> 
    <!-- Theme style --> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/adminlte.min.css"> 
    <style> 
        .change-password-box { 
            margin: 0 auto;  
            width: 40%;  
            padding: 30px; 
        } 
        .alert { 
            margin-bottom: 15px; 
        } 
    </style> 
</head> 
<body> 
    <div class="change-password-box"> 
        <div id="confirmationInsert" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert"> 
            <strong>Éxito</strong> Contraseña cambiada correctamente. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
              <span aria-hidden="true">&times;</span> 
            </button> 
        </div>   
        <div class="card card-outline card-primary"> 
            <div class="card-header text-center"> 
                <h1>Cambiar Contraseña</h1> 
            </div> 
            <div class="card-body"> 
                <?php if(isset($error)): ?> 
                    <div class="alert alert-danger"><?php echo $error; ?></div> 
                <?php endif; ?> 
 
                <form method="post" action="<?php echo site_url('usuario/cambiarContraseniabd'); ?>"> 
                    <div class="input-group mb-3"> 
                        <input type="password" name="actualContrasenia" id="actualContrasenia" class="form-control" placeholder="Contraseña Actual" required> 
                        <div class="input-group-append"> 
                            <div class="input-group-text"> 
                                <span class="fas fa-lock"></span> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="input-group mb-3"> 
                        <input type="password" name="nuevaContrasenia" id="nuevaContrasenia" class="form-control" placeholder="Nueva Contraseña" required> 
                        <div class="input-group-append"> 
                            <div class="input-group-text"> 
                                <span class="fas fa-lock"></span> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="input-group mb-3"> 
                        <input type="password" name="confirmarContrasenia" id="confirmarContrasenia" class="form-control" placeholder="Confirmar Nueva Contraseña" required> 
                        <div class="input-group-append"> 
                            <div class="input-group-text"> 
                                <span class="fas fa-lock"></span> 
                            </div> 
                        </div> 
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button> 
                </form> 
            </div> 
        </div> 
    </div> 
 
    <!-- jQuery --> 
    <script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script> 
    <!-- Bootstrap 4 --> 
    <script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <!-- AdminLTE App --> 
    <script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.js"></script> 
    <script> 
        $(document).ready(function() { 
            <?php if ($this->session->flashdata('success')): ?> 
                $('#confirmationInsert').fadeIn(); 
                setTimeout(function() { 
                    $('#confirmationInsert').fadeOut(); 
                }, 2000); 
            <?php endif; ?> 
        }); 
    </script> 
</body> 
</html>