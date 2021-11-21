<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Dashboard</li>
    <?php if($_SESSION['hak'] == "mahasiswa"): ?>
    <li class="nav-item">
      <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed'?>" href="../dashboards/mahasiswa.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <?php elseif($_SESSION['hak'] == "dosen"): ?>
    <li class="nav-item">
      <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed'?>" href="../dashboards/dosen.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <?php elseif($_SESSION['hak'] == "admin"): ?>
      <li class="nav-item">
      <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed'?>" href="../dashboards/admin.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <?php endif; ?>
    <li class="nav-heading">Users</li>
    <?php if($_SESSION['hak'] == 'admin'): ?>
    <li class="nav-item">
      <a class="nav-link" href="../dashboards/users.php">
        <i class="bi bi-person"></i>
        <span>Users</span>
      </a>
    </li>
    <?php endif; ?>
    <li class="nav-item">
      <a class="nav-link <?= ($halam == 'antrian') ? '' : 'collapsed'?>" href="../dashboards/antrian.php">
        <i class="bi bi-card-list"></i>
        <span>Antrian</span>
      </a>
    </li>
    <li class="nav-heading">Praktikum</li>
    <?php if($_SESSION['hak'] == "mahasiswa"): ?>
    <li class="nav-item">
      <a class="nav-link <?= ($halam == 'prak') ? '' : 'collapsed'?>" href="../data/hasilpraktikummhs.php">
        <i class="bi bi-file-earmark"></i>
        <span>Hasil Praktikum</span>
      </a>
    </li>
    <?php elseif($_SESSION['hak'] == "dosen" or $_SESSION['hak'] == "admin"): ?>
      <li class="nav-item">
      <a class="nav-link <?= ($halam == 'prak') ? '' : 'collapsed'?>" href="../data/hasilpraktikum.php">
        <i class="bi bi-file-earmark"></i>
        <span>Hasil Praktikum</span>
      </a>
    </li>
    <?php endif; ?>
  </ul>
</aside><!-- End Sidebar-->