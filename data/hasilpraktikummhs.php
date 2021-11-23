<?php
$halam = "prak";
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
$conn = mysqli_connect("localhost", "root", "", "remotlab");
$result = mysqli_query($conn, "SELECT * FROM hasilpraktikum");
$users = mysqli_query($conn, "SELECT * FROM user WHERE user_id= " . $_SESSION["id"]);
$row = mysqli_fetch_assoc($users);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Starting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item">Hasil Praktikum</li>
                <li class="breadcrumb-item active">Starting</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Praktikum Kontrol Gerak</h6>
                                        <h5>Nama : <?= $_SESSION["name"]; ?> </h5>
                                        <h5>NRP : <?= $row["nrp"]; ?></h5>
                                        <!-- Table with stripped rows -->
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Tabel Hasil Praktikum</h5>

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Timestamp</th>
                                                            <th scope="col">Vin</th>
                                                            <th scope="col">Vout</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-primary">
                                                            <th scope="row">---</th>
                                                            <td>---</td>
                                                            <td>---</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
</main>
<?php
include('../component/footer.inc.php');
?>