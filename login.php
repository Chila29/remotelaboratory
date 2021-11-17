<?php
session_start();
$hal = "about";
$name = "login";
include('component/connectdb.inc.php');
include('component/head.inc.php');
include('layouts/navbarback.inc.php');
include('layouts/loginres.inc.php');
if($_SESSION){
    if($_SESSION["hak"] == "admin"){
        header("location: dashboards/Dashboard.php");
    }else if($_SESSION["hak"] == "dosen"){
        header("location: dashboards/dosen.php");
    }else{
        header("location: dashboards/mahasiswa.php");
    }
}
if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $hak = $_POST["hak"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE nama='" . $name . "' AND password='" . $password . "'")
        or die('Error: ' . mysqli_connect_error());
    if (mysqli_num_rows($query) > 0) {
        global $row;
        $row = mysqli_fetch_assoc($query);
        if($row["hak"] == "admin"){
            $_SESSION["name"] = $name;
            $_SESSION["hak"] = "admin";
            $_SESSION["id"] = $row["user_id"];
            header("location: dashboards/Dashboard.php");
        }else if($row["hak"] == "dosen"){
            $_SESSION["name"] = $name;
            $_SESSION["hak"] = "dosen";
            $_SESSION["id"] = $row["user_id"];
            header("location: dashboards/dosen.php");
        }else if($row["hak"] == "mahasiswa"){
            $_SESSION["name"] = $name;
            $_SESSION["hak"] = "mahasiswa";
            $_SESSION["id"] = $row["user_id"];
            header("location: dashboards/mahasiswa.php");
        }else{
            echo "Username atau password salah";
        }
    } else {
        echo "Silahkan registrasi terlebih dahulu";
    }
}
include('component/footer.inc.php');
?>