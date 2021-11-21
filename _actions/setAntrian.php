<?php 
    session_start();
    include('../component/connectdb.inc.php');
    $getNoAntrian = mysqli_query($conn, "select no_antrian from antrian where date(waktu_antrian) = CURDATE() order by id_antrian desc limit 1  ");
    $noAntrian = mysqli_fetch_assoc($getNoAntrian);
    if($noAntrian['no_antrian'] == null){
        $antrian = 1;
    }
    // if(count($noAntrian)==0){
    //     $antrian = 1;
    // }
    else{
        $antrian = $noAntrian['no_antrian'] + 1;
    }
    mysqli_query($conn, "insert into antrian set id_praktikum = '1', id_user = '".$_SESSION['id']."', no_antrian = '$antrian', waktu_antrian = '".date('Y-m-d H:i:s')."' ");
    header('location:../dashboards/antrian.php?setAntrian=success');
