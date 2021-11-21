<?php 
    session_start();
    include('../component/connectdb.inc.php');

    mysqli_query($conn, "delete from antrian where id_antrian = '$_GET[id_antrian]' ");
    header('location:../dashboards/antrian.php?hapusAntrian=success');

?>