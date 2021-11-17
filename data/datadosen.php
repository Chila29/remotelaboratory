<?php
$hal = "dashboard";
include('../component/connectdb.inc.php');
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
if ($_SESSION["hak"] == "3") {
  echo "Anda bukan dosen atau admin"; ?>
  <a href="../dashboards/mahasiswa.php">Kembali</a>
<?php
} else {
  $result = mysqli_query($conn, "SELECT * FROM hasilpraktikum");
  $users = mysqli_query($conn, "SELECT * FROM user WHERE hak='mahasiswa'");
?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pratikum Kontrol Gerak</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Praktikum Kontrol Gerak</li>
    </ol>
  </div>
  <div class="col-lg-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Mahasiswa</h6>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush" id="mauexport">
          <thead class="thead-light">
            <tr>
              <th>Nama</th>
              <th>NRP</th>
              <th>Status Praktikum</th>
              <th>Lihat Praktikum</th>
              <!-- <th>Praktikum</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $jumlah_data = mysqli_num_rows($users);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_users = mysqli_query($conn, "select * from user where hak='mahasiswa' limit $halaman_awal, $batas");
            $nomor = $halaman_awal + 1;
            while ($row = mysqli_fetch_array($data_users)) : ?>
              <tr>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nrp"]; ?></td>
                <?= (cekStatusPrak($row["nama"]) == 1) ?  '<td><span class=" badge badge-pill badge-success">Sudah Praktikum</span></td>' :  '<td><span class="badge badge-pill badge-danger">Belum Praktikum</span></td>' ?>
                <td><a href="lihatmahasiswa.php?id=<?= $row["user_id"] ?>"><button class="btn btn-primary">Lihat</button></a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>
    <nav>
      <ul class="pagination justify-content-center mt-4">
        <li class="page-item">
          <a class="page-link" <?php if ($halaman > 1) {
                                  echo "href='?halaman=$previous'";
                                } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
          <a class="page-link" <?php if ($halaman < $total_halaman) {
                                  echo "href='?halaman=$next'";
                                } ?>>Next</a>
        </li>
      </ul>
    </nav>
  </div>
  <!--Row-->
<?php }
include('../component/footer.inc.php');
?>