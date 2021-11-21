<?php
$halam = 'dashboard';
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
$sql = "SELECT * FROM praktikum";
$query = mysqli_query($conn, $sql);
$prak = mysqli_fetch_array($query);
if ($_SESSION["hak"] != "admin") {
  if ($_SESSION["hak"] == "dosen") {
    echo '<main id="main" class="main">
  <h1>Anda bukan Admin</h1>
  <a href="dosen.php">Kembali</a>
  </main>'; ?>
  <?php
  } else {
    echo '<main id="main" class="main">
  <h1>Anda bukan Admin</h1>
  <a href="mahasiswa.php">Kembali</a>
  </main>'; ?>
  <?php
  }
  ?>
<?php
} else {
?>
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Praktikum 1 <span>Motor Inverse Adam </span></h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <span class="text-muted small pt-2 ps-1">Pada praktikum ini, mahasiswa dapat mengendalikan Motor induksi 3 Fasa melalui website, dimana pada modul praktikum terdapat sebuah inverter untuk mengatur kecepatan motor dan merubah arah putaran motor agar dapat berputar secara forward atau reverse. Untuk dapat diakses secara jarak jauh melalui website, pada modul praktikum diberikan sebuah Data Aquisition Module yang berfungsi mengakuisi data yang diperoleh dari praktikum motor.</span>
                    </div>
                  </div>
                  <a href="../praktikum/mulaipraktikum.php?prak_id=<?= $prak["id_prak"] ?>" class="btn btn-primary mb-2 mt-2">Lihat Praktikum</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->


        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales">
            <div class="card-body">
              <h5 class="card-title">Video Tutorial</h5>

              <tr>
                <th class="ml-3">
                  <iframe width="320" height="240" src="https://www.youtube.com/embed/AQqyGNOP_3o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </video>
                </th>
                <th class="ml-3">
                  <iframe width="320" height="240" src="https://www.youtube.com/embed/59HBoIXzX_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </video>
                </th>
              </tr>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
<?php
}
include('../component/footer.inc.php');
?>