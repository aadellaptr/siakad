<?php
include "header.php";
?>
<body class="hold-transition login-page">
<div class="login-box">
    <?php
    include "../alert/alert.php";
    ?>
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
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="width: 400px;">
      <p class="login-box-msg">Masukkan Email Anda yang Terdaftar di PKBM Sanggar Puri.</p>
      <form id="data" action="" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="request" class="btn btn-primary btn-block">Send</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
include "script.php";
?>