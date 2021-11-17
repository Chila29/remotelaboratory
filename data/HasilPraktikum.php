<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
?>
<div class="container">
    <div class="row">
        <div class="col">
                <a class="btn btn-primary btn-lg btn-block" href="datadosen.php">Starting</a>
                <a class="btn btn-primary btn-lg btn-block" href="Data_HasilPraktikum.php">Breaking</a>
                <a class="btn btn-primary btn-lg btn-block" href="Data_HasilPraktikum.php">Pengaturan Kecepatan</a>
                <a class="btn btn-primary btn-lg btn-block" href="Data_HasilPraktikum.php">Pengaturan Arah Putar</a>
                <a class="btn btn-primary btn-lg btn-block" href="Data_HasilPraktikum.php">Monitoring Vibration</a>
                <a class="btn btn-primary btn-lg btn-block" href="Data_HasilPraktikum.php">Monitoring Arus dan Tegangan</a>
        </div>
    </div>
</div>
<?php   
include('../component/footer.inc.php');
?>