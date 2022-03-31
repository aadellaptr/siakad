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
                  <h3 class="card-title">Pengaturan Akun</h3>
                </div>
                <!-- /.card-header -->
                <?php
                  $id = @$_GET['id'];
                  $sql_admin = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'") or die (mysqli_error($conn));
                  $data = mysqli_fetch_array($sql_admin);
                ?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar">
                        <?php 
                          if(isset($data['foto']) && $data['foto']!=''){
                            $foto ='uploads/'.$data['foto'];
                          }else{
                            $foto ='../dist/img/avatar5.png';
                          }
                        ?>
                        <img class="profile-user-img img-fluid img-circle" style="margin: 80px 200px 50px;" src="<?= $foto ?>"alt="User profile picture">
                        <div class="input-group">
                          <div class="custom-file">
                            <input class="custom-file-input"  type="file" name="foto"></input>
                            <label class="custom-file-label" style="margin: 0px 100px;">Pilih File</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?=$data['email']?>">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                          <option value="<?=$data['jk']?>" hidden><?=$data['jk']?></option>
                          <option>Laki-Laki</option>
                          <option>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control" name="telp" value="<?=$data['no_hp']?>">
                      </div>
                      <p class= "mt-3 mb-1" style="float: right;">
                        <a href="ubah-password.php?id=<?php echo $_SESSION['user']['id_user']?>">Ubah Password</a>
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="../dashboard/index.php" class="btn btn-secondary mb-5">Kembali</a>
              <input type="submit" class="btn btn-success float-right mb-5" name="simpan" value="Simpan">
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
<?php
include "../footer.php";
?>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>

