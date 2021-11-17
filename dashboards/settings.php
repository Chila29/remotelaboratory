<?php
$hal = "dashboard";
include('../component/head.inc.php');
include('../component/navbardash.inc.php');
include('../component/connectdb.inc.php');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item">Akun</li>
    <li class="breadcrumb-item active" aria-current="page">Pengaturan Akun</li>
  </ol>
</div>
<div class="card">
  <div class="card-header py-3 flex-row align-items-center justify-content-between">
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="formGroupExampleInput2">Profile Photo</label>
        <div class="custom-file">
          <input type="file" id="profilePic" name="img">
          <button class="btn btn-primary mb-3 mt-3" name="upload">Upload</button>
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="formGroupExampleInput">Email</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Password</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password">
      </div>
      <button class="btn btn-primary" name="submit" id="submit">Confirm</button>
    </form>
  </div>
</div>
<?php
include('../component/footer.inc.php');
if (isset($_POST["submit"])) {
  ChangePasswordEmail($_POST);
}
if (isset($_POST["upload"])) {
  uploadFoto($_FILES, $_SESSION["id"]);
}
?>