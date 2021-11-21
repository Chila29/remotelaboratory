<?php
$halam = "prak";
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Hasil Praktikum</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Hasil Praktikum</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Hasil Praktikum</h5>
            <span class="badge bg-info text-dark mb-4">Info</span>
            <p>Silahkan Klik Praktikum yang ingin anda ketahui hasilnya</p>
            <div class="list-group">
              <?php if ($_SESSION['hak'] == "admin" or $_SESSION['hak'] == "dosen") : ?>
                <a href="datastarting.php "> <button type="button" class="list-group-item list-group-item-action ">Starting</button>
                <?php elseif ($_SESSION['hak'] == "mahasiswa") : ?>
                  <a href="hasilpraktikummhs.php "> <button type="button" class="list-group-item list-group-item-action ">Starting</button>
                  <?php endif; ?>
                  <button type="button" class="list-group-item list-group-item-action">Breaking</button>
                  <button type="button" class="list-group-item list-group-item-action">Pengatur Kecepatan</button>
                  <button type="button" class="list-group-item list-group-item-action">Pengatur Arah Putar</button>
                  <button type="button" class="list-group-item list-group-item-action">Monitoring Vibration</button>
                  <button type="button" class="list-group-item list-group-item-action">Monitoring arus dan tegangan</button>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include('../component/footer.inc.php');
?>