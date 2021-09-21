<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
  <div class="container-fluid">
    <a href="<?= base_url('Dashboard') ?>" class="navbar-brand">
      <span class="brand-text font-weight-dark"><b>SI -</b><span class="text-primary"> Vaksin</span></span>
    </a>

    <?php if ($this->session->userdata('role') == 1) : ?>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url('Dashboard') ?>" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Dosen') ?>" class="nav-link">Dosen</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Mahasiswa') ?>" class="nav-link">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Tendik') ?>" class="nav-link">Tendik</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Vaksin') ?>" class="nav-link">Vaksin</a>
          </li>
        </ul>

      </div>
    <?php endif; ?>
    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth') ?>" role="button">
          <i class="fas fa-sign-out-alt"></i> Keluar
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->