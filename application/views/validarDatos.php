<?php  

    $conexionBD = new ConexionBD();
    $conexionBD->conectar();    


    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $sql = "select idUsuario, usuario,contraseña,nombre,apellidos,tipoUsuario from usuario where usuario='$valor1' and contraseña='$valor2'";

    
    $resultado = $conexionBD->conexion->query($sql);

    if ($resultado->num_rows > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['idUsuario'];
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $tipoUsuario = $fila['tipoUsuario'];


    /*Varibles de sesion*/
    $_SESSION['var_idUsuario'] = $idUsuario;
    $_SESSION['var_nombre'] = $nombre;
    $_SESSION['var_apellidos'] = $apellidos;


        ?>
        <script>
        if ("<?php echo $tipoUsuario; ?>" === 'Doctor') {
            window.location.href = "<?php echo base_url();?>index.php/usuario/vistaDoctor";
        } else {
            window.location.href = "temp/index.php"; 
            //window.location.href = "main2.php"; 
        }
        </script>
        <?php
    } else {
        ?>
        <div class="alert alert-warning">
            <strong>Advertencia!</strong> El usuario o contraseña ingresados no son correctos.
        </div>
        <?php
    }
    ?>