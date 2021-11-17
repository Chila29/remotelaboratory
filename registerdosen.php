<?php
 $hal = "about";
 $name = "register";
 include('component/connectdb.inc.php');
 include('component/head.inc.php');
 include('layouts/navbarback.inc.php'); 
 include('layouts/registerdosen.inc.php'); 
 include('component/footer.inc.php');
//  if(isset($_POST["register"])){
//     $nama = strtolower($_POST["name"]);
//     $nrp = $_POST["nrp"];
//     $email = strtolower($_POST["email"]);
//     $password = $_POST["password"];
//     $repassword = $_POST["repassword"];
//     $sql="SELECT * FROM user WHERE nama='$nama'";
//     $hasil = mysqli_query($conn,$sql);
//     $num = mysqli_num_rows($hasil);
//     if($num == 0){
//         if($password == $repassword){
//           $sql = "INSERT INTO user(nama,nrp,email,password,hak) VALUES('$nama','$nrp','$email','$password','dosen')";
//           $hasil = mysqli_query($conn,$sql);
//           if($hasil){
//               $showAlert = true;
//           }   
//         }else{
//             $Error = "Password tidak sama";
//         }
//     }
//     if($num > 0){
//         $exists = "Akun sudah terdaftar";
//     }
// }
?>