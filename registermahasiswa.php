<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>REGISTRASI DOSEN</title>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

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
                  <span class="d-none d-lg-block">Remote Lab</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">BUAT AKUN MAHASISWA</h5>

                  </div>

                  <form class="row g-3 needs-validation" method="POST" id="form" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Masukkan Nama Lengkap</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Masukkan Nama Lengkap!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Masukkan NRP</label>
                      <input type="text" name="nrp" class="form-control" id="yourEmail" required minlength="8">
                      <div class="invalid-feedback">Masukkan NRP dengan Benar!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Masukkan email </label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Masukkan email dengan benar!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Masukkan Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Masukkan password dengan benar!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Masukkan ulang Password</label>
                      <input type="password" name="repassword" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Masukkan password dengan benar!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="register">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah Memiliki akun? <a href="login.php">Log in</a></p>
                    </div>
                    <script>
                      $(document).ready(function() {
                        $('#form').on('submit', function(e) {
                          var username = $('#name').val();
                          var password = $('#password').val();
                          var repassword = $('#repassword').val();
                          var email = $('#email').val();
                          var nrp = $('#nrp').val();
                          if (username == '' || password == '' || repassword == '' || email == '' || nrp == '') {
                            alert('Silahkan isi kredensial terlebih dahulu!');
                            return false;
                          } else {
                            $.ajax({
                              type: "POST",
                              url: "_actions/prosesregismhs.php",
                              data: $('#form').serialize(),
                              cache: false,
                              success: function() {
                                Swal.fire({
                                  icon: 'success',
                                  title: 'Berhasil',
                                  text: 'Berhasil Registrasi Mahasiswa, Silahkan Login',
                                  footer: '<a href="login.php">Klik Disini Untuk Masuk Ke Halaman Login</a>'
                                })
                              }
                            })
                          }
                          e.preventDefault();
                        })
                      })
                    </script>
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