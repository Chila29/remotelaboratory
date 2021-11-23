<?php
$halam = 'users';
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
if ($_SESSION["hak"] != "admin") {
  echo '<main id="main" class="main">
  <h1>Anda bukan admin</h1>
  </main>'; ?>
  <!-- <a href="logout.php">Kembali</a> -->
<?php
} else {
  $result = mysqli_query($conn, "SELECT * FROM user WHERE hak='mahasiswa' OR hak='dosen'");
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">User yang terdaftar</h5>
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $batas = 10;
                      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                      $previous = $halaman - 1;
                      $next = $halaman + 1;

                      $jumlah_data = mysqli_num_rows($result);
                      $total_halaman = ceil($jumlah_data / $batas);

                      $data_users = mysqli_query($conn, "select * from user where hak='dosen' or hak='mahasiswa' limit $halaman_awal, $batas");
                      $nomor = $halaman_awal + 1;
                      while ($d = mysqli_fetch_array($data_users)) {
                      ?>
                        <tr>
                          <td><?php echo $d["nama"] ?></td>
                          <td><?php echo $d['nrp']; ?></td>
                          <td><?php echo $d['hak']; ?></td>
                          <td><button class="btn btn-danger">Delete User</button></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                  <nav>
                    <ul class="pagination justify-content-center">
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
              </div><!-- End Bordered Tabs -->
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