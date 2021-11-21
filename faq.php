<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../img/logo/logo3.png" rel="icon">
    <title>Remote Laboratory</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Sweet Alert -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand mt-2 ml-5" href="index.php"><img src="assets/img/arrow.png" alt="" width="30" height="30" /></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h2 class="mt-3 ml-1">FAQ's</h2>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="accordion border border-primary col-lg-7 mt-5 mb-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqsatu" aria-expanded="false">
                        <h3>Apa itu Remote Lab?</h3>
                    </button>
                </h2>
                <div id="faqsatu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Remote Laboratory adalah laboratorium jarak jauh, dimana penggunaan jaringan internet digunakan untuk melakukan eksperimen praktikum di suatu laboratorium, dan mahasiswa dapat melakukan eksperimen/praktikum motor 3 fasa dari lokasi yang berbeda dengan bantuan jaringan internet. Pada praktikum ini mahasiswa akan mengoperasikan motor induksi 3 fasa melalui VFD (Variable Speed Drive) atau inverter</div>
                </div>
            </div>
        </div>
        <div class="accordion border border-primary col-lg-7 mt-5 mb-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqdua" aria-expanded="false">
                        <h3>Bagaimana cara memakai Remote Lab?</h3>
                    </button>
                </h2>
                <div id="faqdua" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Untuk menggunakan remote lab, user harus terhubung dengan internet, kemudian user harus memiliki akun yang telah terdaftar pada website. Setelah itu user akan dapat melakukan akses pada remote lab. Namun, pada remote lab ini user harus melakukan praktikum secara bergantian dengan sistem antrian.</div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> - developed by
                    <b><a>Team Remote Laboratory</a></b>
                </span>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</body>

</html>