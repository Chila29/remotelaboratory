<?php
$hal = "dashboard";
include('../component/connectdb.inc.php');
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
#NGECEK USER YANG SEDANG PRAKTIKUM ATAU TIDAK
$cek_user = mysqli_query($conn, "SELECT * FROM antrian WHERE status_prak = 1");
$user_praktikum = mysqli_num_rows($cek_user);
$urutan_skrg = mysqli_fetch_assoc($cek_user);
#NGECEK USER YANG SEDANG PRAKTIKUM ^
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item">Praktikum</li>
    <li class="breadcrumb-item active" aria-current="page">Mulai Praktikum</li>
  </ol>
</div>
<div class="text-center">
  <!-- <img src="img/think.svg" style="max-height: 90px"> -->
  <h4 class="pt-3">Praktikum Motor Induksi 3 Fasa</h4>
  <h5>Kontrol Gerak</h5>
  <h6>Arif Mustofa</h6>
</div>
<div class="row">
  <h4>Langkah Pengerjaan</h4>
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6> -->
        1. Masuk pada halaman "Praktikum"
        </br>
        <br>
        2. Klik tombol "mulai" kemudian akan masuk ke halaman mulai praktikum
        </br>
        <br>
        3. Disarankan untuk melihat video tutorial yang telah disediakan terlebih dahulu
        </br>
        <br>
        4. Download Modul Praktikum
        </br>
        <br>
        5. Pilih tema praktikum yang akan dilakukan
        </br>
        <br>
        6. Aktifkan selector pada tombol forward / reverse
        </br>
        <br>
        7. Atur kecepatan dengan memasukkan tegangan yang disimbolkan dengan "knob voltase"
        </br>
        <br>
        8. Untuk menerapkan kecepatan motor yang telah diatur tekan tombol "Ganti Voltase" maka motor akan berputar dengan kecepatan yang telah diatur
        </br>
        <!-- <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum reprehenderit maxime eligendi. Aspernatur magnam maxime cupiditate molestias ipsum earum facilis veniam tempora dolore sequi, exercitationem ad ex rerum facere vero.</h6> -->
      </div>
    </div>
    <h4>Modul Praktikum</h4>
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <div class="container">
            <div class="row">
              <div class="col py-2">
                Modul Praktikum 1
                <span><a href="#">Download</a></span>
              </div>
              <div class="col">Modul Praktikum 2
                <span><a href="#">Download</a></span>
              </div>
              <div class="w-100"></div>
              <div class="col">Modul Praktikum 3
                <span><a href="#">Download</a></span>
              </div>
              <div class="col">Modul Praktikum 4
                <span><a href="#">Download</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="align-items-center">
      <form action="" method="POST">
        <button class="btn btn-primary mb-1" name="start">Mulai Praktikum</button>
        <button class="btn btn-primary mb-1" name="antrian">Antri!</button>
        <!-- <button class="btn btn-primary mb-1">Breaking</button>
        <button class="btn btn-primary mb-1">Pengaturan Kecepatan</button>
        <button class="btn btn-primary mb-1">Pengaturan Arah Putar</button>
        <button class="btn btn-primary mb-1">Monitoring Vibration</button>
        <button class="btn btn-primary mb-1">Monitoring Arus dan Tegangan</button> -->
      </form>
    </div>
  </div>
</div>
<?php
include('../component/footer.inc.php');
if (isset($_POST["start"])) {
  if ($user_praktikum == 1) {
    $ihir = $urutan_skrg['no_antrian'];
    if ($urutan_skrg['id_user'] == $_SESSION['id']) {
      header("location: praktikum.php?prak_id=" . $_GET["prak_id"]);
      exit();
    } else {
      echo "<script>Swal.fire({
      icon: 'error',
      title: 'Silahkan Tunggu',
      text: 'Sekarang antrian ke-$ihir.'})</script>";
    }
  } else if ($user_praktikum == null) {
    $no_antrian = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM antrian WHERE sudah_prak = 1"));
    $urutan_user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM antrian WHERE id_user='" . $_SESSION['id'] . "'"));
    if ($no_antrian == $urutan_user['no_antrian']) {
      header("location: praktikum.php?prak_id=" . $_GET["prak_id"]);
      exit();
    } else {
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Silahkan Tunggu',
        text: 'Anda bukan urutan ke-$no_antrian.'})</script>";
    }
  }
}
if (isset($_POST["antrian"])) {
  addToWaitingList($_SESSION);
}
?>