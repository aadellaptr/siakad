<?php
require "header.php";
?>

<body class="hold-transition login-page">
<div class="login-box">
 <?php
  include "../alert/alert.php";

  // echo password_hash("admin1",PASSWORD_DEFAULT);
  // echo "<br>";
  // echo password_hash("andika123",PASSWORD_DEFAULT);
  // echo "<br>";
  // echo password_hash("seokhon123",PASSWORD_DEFAULT);
  ?>
  <div class="login-logo">
    <div class="row">
      <div class="col-3" style="padding-left: 5px;">
        <img src="../dist/img/icon.png" style="width : 95px;">
      </div>
      <div class="col-9" style="padding-left: 12px;">
        <a><b>Login</b><br>PKBM Sanggar Puri</a>
      </div>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="width: 400px;">
      <form id="data" action="" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" id="pass" placeholder="Masukkan Password">
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
        <button type="submit" name="login" class="btn btn-primary btn-block mt-4">Login</button>
      </form>
      <p class="mt-3 mb-1">
        <a href="lupa-password.php">Lupa Password?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>


<?php
include "script.php";
?>