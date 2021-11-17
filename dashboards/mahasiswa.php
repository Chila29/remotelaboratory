<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
$sql = "SELECT * FROM praktikum";
$query = mysqli_query($conn, $sql);
$prak = mysqli_fetch_array($query);
if ($_SESSION["hak"] != "mahasiswa") {
  if ($_SESSION["hak"] == "dosen") {
    echo "Anda bukan Mahasiswa" ?>
    <a href="dosen.php">Kembali</a>
  <?php
  } else {
    echo "Anda bukan Mahasiswa" ?>
    <a href="Dashboard.php">Kembali</a>
  <?php
  }
  ?>
<?php
} else {
?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>
  <?php
  $cekAntrian = mysqli_query($conn, "select no_antrian, id_user from antrian order by id_antrian asc limit 1");
  $rowAntrian = mysqli_num_rows($cekAntrian);
  $antrian = mysqli_fetch_assoc($cekAntrian);
  if ($rowAntrian == 1) {
    if ($antrian['id_user'] == $_SESSION['id']) {
  ?>
      <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
          <div class="col-4">
            <div class="card text-center">
              <div class="card-header">
                PRAKTIKUM
              </div>
              <div class="card-body">
                <h5 class="card-title">Motor Induksi 3 Fasa</h5>
                <p class="card-text">Pada praktikum ini, mahasiswa dapat mengendalikan Motor induksi 3 Fasa melalui website, dimana pada modul praktikum terdapat sebuah inverter untuk mengatur kecepatan motor dan merubah arah putaran motor agar dapat berputar secara forward atau reverse. Untuk dapat diakses secara jarak jauh melalui website, pada modul praktikum diberikan sebuah Data Aquisition Module yang berfungsi mengakuisi data yang diperoleh dari praktikum motor.</p>
                <a href="../praktikum/MulaiPraktikum.php?prak_id=<?= $prak["id_prak"] ?>" class="btn btn-primary">Mulai</a>
              </div>
              <div class="card-footer text-muted">
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    } else {
      $cekStatus = mysqli_query($conn, "select status_prak from user where user_id = '" . $antrian['id_user'] . "'");
      $status = mysqli_fetch_assoc($cekStatus);

      $info = $status['status_prak'] == 1 ? 'Sedang Melalukan Praktikum' : 'Belum Memasuki Room Praktikum';
    ?>
      <div class="alert alert-info" style="color:#330cbb !important"><strong>Status Room Praktikum : </strong> Antrian Nomor <?= $antrian['no_antrian'] . " " . $info ?> </div>
      <div class="alert alert-info" style="color:#330cbb !important"><strong>Silahkan mengambil antrian dikolom antrian yang telah tersedia</strong> </div>
  <?php
    }
  }
  ?>
  <br></br>
  <div class="card">
    <div class="card-header">
      <div class="m-0 font-weight-bold text-primary">
        Video Tutorial
      </div>
    </div>
    <div class="card-body">
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
    <div class="card-footer text-muted">
    </div>
  </div>
<?php
}
include('../component/footer.inc.php');
?>