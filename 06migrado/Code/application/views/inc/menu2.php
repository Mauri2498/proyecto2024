  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url();?>index.php/usuario/vistaDoctor" class="brand-link">
          <img src="<?php echo base_url(); ?>adminlte/dist/img/consultorio.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Consultorio Dental</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo base_url(); ?>adminlte/dist/img/doc-1.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
              <a href="#" class="d-block"><?php echo "".$_SESSION['var_nombre']. " ".$_SESSION['var_apellidos'];?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="nuevosRegistros.php" class="nav-link ">
                      <i class="nav-icon fas fa-user-injured"></i>
                          <p>
                              Nuevos Pacientes Registrados
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>



              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="reportes.php" class="nav-link ">
                      <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Reportes
                          </p>
                      </a>
                  </li>
              </ul>

          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
</aside>