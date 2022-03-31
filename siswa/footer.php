  <footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="https://adminlte.io">PKBM Sanggar Puri</a>.</strong>
  All rights reserved.
  </footer>

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- jquery-validation -->
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- Page specific script -->

  <script>
    $(function () {
      $("#admin").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
    });
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

    function pilihWali(value){
      var w = $("#wali").val();
      if(w == "Ya"){
        document.getElementById("wali_detail").hidden = false;
      }else{
        document.getElementById("wali_detail").hidden = true;
      }
    }
    
    $(function () {
      $.validator.setDefaults({
      
      });
      $('#data').validate({
        rules: {
          id_paket: {
            required: true,
          },
          nama: {
            required: true,
          },
          th_ujian: {
            required: true,
          },
          jk: {
            required: true,
          },
          kewarganegaraan: {
            required: true,
          },
          tempat_lahir: {
            required: true,
          },
          tgl_lahir: {
            required: true,
          },
          agama: {
            required: true,
          },
          jalan: {
            required: true,
          },
          kecamatan: {
            required: true,
          },
          desa: {
            required: true,
          },
          tempat_tinggal: {
            required: true,
          },
          tb: {
            required: true,
          },
          bb: {
            required: true,
          },
          jarak: {
            required: true,
          },
          transportasi: {
            required: true,
          },
          anak_ke: {
            required: true,
          },
          jml_saudara: {
            required: true,
          },
          nama_ibu: {
            required: true,
          },
          pendidikan_ibu: {
            required: true,
          },
          pekerjaan_ibu: {
            required: true,
          },
          penghasilan_ibu: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
          username: {
            required: true,
          },
          telp: {
            required: true,
          },
        },
        messages: {
          id_paket: {
            required: "Harap Pilih Paket "
          },
          nama: {
            required: "Harap Isi Nama"
          },
          th_ujian: {
            required: "Harap Pilih Tahun Ujian "
          },
          jk: {
            required: "Harap Pilih Jenis Kelamin "
          },
          kewarganegaraan: {
            required: "Harap Pilih Kewarganegaraan "
          },
          tempat_lahir: {
            required: "Harap Isi Tempat Lahir "
          },
          tgl_lahir: {
            required: "Harap Isi Tanggal Lahir "
          },
          agama: {
            required: "Harap Pilih Agama & Kepercayaan "
          },
          jalan: {
            required: "Harap Isi Alamat Jalan Domisili "
          },
          kecamatan: {
            required: "Harap Isi Kecamatan Domisili "
          },
          desa: {
            required: "Harap Isi Desa "
          },
          tempat_tinggal: {
            required: "Harap Pilih Tempat Tinggal "
          },
          tb: {
            required: "Harap Isi Tinggi Badan "
          },
          bb: {
            required: "Harap Isi Berat Badan "
          },
          jarak: {
            required: "Harap Isi Jarak Rumah  ke Sekolah"
          },
          transportasi: {
            required: "Harap Isi Moda Transportasi  ke Sekolah"
          },
          anak_ke: {
            required: "Harap Isi  Anak ke-berapa"
          },
          jml_saudara: {
            required: "Harap Isi Jumlah Saudara Kandung "
          },
          nama_ibu: {
            required: "Harap Isi Nama Ibu "
          },
          pendidikan_ibu: {
            required: "Harap Isi Pendidikan Terakhir Ibu  "
          },
          pekerjaan_ibu: {
            required: "Harap Isi Pekerjaan Ibu "
          },
          penghasilan_ibu: {
            required: "Harap Isi Penghasilan Ibu "
          },
          email: {
            required: "Harap Isi Alamat Email ",
            email: "Harap Isi dengan Alamat Email yang Valid"
          },
          password: {
            required: "Harap Isi Password ",
            minlength: "Password  Setidaknya Harus Terdiri dari 8 Karakter atau Lebih"
          },
          username: {
            required: "Harap Isi Username",
          },
          telp: {
            required: "Harap Isi No Hp",
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

</body>
</html>