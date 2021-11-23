<!DOCTYPE html>
<html lang="en">
<?php session_start();
ob_start();
include('component/connectdb.inc.php'); ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <!-- Favicons -->
  <link href="assets/img/faivon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Remote Laboratory <h6>Praktikum Online</h6></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
                    <p class="text-center small">Masukkan NIP/NRP/NPP dan password</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">NIP/NRP/NPP</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nrp" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your NRP</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Belum punya akun? Buat akun<a href="registerdosen.php"> DOSEN</a>/<a href="registermahasiswa.php">MAHASISWA</a></p>
                    </div>
                    <?php
                    if ($_SESSION) {
                      if ($_SESSION["hak"] == "admin") {
                        header("location: dashboards/admin.php");
                      } else if ($_SESSION["hak"] == "dosen") {
                        header("location: dashboards/dosen.php");
                      } else {
                        header("location: dashboards/mahasiswa.php");
                      }
                    }
                    if (isset($_POST["login"])) {
                      $nrp = $_POST["nrp"];
                      $password = $_POST["password"];
                      // $hak = $_POST["hak"];
                      $query = mysqli_query($conn, "SELECT * FROM user WHERE nrp='" . $nrp . "' AND password='" . $password . "'")
                        or die('Error: ' . mysqli_connect_error());
                      $name = mysqli_query($conn, "SELECT * FROM user WHERE nrp='" . $nrp . "'")
                        or die('Error: ' . mysqli_connect_error());
                      $name = mysqli_fetch_array($name);
                      if (mysqli_num_rows($query) > 0) {
                        global $row;
                        $row = mysqli_fetch_assoc($query);
                        if ($row["hak"] == "admin") {
                          $_SESSION["name"] = $name['nama'];
                          $_SESSION["hak"] = "admin";
                          $_SESSION["id"] = $row["user_id"];
                          $_SESSION["nrp"] = $row["nrp"];
                          header("location: dashboards/admin.php");
                        } else if ($row["hak"] == "dosen") {
                          $_SESSION["name"] = $name['nama'];
                          $_SESSION["hak"] = "dosen";
                          $_SESSION["id"] = $row["user_id"];
                          $_SESSION["nrp"] = $row["nrp"];
                          header("location: dashboards/dosen.php");
                        } else if ($row["hak"] == "mahasiswa") {
                          $_SESSION["name"] = $name['nama'];
                          $_SESSION["hak"] = "mahasiswa";
                          $_SESSION["id"] = $row["user_id"];
                          $_SESSION["nrp"] = $row["nrp"];
                          header("location: dashboards/mahasiswa.php");
                        } else {
                          echo "Username atau password salah";
                        }
                      } else {
                        echo "<script>alert('Username atau password salah');
                            </script>";
                      }
                    }
                    ?>
                  </form>
                </div>
              </div>

              <div class="credits">
                Developed by <strong><span>Team Remote Lab</strong></span>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>