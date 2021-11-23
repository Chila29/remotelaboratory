<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-start">
    <?php if ($_SESSION['hak'] == "admin") : ?>
      <a href="../dashboards/admin.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="margin-left: 10px;">Remote Laboratory <h6>Praktikum Online</h6></span>
      </a>
    <?php elseif ($_SESSION['hak'] == "dosen") : ?>
      <a href="../dashboards/dosen.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="margin-left: 10px;">Remote Laboratory <h6>Praktikum Online</h6></span>
      </a>
    <?php else : ?>
      <a href="../dashboards/mahasiswa.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="margin-left: 10px;">Remote Laboratory <h6>Praktikum Online</h6></span>
      </a>
    <?php endif; ?>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->
      <a class="nav-link nav-profile d-flex align-items-center pe-0 mr-3" href="#" data-bs-toggle="dropdown">
        <img src="<?= cekFoto($_SESSION["id"]) ? tampilFoto($_SESSION["id"]) : "../assets/img/boy.png" ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION["name"]; ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?= $_SESSION["name"]; ?></h6>
          <span><?= $_SESSION['nrp']; ?></span>
          <br>
          <span><?= strtoupper($_SESSION["hak"]); ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="../dashboards/settings.php">
            <i class="bi bi-gear"></i>
            <span>Pengaturan Akun</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
          </a>
        </li>
      </ul>
    </ul>
  </nav>
</header>