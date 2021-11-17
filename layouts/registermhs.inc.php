<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card rounded border-primary my-5">
                <div class="card-body shadow p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Daftar</h5>
                    <form method="POST" id="form">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Username123" name="name">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nrp" placeholder="10311xxxxxx" name="nrp">
                            <label for="floatingInput">NRP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="repassword" placeholder="Password" name="repassword">
                            <label for="floatingPassword">Re-type Password</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold regis" type="submit" name="register" id="register">Daftar</button>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#form').on('submit', function(e) {
                                    var password = $('#password').val();
                                    var repassword = $('#repassword').val();
                                    if(password != repassword) {
                                        e.preventDefault();
                                        alert('Password tidak sama');
                                    }else{
                                        $.ajax({
                                        type: "POST",
                                        url: "_actions/prosesregismhs.php",
                                        data: $('#form').serialize(),
                                        cache: false,
                                        success: function() {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });

                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Registrasi Mahasiswa Berhasil'
                                            })
                                        }
                                    })
                                    }
                                    e.preventDefault();
                                })
                            })
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>