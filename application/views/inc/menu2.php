<aside class="main-sidebar sidebar-dark-primary elevation-4 d-flex flex-column">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>index.php/usuario/vistaDoctor" class="brand-link">
        <img src="<?php echo base_url(); ?>adminlte/dist/img/consultorio.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Consultorio Dental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar flex-grow-1">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>adminlte/dist/img/doc-1.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellidos'); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url();?>index.php/usuario/listaUsuarios" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url();?>index.php/servicios/cobro" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Cobros</p>
                    </a>
                </li>
            </ul>
        </nav>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="reportes.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Reportes</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

<!--     <div class="sidebar-footer mt-auto p-3">
        <a href="<?php echo base_url();?>index.php/usuario/logout" class="btn btn-danger btn-block">
            Cerrar sesión
        </a>
    </div> -->
</aside>

<style>
    /* Estilo para el panel desplegable */
    .dropdown-panel {
        display: none;
        background: #f8f9fa;
        border: 1px solid #ddd;
        padding: 10px;
        position: absolute;
        top: 100%; /* Posiciona el panel justo debajo del contenedor */
        left: 0; /* Alinea el panel con el borde izquierdo del contenedor */
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Añade sombra para mejor visibilidad */
    }
    .dropdown-panel a {
        display: block;
        margin: 5px 0;
        text-decoration: none;
        color: #007bff;
    }
    .dropdown-panel a:hover {
        text-decoration: underline;
    }
    .dropdown-toggle {
        cursor: pointer;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropdown-toggle').on('click', function(event) {
            event.preventDefault();
            var $panel = $(this).siblings('#dropdownPanel');
            $panel.slideToggle('fast');
            event.stopPropagation();
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.dropdown-toggle, #dropdownPanel').length) {
                $('#dropdownPanel').slideUp('fast');
            }
        });
    });
</script>
