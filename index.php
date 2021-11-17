<?php
 $hal = "about";
 session_start();
 include('component/head.inc.php'); 
 include('component/navbar.inc.php'); 
 include('layouts/abt.inc.php'); 
 include('component/footer.inc.php');
 if($_SESSION){
    if($_SESSION["hak"] == "1"){
        header("location: dashboards/Dashboard.php");
    }else if($_SESSION["hak"] == "2"){
        header("location: dashboards/dosen.php");
    }else{
        header("location: dashboards/mahasiswa.php");
    }
};
?>