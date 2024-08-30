
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Dental del Dr. Jaime</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #87CEEB;
        }
        header {
            background-color: #00a2e8;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        h1 {
            font-size: 36px;
        }
        nav {
            background-color: #333;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav li {
            display: inline;
            margin-right: 20px;
        }
        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .doctor-image {
            max-width: 100%;
        }
        address strong {
            font-weight: bold; 
        }
        #inicio {
            text-align: center; 
        }
        #reg{
            float: right;
        }
    </style>
</head>
<body>
    <header>
        <h1>Consultorio Dental del Dr. Jaime</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#contacto">Contacto</a></li>


            <li id="reg"><a href="<?php echo base_url();?>index.php/usuario/panel">Ingresar</a></li>
<!--             <li id="reg"><a href="<?php echo base_url();?>index.php/usuario/agregar">Registrarse</a></li>
 -->

        </ul>
    </nav>
    <div class="container">
        <section id="inicio">
            <h2>Bienvenido al Consultorio Dental del Dr. Jaime</h2>
            <p>Su salud bucal es nuestra prioridad.</p>
            <img class="doctor-image" src="https://img.freepik.com/vector-gratis/dentista-hombre-examinando-dientes-paciente-sobre-fondo-blanco_1308-103308.jpg?size=626&ext=jpg&ga=GA1.1.1016474677.1696377600&semt=ais" alt="Dr. Jaime" /> <!-- Reemplaza 'URL_DE_LA_IMAGEN_DEL_DR_JAIME' con la URL de la imagen del Dr. Jaime -->
        </section>
        <section id="servicios">
            <h2>Servicios</h2>
            <ul>
                <li>Blanqueamiento dental</li>
                <li>Extracción de muelas</li>
                <li>Implantes dentales</li>
                <li>Ortodoncia</li>
                <li>Otros</li>
            </ul>
        </section>
        <section id="contacto">
            <h2>Contacto</h2>
            <p>Puede encontrarnos en:</p>
            <address>
                Dirección: Migueal Achata y Qurimay <br> 
                Teléfono: 73760717 <br>
                Correo Electrónico: jeryernesto@gmail.com
            </address>
        </section>
    </div>
</body>
</html>
