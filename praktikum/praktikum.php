<?php
$hal = "dashboard";
include('../component/connectdb.inc.php');
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
include_once('../functions.php');
updateStatusPrakMahasiswa(1, $_SESSION["id"]);
$sql = "UPDATE praktikum SET status_code='1' WHERE id_prak='1'";
mysqli_query($conn, $sql);
// $users = mysqli_query($conn, "SELECT * FROM user WHERE hak='mahasiswa'");
?>
<div class="mb-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-center">Praktikum</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Praktikum</li>
            <li class="breadcrumb-item active" aria-current="page">Motor 3 Fasa</li>
        </ol>
    </div>
    <h5 class="text-center">Praktikum Motor 3 Fasa</h5>
    <h5 class="text-center mb-4">Arif Mustofa</h5>
    <!-- <h1>WIRING DIAGRAM INTERAKTIF GAERO</h1> -->
    <div class="row ml-2 justify-content-center align-item-center text-center">
        <div id="chartContainer" style="height: 250px; width: 50%;"></div>
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
                        title: "Frekuensi",
                    },
                    axisX: {
                        title: "Waktu",
                    }
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
        <div class="col-lg-6">
            <h4>Live Stream</h4>
            <iframe width="320" height="240" src="https://www.youtube.com/embed/59HBoIXzX_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </video>
        </div>
        <div class="col-lg-6 mt-2">
            <div class="row">
                <div class="col-lg-5">
                    <h4>Tombol Start/Stop</h4>
                    <form action="" method="POST" id="start">
                        <div class="row">
                            <h5 for="forward">Forward Start</h5>
                            <div class="col-lg-12">
                                <button class="btn btn-primary forward text-center" value="1" name="forward" id="forward"> Forward Start</button>
                            </div>
                            <h5 for="reverse">Reverse Start</h5>
                            <button class="btn btn-primary reverse" value="1" name="reverse" id="reverse">Reverse Start</button>
                            <h5 for="stop">Stop</h5>
                            <button class="btn btn-primary stop" value="0" name="stop" id="stop">Stop</button>
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
                                                    title: 'START FORWARD!!!'
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
                                                    title: 'START REVERSE!!!'
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
                                                    title: 'STOP!!!'
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
                <div class="col-lg-7">
                    <h4>Knob Frekuensi (Hz)</h4>
                    <form method="POST" id="volt">
                        <input type="text" value="3" class="dial" name="hertz" id="hert">
                        <script>
                            $('.dial').knob({
                                'min': 0,
                                'max': 50,
                                'step': 0.1,
                                'width': 200,
                                'height': 200,
                                'displayInput': true,
                                'fgColor': "#FF0000",
                                'angleArc': 180,
                                'angleOffset': -90,
                            });
                        </script>
                        <br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Ganti Frekuensi" id="ganti">
                        <script>
                            $(document).ready(function() {
                                $('#volt').on('submit', function(e) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../_actions/sendHertz.php",
                                        data: $('#volt').serialize(),
                                        success: function() {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });

                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Frekuensi diubah'
                                            })
                                        }
                                    })
                                    e.preventDefault();
                                })
                            })
                        </script>
                    </form>
                </div>
            </div>
        </div>
        <form method="POST">
            <button class="btn btn-danger mb-1 mt-5" name="selesai">Selesai</button>
        </form>
    </div>
</div>
<?php
include('../component/footer.inc.php');
if (isset($_POST['selesai'])) {
    $sql = "UPDATE praktikum SET status_code='0' WHERE id_prak='1'";
    mysqli_query($conn, $sql);
    updateStatusPrakMahasiswa(0, $_SESSION["id"]);

    $getAntrian = mysqli_query($conn, "select id_user from antrian where id_user = '" . $_SESSION['id'] . "' ");
    $row = mysqli_num_rows($getAntrian);

    if ($row == 1) {
        mysqli_query($conn, "delete from antrian where id_user = '" . $_SESSION['id'] . "' ");
        header("location: ../dashboards/mahasiswa.php");
    } else {
        header("location: MulaiPraktikum.php?prak_id=" . $_GET["prak_id"]);
    }
    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Praktikum sudah selesai. Silahkan hubungi dosen untuk lebih lanjutnya'})</script>";
}

?>