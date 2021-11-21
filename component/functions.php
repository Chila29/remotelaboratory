<?php
require('connectdb.inc.php');
function tampilFoto($id)
{
    global $conn;
    // $conn = mysqli_connect("localhost","root","","remotlab"); 
    $sql = "SELECT * from tb_gambar WHERE user_id = " . $id;
    $db = mysqli_query($conn, $sql) or die("Query error : " . mysqli_error($conn));
    $result = mysqli_fetch_array($db);
    return 'data:image/jpeg;base64,' . base64_encode($result['gambar']) . '';
}
function uploadFoto($file, $id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tb_gambar WHERE user_id= " . $id);
    if (!isset($file['img']['tmp_name'])) {
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    } else {
        $file_name = $file['img']['name'];
        $file_size = $file['img']['size'];
        $file_type = $file['img']['type'];
        if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png')) {
            $image   = addslashes(file_get_contents($file['img']['tmp_name']));
            if (mysqli_num_rows($query) == 0) {
                mysqli_query($conn, "insert into tb_gambar (gambar,nama_gambar,tipe_gambar,ukuran_gambar,user_id) values ('$image','$file_name','$file_type','$file_size','$id')");
            } else {
                mysqli_query($conn, "UPDATE tb_gambar SET gambar= '" . $image . "' ,nama_gambar = '" . $file_name . "' ,ukuran_gambar = '" . $file_size . "' WHERE user_id = " . $id);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
function ChangePasswordEmail($post)
{
    global $conn;
    $newEmail = $post["email"];
    $newPassword = $post["password"];
    $sql = "UPDATE user SET email='" . $newEmail . "',password='" . $newPassword . "' WHERE nama ='" . $_SESSION["name"] . "'";
    if ($newEmail != "" or $newPassword != "") {
        mysqli_query($conn, $sql);
        echo '<script type="text/javascript"> alert("Data Berhasil diubah"); </script>';
    } else {
        echo '<script type="text/javascript"> alert("Harap isi kolom email atau password"); </script>';
    }
}
function cekFoto($id)
{
    global $conn;
    $sql = "SELECT * from tb_gambar WHERE user_id = " . $id;
    $query = mysqli_query($conn, $sql);
    return (mysqli_num_rows($query) > 0);
}
function updateStatusPrakMahasiswa($stat, $id)
{
    global $conn;
    $sql = "UPDATE user SET status_prak=$stat WHERE user_id=" . $id;
    mysqli_query($conn, $sql);
}
function cekPrak($id)
{
    global $conn;
    $sql = "SELECT status_code FROM praktikum WHERE id_prak=" . $id;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["status_code"];
}
function sendVolt($post)
{
    global $conn;
    $volt = $post['voltase'];
    $sql = 'INSERT INTO volt(volt) VALUES("' . $volt . '")';
    mysqli_query($conn, $sql);
}
function cekStatusPrak($nama)
{
    global $conn;
    $sql = "SELECT sudah_prak FROM waiting_list WHERE nama='$nama'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if ($row == null) {
        return 0;
    } else {
        // $row = mysqli_fetch_array($res);
        return $row["sudah_prak"];
    }
}
function cekWaitingList($nama)
{
    global $conn;
    $sql = "SELECT * FROM waiting_list WHERE nama='$nama'";
    $res = mysqli_query($conn, $sql);
    return (mysqli_num_rows($res) > 0);
}
function addToWaitingList($session)
{
    global $conn;
    $sesi = $session["name"];
    $banyak_antrian = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM waiting_list"));
    $banyak_antrian = $banyak_antrian + 1;
    if (cekWaitingList($sesi) == 0) {
        $sql = "INSERT INTO waiting_list(nama,nomor_urut,sudah_prak) VALUES('$sesi','$banyak_antrian',0)";
        mysqli_query($conn, $sql);
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Berhasil terdaftar pada waiting list'})</script>";
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM waiting_list WHERE nama='$sesi'");
        $urutan = mysqli_fetch_array($sql);
        $urutan = $urutan["nomor_urut"];
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Silahkan Tunggu',
            text: 'Anda Antrian ke-$urutan.'})</script>";
    }
}
function updateWaitingList($session)
{
    global $conn;
    $sesi = $session["name"];
    $sql = "UPDATE waiting_list SET sudah_prak=1 WHERE nama='$sesi'";
    mysqli_query($conn, $sql);
}
