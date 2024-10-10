<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mensaje</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Login1/css/main.css">
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-title">
                    <?php echo $mensaje; ?>
                </span>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>Login1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>Login1/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="<?php echo base_url(); ?>Login1/js/main.js"></script>
</body>
</html>
