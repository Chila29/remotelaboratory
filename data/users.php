<?php
$hal = "dashboard";
include('../component/connectdb.inc.php');
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
if ($_SESSION["hak"] != "1") {
  echo "Anda bukan ADMINT"; ?>
  <a href="logout.php">Kembali</a>
<?php
} else {
  $result = mysqli_query($conn, "SELECT * FROM user WHERE hak='mahasiswa' OR hak='dosen'");
?>
  <div class="col-lg-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">User yang terdaftar</h6>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush" id="mauexport">
          <thead class="thead-light">
            <tr>
              <th>Nama</th>
              <th>NRP</th>
              <th>Status</th>
              <th>Opsi</th>
              <!-- <th>Praktikum</th> -->
            </tr>
          </thead>
          <tbody>
          <?php 
				$batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$jumlah_data = mysqli_num_rows($result);
				$total_halaman = ceil($jumlah_data / $batas);

				$data_users = mysqli_query($conn,"select * from user where hak='dosen' or hak='mahasiswa' limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
				while($d = mysqli_fetch_array($data_users)){
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
      </div>
      <div class="card-footer"></div>
    </div>
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
<?php
}
include('../component/footer.inc.php');
?>