<?php
include "header.php";
?>
<body class="hold-transition login-page">
<div class="login-box">
  <?php
  include "../alert/alert.php";
  ?>
  <!-- /.login-logo -->
  <?php
  $email  = $_GET['email'];
  $token  = $_GET['token'];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and token_ganti_password = '$token'");

  if(mysqli_num_rows($query) >=1){?>
    <div class="login-logo">
      <div class="row">
        <div class="col-3" style="padding-left: 5px;">
          <img src="../dist/img/icon.png" style="width : 95px;">
        </div>
        <div class="col-9" style="padding-left: 12px;">
          <a><b>E-Learning</b><br>PKBM Sanggar Puri</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body login-card-body" style="width: 400px;">
        <p class="login-box-msg">Silahkan Buat Password Baru untuk Akun Anda</p>
        <form id="data" action="" method="post">
          <div class="form-group">
            <label for="password">Password Baru</label>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" id="pass" placeholder="Min. 8 Karakter">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
                <div class="input-group-btn">
                    <span class="btn btn-default reveal" type="button" id="mybutton" onclick="change()">
                      <i class="fas fa-eye"></i>
                    </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password">Konfirmasi Password</label>
            <div class="input-group mb-3">
              <input type="password" name="password2" class="form-control" id="pass2" placeholder="Masukkan Kembali Password Anda">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              <div class="input-group-btn">
                <span class="btn btn-default reveal" type="button" id="mybutton2" onclick="change2()">
                  <i class="fas fa-eye"></i>
                </span>
              </div>
          </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Reset password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
        </p>
      </div>
    </div>
  <?php
  }else{?>
    <div class="alert alert-danger alert-dismissible">
      <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
      <p>Link tidak valid dan token tidak sesuai. Silahkan <a href='login.php'>login</a></p>
    </div>
  <?php
  }
  ?>
</div>
</body>
<!-- /.login-box -->
<?php
include "script.php";
?>