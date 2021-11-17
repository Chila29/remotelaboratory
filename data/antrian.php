<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
include('../component/connectdb.inc.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                <?php 
                    if(isset($_GET['setAntrian'])){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" style="color:green !important" role="alert">
                        <strong>Nomer Antrian Berhasil Didapat</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    }
                    if(isset($_GET['hapusAntrian'])){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" style="color:maroon !important" role="alert">
                        <strong>Nomer Antrian Berhasil Dihapus</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php                        
                    }

                    if($_SESSION["hak"]=='mahasiswa'){
                        $cek = mysqli_query($conn, "select id_antrian from antrian where id_user = '".$_SESSION['id']."' order by id_antrian asc ");
                        $dataCek = mysqli_num_rows($cek);

                        if($dataCek==0){
                            echo "<a href='../_actions/setAntrian.php?id_user=".$_SESSION['id']."' class='btn btn-primary' style='color:white'><span class='fa fa-ticket-alt'></span> Ambil No Antrian</a>";
                        }
                    }
                ?>
                <br>
                <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No Antrian</th>
                                    <th>Mahasiswa</th>
                                    <th>Waktu Submit Antrian</th>
                                    <?php 
                                        if($_SESSION["hak"]=='admin'){
                                            echo "<th>Opsi</th>";
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = mysqli_query($conn, "select a.id_antrian,a.no_antrian,u.nama,a.waktu_antrian from antrian a join user u on a.id_user = u.user_id");
                                    while($data=mysqli_fetch_assoc($sql)){
                                        ?>
                                    <tr>
                                        <td><?= $data['no_antrian'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= date('d F Y, H:i', strtotime($data['waktu_antrian'])) ?></td>
                                        <?php 
                                            if($_SESSION["hak"]=='admin'){
                                                echo "<td><a class='btn btn-danger' href='../_actions/hapusAntrian.php?id_antrian=".$data['id_antrian']."'>Hapus</a></td>";
                                            }
                                        ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   
include('../component/footer.inc.php');
?>