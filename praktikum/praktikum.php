<?php
include('../component/header.inc.php');
// include('../component/navbar.php');
// include('../component/sidebar.php');
updateStatusPrakMahasiswa(1, $_SESSION["id"]);
$sql = "UPDATE praktikum SET status_code='1' WHERE id_prak='1'";
mysqli_query($conn, $sql);
?>
<!-- <div style="margin-top:60px; padding:20px 30px"> -->
<div class="pagetitle mt-3 px-3">
    <h1>Praktikum</h1>
    <nav>
        <div class="row d-flex justify-content-between">
            <ol class="breadcrumb col-lg-3 ml-3">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item"><a href="mulaipraktikum.php">Mulai Praktikum</a></li>
                <li class="breadcrumb-item active">Praktikum</li>
            </ol>
            <div class="col-lg-3">
            </div>
            <div class="col-lg-3 text-end">
                <div class="card">
                    <div class="card-body">
                        <div id="DigitalCLOCK" class="clock" onload="showTime();"></div>
                        <script>
                            function showTime() {
                                var date = new Date();
                                var h = date.getHours();
                                var m = date.getMinutes();
                                var s = date.getSeconds();
                                var session = "AM";

                                if (h == 0) {
                                    h = 12;
                                }

                                if (h > 12) {
                                    h = h - 12;
                                    session = "PM";
                                }

                                h = (h < 10) ? "0" + h : h;
                                m = (m < 10) ? "0" + m : m;
                                s = (s < 10) ? "0" + s : s;

                                var time = h + ":" + m + ":" + s + " " + session;
                                document.getElementById("DigitalCLOCK").innerText = time;
                                document.getElementById("DigitalCLOCK").textContent = time;

                                setTimeout(showTime, 1000);

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- <h1>WIRING DIAGRAM INTERAKTIF GAERO</h1> -->
<div class="row ml-2 justify-content-center align-item-center text-center">
    <div class="col-lg-6">
        <div class="card px-2" style="margin-left: 20px; margin-right:10px;">
            <div class="card-body">
                <div class="card-title">Grafik Monitor RPM</div>
                <div id="chartContainer" style="height: 250px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Monitor Kecepatan Motor",
                },
                data: [{
                    type: "line",
                    dataPoints: [],
                }],
                axisY: {
                    title: "RPM",
                    titleFontSize: 20,
                    minimum: 0,
                },
                axisX: {
                    title: "Waktu (s)",
                    fontSize: 5,
                    titleFontSize: 20,
                    minimum: 0,
                },
            });

            $.getJSON("../data/service.php", function(data) {
                $.each((data), function(key, value) {
                    chart.options.data[0].dataPoints.push({
                        label: value[0],
                        y: parseInt(value[1])
                    });
                });
                chart.render();
                updateChart();
            });

            function updateChart() {
                $.getJSON("../data/service.php", function(data) {
                    chart.options.data[0].dataPoints = [];
                    $.each((data), function(key, value) {
                        chart.options.data[0].dataPoints.push({
                            label: value[0],
                            y: parseInt(value[1])
                        });
                    });

                    chart.render();
                });
            }

            setInterval(function() {
                updateChart()
            }, 1000);
        }
    </script>
    <div class="col-lg-6">
        <div class="card" style="margin-left: 20px; margin-right:10px;">
            <div class="card-body">
                <h4 class="card-title">Tabel Monitoring</h4>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="mauexport">
                        <thead class="thead-light">
                            <tr>
                                <th>Frekuensi</th>
                                <th>Kecepatan</th>
                                <th>Kecepatan</th>
                                <th>Slip</th>
                                <!-- <th>Praktikum</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kecepatan</td>
                                <td>Kecepatan</td>
                                <td>Slip</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card" style="margin-left: 20px; margin-right:10px;">
            <div class="card-body">
                <h4 class="card-title">Live Stream</h4>
                <iframe width="320" height="240" src="https://www.youtube.com/embed/59HBoIXzX_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </video>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-2">
        <div class="row">
            <div class="col-lg-5">
                <div class="card" style="margin-left: 20px; margin-right:10px;">
                    <div class="card-body">
                        <h4 class="card-title">Tombol Start/Stop</h4>
                        <form method="POST" id="start">
                            <div class="row">
                                <h5 for="forward">Forward Start</h5>
                                <div class="col-lg-12 mb-2">
                                    <button class="btn btn-primary forward text-center" value="1" name="forward" id="forward"> Forward Start</button>
                                </div>
                                <h5 for="reverse">Reverse Start</h5>
                                <div class="col lg-12 mb-2">
                                    <button class="btn btn-primary reverse text-center" value="1" name="reverse" id="reverse">Reverse Start</button>
                                </div>
                                <h5 for="stop">Stop</h5>
                                <div class="col lg-12 mb-2">
                                    <button class="btn btn-primary stop text-center" value="0" name="stop" id="stop">Stop</button>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('.forward').click(function(e) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../_actions/sendStartForward.php",
                                                data: {
                                                    start: $(".forward").attr('value')
                                                },
                                                success: function() {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000
                                                    });

                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: 'Forward Start'
                                                    })
                                                }
                                            })
                                            e.preventDefault();
                                        })
                                        $('.reverse').click(function(e) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../_actions/sendStartReverse.php",
                                                data: {
                                                    start: $(".reverse").attr('value')
                                                },
                                                success: function() {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000
                                                    });

                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: 'Reverse Start'
                                                    })
                                                }
                                            })
                                            e.preventDefault();
                                        })
                                        $('.stop').click(function(e) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../_actions/sendStop.php",
                                                data: {
                                                    start: $(".stop").attr('value')
                                                },
                                                success: function() {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000
                                                    });

                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: 'Motor akan berhenti'
                                                    })
                                                }
                                            })
                                            e.preventDefault();
                                        })
                                    })
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card" style="margin-left: 20px; margin-right:10px;">
                    <div class="card-body">
                        <h4 class="card-title"><i class="bi bi-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Arahkan mouse pada bagian tengah knob, jika ingin menambah frekuensi drag ke atas, drag ke bawah jika ingin mengurangi frekuensi"></i> Knob Frekuensi (Hz)</h4>
                        <div class="row">
                            <div class="knob" id="knob1"></div>
                        </div>
                        <button class="btn btn-primary hertz" name="hertz" id="hertz" style="margin-top: 70%;">Ganti Frekuensi</button>
                        <script>
                            let dial1 = new Knob({
                                id: "knob1",
                                size: "xlarge",
                                type: "Hippy",
                                lowVal: 0,
                                highVal: 50,
                                lblTxtColor: "red"
                            });
                            $(document).ready(function() {
                                $('.hertz').click(function(e) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../_actions/sendHertz.php",
                                        data: {
                                            hertz: dial1.getValue()
                                        },
                                        success: function() {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });

                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Frekuensi sedang diubah'
                                            })
                                        }
                                    })
                                    e.preventDefault();
                                })
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST">
        <button class="btn btn-danger mb-1 mt-5" name="selesai">Selesai</button>
    </form>
</div>
<!-- </div> -->
<footer id="footer" class="footer" style="margin-left: 20px;">
    <div class="copyright">
        &copy; Copyright 2021. Developed by <strong><span>Remote Lab</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">PERINGATAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin Akan Log Out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                <a href="../logout.php" type="button" class="btn btn-primary">YA</a>
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
</body>

</html>
<?php
if (isset($_POST['selesai'])) {
    $sql = "UPDATE praktikum SET status_code='0' WHERE id_prak='1'";
    mysqli_query($conn, $sql);
    updateStatusPrakMahasiswa(0, $_SESSION["id"]);

    $getAntrian = mysqli_query($conn, "select id_user from antrian where id_user = '" . $_SESSION['id'] . "' ");
    $row = mysqli_num_rows($getAntrian);

    if ($row == 1) {
        mysqli_query($conn, "delete from antrian where id_user = '" . $_SESSION['id'] . "' ");
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Praktikum sudah selesai. Silahkan hubungi dosen.'})</script>";
        header("location: ../dashboards/mahasiswa.php");
    } else {
        header("location: mulaiPraktikum.php?prak_id=" . $_GET["prak_id"]);
    }
}
?>