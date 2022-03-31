<?php
require "header.php";
?>

<body style="background: #e9ecef;">
	<div class="login-box" style="margin: 80px 0px 100px 450px; width: 450px;">
    <div class="login-logo">
      <div class="row">
        <div class="col-3" style="padding-left: 25px;">
          <img src="../dist/img/icon.png" style="width : 95px;">
        </div>
        <div class="col-9" style="-webkit-flex: 0 0 65%;">
          <a><b>Pendaftaran</b><br>PKBM Sanggar Puri</a>
        </div>
      </div>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="alert alert-info">
          <p>Apabila Anda telah melakukan pembayaran silahkan konfirmasi <a href="https://api.whatsapp.com/send?phone=6281310765403"><strong>disini</strong></a> dengan mengirimkan bukti transaksi</p>
        </div>
        <p class="login-box-msg"><b>Akun anda belum aktif</b><br>Silahkan Scan QR Code di bawah ini atau klik pada gambar QR Code untuk melakukan pembayaran atau Anda dapat langsung membayar di PKBM Sanggar Puri</p>
        <form action="" method="post">
          <div class="form-group">
            <div class="input-group mb-3">
            <a href="https://api.whatsapp.com/send?phone=6281310765403" target="_blank"><img src="whatsapp.jpg" alt="#" style="width: 250px; margin-left: 85px;"></a>
            </div>
          </div>
        <a href="login.php" class="btn btn-primary btn-block mt-4">Kembali ke Halaman Login</a>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
<!-- /.login-box -->
</body>
</html>