<?php
$halam = 'dashboard';
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
$sql = "SELECT * FROM praktikum";
$query = mysqli_query($conn, $sql);
$prak = mysqli_fetch_array($query);
if ($_SESSION["hak"] != "mahasiswa") {
  if ($_SESSION["hak"] == "dosen") {
    echo '<main id="main" class="main">
  <h1>Anda bukan Mahasiswa</h1>
  <a href="dosen.php">Kembali</a>
  </main>'; ?>
  <?php
  } else {
    echo '<main id="main" class="main">
  <h1>Anda bukan Mahasiswa</h1>
  <a href="admin.php">Kembali</a>
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
            <?php
            $cekAntrian = mysqli_query($conn, "select no_antrian, id_user from antrian order by id_antrian asc limit 1");
            $rowAntrian = mysqli_num_rows($cekAntrian);
            $antrian = mysqli_fetch_assoc($cekAntrian);
            if ($rowAntrian == 1) {
              if ($antrian['id_user'] == $_SESSION['id']) {
            ?>
                <div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">
                    <div class="card-body">
                      <h5 class="card-title">Praktikum 1 <span>Motor Induksi 3 Fasa </span></h5>
                      <div class="d-flex align-items-center">
                        <div class="ps-3">
                          <span class="text-muted small pt-2 ps-1">Pada praktikum ini, mahasiswa dapat mengendalikan Motor induksi 3 Fasa melalui website, dimana pada modul praktikum terdapat sebuah inverter untuk mengatur kecepatan motor dan merubah arah putaran motor agar dapat berputar secara forward atau reverse. Untuk dapat diakses secara jarak jauh melalui website, pada modul praktikum diberikan sebuah Data Aquisition Module yang berfungsi mengakuisi data yang diperoleh dari praktikum motor.</span>
                          <br>
                          <a href="../praktikum/mulaipraktikum.php?prak_id=<?= $prak["id_prak"] ?>" class="btn btn-primary mb-2 mt-2">Lihat Praktikum</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      <?php
              } else {
                $cekStatus = mysqli_query($conn, "select status_prak from user where user_id = '" . $antrian['id_user'] . "'");
                $status = mysqli_fetch_assoc($cekStatus);

                $info = $status['status_prak'] == 1 ? 'Sedang Melakukan Praktikum' : 'Belum Memasuki Room Praktikum';
      ?>
        <div class="alert alert-info" style="color:#330cbb !important"><strong>Status Room Praktikum : </strong> Antrian Nomor <?= $antrian['no_antrian'] . " " . $info ?> </div>
        <div class="alert alert-info" style="color:#330cbb !important"><strong>Silahkan mengambil antrian dikolom antrian yang telah tersedia</strong> </div>
      <?php
              }
            } else {
      ?>
      <div class="alert alert-info" style="color:#330cbb !important"><strong>Masih Belum Ada Mahasiswa Yang Mengantri</strong> </div>
    <?php
            }
    ?>
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
    </section>
  </main>
<?php
}
include('../component/footer.inc.php');
?>