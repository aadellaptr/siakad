<?php
$page = "Pengaturan Akun";
include "../header.php";
include "proses.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <?php
        include "../../alert/alert.php";
        ?>
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Pengaturan Akun</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                      <li class="breadcrumb-item active">Pengaturan Akun</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
              </div>
              <!-- /.card-header -->
              <?php
                $id = @$_GET['id'];
                $sql_admin = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'") or die (mysqli_error($conn));
                $data = mysqli_fetch_array($sql_admin);
              ?>
              <div class="card-body" style="margin: 0px 200px;">  
                <div class="form-group">
                  <label for="oldpass">Password Lama</label>
                  <div class="input-group">
                    <input type="password" name="oldpass" class="form-control" id="oldpass">
                    <span class="input-group-btn">
                        <button class="btn btn-default reveal" type="button" id="mybutton3" onclick="change3()">
                          <i class="fas fa-eye"></i>
                        </button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" id="pass">
                    <span class="input-group-btn">
                        <button class="btn btn-default reveal" type="button" id="mybutton" onclick="change()">
                          <i class="fas fa-eye"></i>
                        </button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <div class="input-group">
                    <input type="password" name="password2" class="form-control" id="pass2">
                    <span class="input-group-btn">
                        <button class="btn btn-default reveal" type="button" id="mybutton2" onclick="change2()">
                          <i class="fas fa-eye"></i>
                        </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="data.php?id=<?php echo $_SESSION['user']['id_user']?>" class="btn btn-secondary mb-5">Kembali</a>
            <input type="submit" class="btn btn-success float-right mb-5" name="ubah" value="Simpan">
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<?php
include "../footer.php";
?>

<script>
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

  function change3(){
    var x = document.getElementById('oldpass').type;
    
    if (x == 'password'){
      document.getElementById('oldpass').type = 'text';
      document.getElementById('mybutton3').innerHTML = '<i class="fas fa-eye-slash"></i>';
    }else{
      document.getElementById('oldpass').type = 'password';
      document.getElementById('mybutton3').innerHTML = '<i class="fas fa-eye"></i>';
    }
  }
</script>