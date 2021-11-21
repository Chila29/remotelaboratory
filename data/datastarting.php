<?php
$halam = "prak";
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
if ($_SESSION["hak"] == "3") {
  echo "Anda bukan dosen atau admin"; ?>
  <a href="../dashboards/mahasiswa.php">Kembali</a>
<?php
} else {
  $result = mysqli_query($conn, "SELECT * FROM hasilpraktikum");
  $users = mysqli_query($conn, "SELECT * FROM user WHERE hak='mahasiswa'");
?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Hasil Praktikum</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item">Hasil Praktikum</li>
          <li class="breadcrumb-item active">Starting</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <section class="section">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Hasil Praktikum</h5>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Status Praktikum</th>
                            <th scope="col">Lihat Hasil</th>
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
                              <?= (cekStatusPrak($row["nama"]) == 1) ?  '<td><span class=" badge bg-success">Sudah Praktikum</span></td>' :  '<td><span class="badge bg-danger">Belum Praktikum</span></td>' ?>
                              <td><a href="hasil.php?id=<?= $row["user_id"] ?>"><button class="btn btn-primary">Lihat</button></a></td>
                            </tr>
                          <?php endwhile; ?>
                        </tbody>
                      </table>
                      <!-- End Table with stripped rows -->

                    </div>
                  </div>
                </div>
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
            </section>
          </div>
        </div>
    </section>
  </main><!-- End #main -->
<?php
}
include('../component/footer.inc.php');
?>