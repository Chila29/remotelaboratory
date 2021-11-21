<?php
include('../component/header.inc.php');
include('../component/navbar.php');
include('../component/sidebar.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pengaturan Akun</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Pengaturan Akun</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header py-12 flex-row align-items-center justify-content-between">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="formGroupExampleInput2">Ganti Foto Profil</label>
                <div class="custom-file">
                  <input type="file" id="profilePic" name="img">
                  <button class="btn btn-primary mb-3 mt-3" name="upload"><i class="bi bi-cloud-upload-fill"></i> Upload</button>
                </div>
              </div>
              <br>
              <div class="form-group mb-4">
                <label for="formGroupExampleInput">Ganti Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email">
              </div>
              <div class="form-group mb-4">
                <label for="formGroupExampleInput2">Ganti Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password">
              </div>
              <button class="btn btn-primary mt-4" name="submit" id="submit">Confirm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</main><!-- End #main -->
<?php
include('../component/footer.inc.php');
if (isset($_POST["submit"])) {
  ChangePasswordEmail($_POST);
}
if (isset($_POST["upload"])) {
  uploadFoto($_FILES, $_SESSION["id"]);
}
?>