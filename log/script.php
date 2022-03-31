<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>

<script>
  function change(){
    var x = document.getElementById('pass').type;
    
    if (x == 'password'){
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye-slash"></i>';
    }else{
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye"></i>';
    }
  }

  function change2(){
    var x = document.getElementById('pass2').type;
    
    if (x == 'password'){
      document.getElementById('pass2').type = 'text';
      document.getElementById('mybutton2').innerHTML = '<i class="fas fa-eye-slash"></i>';
    }else{
      document.getElementById('pass2').type = 'password';
      document.getElementById('mybutton2').innerHTML = '<i class="fas fa-eye"></i>';
    }
  }

  $(function () {
    $.validator.setDefaults({
    
    });
    $('#data').validate({
      rules: {
        email: {
          required: true,
        },
        password: {
          required: true,
        },
        password2: {
          required: true,
        },
      },
      messages: {
        email: {
          required: "Harap Isi Alamat Email "
        },
        password: {
          required: "Harap Isi Password "
        },
        password2: {
          required: "Harap Isi Konfirmasi Password "
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    }); 
  });
</script>
</html>