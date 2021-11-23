<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Dashboard</li>
    <?php if ($_SESSION['hak'] == "mahasiswa") : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed' ?>" href="../dashboards/mahasiswa.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <?php elseif ($_SESSION['hak'] == "dosen") : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed' ?>" href="../dashboards/dosen.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <?php elseif ($_SESSION['hak'] == "admin") : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'dashboard') ? '' : 'collapsed' ?>" href="../dashboards/admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <?php endif; ?>
    <li class="nav-heading">Users</li>
    <?php if ($_SESSION['hak'] == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'users') ? '' : 'collapsed' ?>" href="../dashboards/users.php">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
    <?php endif; ?>
    <li class="nav-item">
      <a class="nav-link <?= ($halam == 'antrian') ? '' : 'collapsed' ?>" href="../dashboards/antrian.php">
        <i class="bi bi-card-list"></i>
        <span>Antrian</span>
      </a>
    </li>
    <li class="nav-heading">Praktikum</li>
    <li class="nav-item">
      <a class="nav-link <?= ($add == "percobaan")? '':'collapsed'?>" data-bs-target="#percobaan" data-bs-toggle="collapse" aria-expanded="false">
        <i class="bi bi-journal-text"></i><span>Percobaan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="percobaan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../praktikum/percobaan1.php?id_percobaan=1" class="<?= ($halam == "percobaan1")? 'active':''?>">
            <i class="bi bi-circle"></i><span>Percobaan 1</span>
          </a>
        </li>
        <li>
          <a href="../praktikum/percobaan2.php?id_percobaan=2" class="<?= ($halam == "percobaan2")? 'active':''?>">
            <i class="bi bi-circle"></i><span>Percobaan 2</span>
          </a>
        </li>
        <li>
          <a href="../praktikum/percobaan3.php?id_percobaan=3" class="<?= ($halam == "percobaan3")? 'active':''?>">
            <i class="bi bi-circle"></i><span>Percobaan 3</span>
          </a>
        </li>
      </ul>
    </li>
    <?php if ($_SESSION['hak'] == "mahasiswa") : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'prak') ? '' : 'collapsed' ?>" href="../data/hasilpraktikummhs.php">
          <i class="bi bi-file-earmark"></i>
          <span>Hasil Praktikum</span>
        </a>
      </li>
    <?php elseif ($_SESSION['hak'] == "dosen" or $_SESSION['hak'] == "admin") : ?>
      <li class="nav-item">
        <a class="nav-link <?= ($halam == 'prak') ? '' : 'collapsed' ?>" href="../data/hasilpraktikum.php">
          <i class="bi bi-file-earmark"></i>
          <span>Hasil Praktikum</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</aside><!-- End Sidebar-->