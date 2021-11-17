document.querySelector(".regis").addEventListener('click',function(){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 30000
  });
    Toast.fire({
        type: 'success',
        title: 'Registrasi Berhasil!'
      })
});