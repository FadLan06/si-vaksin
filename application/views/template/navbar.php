<!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container-fluid">
      <a href="<?=base_url('Dashboard')?>" class="navbar-brand">
        <img src="<?=base_url('assets')?>/img/logo.png" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-dark"><b>SPD</b><span class="text-warning"> BawasluKota</span></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?=base_url('Dashboard')?>" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Data Master</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?=base_url('Pegawai')?>" class="dropdown-item">Data Pegawai </a></li>
              <li><a href="<?=base_url('Dasar')?>" class="dropdown-item">Data Dasar Hukum</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Data SPD</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">SPT</a></li>
              <li><a href="#" class="dropdown-item">SPPD</a></li>
              <li><a href="#" class="dropdown-item">KWITANSI</a></li>
              <li><a href="#" class="dropdown-item">NOTA DINAS</a></li>
            </ul>
          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('Auth')?>" role="button">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->