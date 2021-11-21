<?php
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Mulai Praktikum</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Mulai Praktikum</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="text-center">
    <!-- <img src="img/think.svg" style="max-height: 90px"> -->
    <div class="pt-4 pb-4">
      <h5 class="card-title text-center pb-0 fs-4">Praktikum Motor Induksi 3 Fasa</h5>
      <h4 class="card-title text-center pb-0 fs-4">Kontrol Gerak</h4>
      <p class="text-center big">Arif Mustofa</p>
    </div>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
          Mulai Praktikum
        </button>
        <form method="POST" id="form">
          <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Apakah anda sudah membaca Langkah Pengerjaan dengan seksama? jika sudah, silahkan melakukan Praktikum
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="batal">BATAL</button>
                  <button type="submit" class="btn btn-primary" name="start"> YA</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main><!-- End #main -->
<?php
include('../component/footer.inc.php');
if (isset($_POST["start"])) {
  header("location: praktikum.php?prak_id=" . $_GET["prak_id"]);
  exit();
}
?>