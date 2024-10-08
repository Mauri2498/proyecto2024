<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Obtiene el token de la URL
$token = isset($_GET['token']) ? $_GET['token'] : '';

// Valida el token y redirige a la página de restablecimiento
if ($token) {
    header("Location: " . base_url() . "usuario/restablecerContrasenia/$token");
    exit();
} else {
    echo "Token inválido o no proporcionado.";
}
?>
