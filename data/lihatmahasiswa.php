<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
if ($_SESSION["hak"] != "2" & $_SESSION["hak"] != "1") {
  echo "Anda bukan dosen"; ?>
  <a href="../logout.php">Kembali</a>
<?php
} else {
$conn = mysqli_connect("localhost", "root", "", "remotlab");
$result = mysqli_query($conn, "SELECT * FROM hasilpraktikum");
$users = mysqli_query($conn, "SELECT * FROM user WHERE user_id= " . $_GET["id"]);
$row = mysqli_fetch_assoc($users);
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800 align-item-center justify-content-center">Pratikum Kontrol Gerak</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Praktikum Kontrol Gerak</li>
  </ol>
</div>
<h3 class="ml-4">Nama: <?= $row["nama"]; ?></h3>
<h3 class="ml-4">NRP: <?= $row["nrp"]; ?></h3>
<div class="col-lg-12 mb-4">
  <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Hasil Praktikum</h6>
      <a target="_blank" href="export.php">Export Data</a>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="mauexport">
        <thead class="thead-light">
          <tr>
            <th>Timestamp</th>
            <th>Vin</th>
            <th>Vout</th>
            <!-- <th>Praktikum</th> -->
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $row["waktu"]; ?></td>
              <td><?= $row["vin"]; ?></td>
              <td><?= $row["vout"]; ?></td>
              <!-- <td><span class="badge badge-success">Starting</span></td> -->
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <div class="card-footer"></div>
  </div>
  <a href="datadosen.php">Kembali</a>
</div>
</div>
<!--Row-->
<?php }
include('../component/footer.inc.php');
?>