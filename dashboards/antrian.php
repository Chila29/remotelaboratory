<?php
$halam = "antrian";
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Antrian</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Antrian</li>
      </ol>
    </nav>
  </div>
  <?php
  if (isset($_GET['setAntrian'])) {
  ?>
    <div class="alert alert-success alert-dismissible fade show" style="color:green !important" role="alert">
      <strong>Nomer Antrian Berhasil Didapat</strong>
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  if (isset($_GET['hapusAntrian'])) {
  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Nomor Antrian Berhasil dihapus
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
  }

  if ($_SESSION["hak"] == 'mahasiswa') {
    $cek = mysqli_query($conn, "select id_antrian from antrian where id_user = '" . $_SESSION['id'] . "' order by id_antrian asc ");
    $dataCek = mysqli_num_rows($cek);

    if ($dataCek == 0) {
      echo "<a href='../_actions/setAntrian.php?id_user=" . $_SESSION['id'] . "' class='btn btn-primary' style='color:white'><span class='fa fa-ticket-alt'></span> Ambil No Antrian</a>";
    }
  }
  ?>
  <section class="section">
    <div class="card-body">
      <h5 class="card-title">ANTRIAN</h5>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">No Antrian</th>
            <th scope="col">Mahasiswa</th>
            <th scope="col">Waktu Submit Antrian</th>
            <?php
            if ($_SESSION["hak"] == 'admin') {
              echo "<th scope='col'>Opsi</th>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = mysqli_query($conn, "select a.id_antrian,a.no_antrian,u.nama,a.waktu_antrian from antrian a join user u on a.id_user = u.user_id");
          while ($data = mysqli_fetch_assoc($sql)) {
          ?>
            <tr>
              <td><?= $data['no_antrian'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= date('d F Y, H:i', strtotime($data['waktu_antrian'])) ?></td>
              <?php
              if ($_SESSION["hak"] == 'admin') {
                echo "<td><a class='btn btn-danger' href='../_actions/hapusAntrian.php?id_antrian=" . $data['id_antrian'] . "'>Hapus</a></td>";
              }
              ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</main>
<?php
include('../component/footer.inc.php');
?>