<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
$sql = "SELECT * FROM praktikum";
$query = mysqli_query($conn, $sql);
$prak = mysqli_fetch_array($query);
if ($_SESSION["hak"] != "dosen") {
  if ($_SESSION["hak"] == "admin") {
    echo "Anda bukan Dosen" ?>
    <a href="Dashboard.php">Kembali</a>
  <?php
  } else {
    echo "Anda bukan Dosen" ?>
    <a href="mahasiswa.php">Kembali</a>
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
  <div class="container-fluid">
    <div class="row flex-row flex-nowrap">
      <div class="col-4">
        <div class="card text-center">
          <div class="card-header">
            Praktikum
          </div>
          <div class="card-body">
            <h5 class="card-title">Motor Induksi 3 Fasa</h5>
            <p class="card-text">Pada praktikum ini, mahasiswa dapat mengendalikan Motor induksi 3 Fasa melalui website, dimana pada modul praktikum terdapat sebuah inverter untuk mengatur kecepatan motor dan merubah arah putaran motor agar dapat berputar secara forward atau reverse. Untuk dapat diakses secara jarak jauh melalui website, pada modul praktikum diberikan sebuah Data Aquisition Module yang berfungsi mengakuisi data yang diperoleh dari praktikum motor.</p>
            <a href="../praktikum/MulaiPraktikum.php?prak_id=<?= $prak["id_prak"] ?>" class="btn btn-primary">Lihat</a>
          </div>
          <div class="card-footer text-muted">
          </div>
        </div>
      </div>
    </div>
  </div>

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