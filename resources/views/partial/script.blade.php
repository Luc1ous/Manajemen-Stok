<script src="../../template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../template/dist/assets/js/bootstrap.bundle.min.js"></script>
<script src="../../template/dist/assets/js/mazer.js"></script>
<script src="../../js/script.js"></script>

<script>
  $('.logout').click(function (e) {
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
      title: "Konfirmasi",
      text: "Apakah Anda yakin ingin logout ?",
      icon: 'question',
      showCancelButton: true,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "GET",
          url: "{{ route('logout') }}",
          data : {
            "_token" : token
          },
          success: function (response) {
            Swal.fire({
              title: response.message,
              text: 'Anda akan diarahkan ke halaman login dalam 2 detik',
              timer: 2000,
              icon: 'success',
            }).then(function(){
              window.location.href = '/login'
            })
          },
          error:function(response){
            console.log(response);
          }
        });
      } else {
        Swal.fire('Tidak jadi logout')
      }
    })
  })
</script>