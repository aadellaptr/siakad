<?php
$page = "PKBM Sanggar Puri | Tendik";
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
                    <h1 class="m-0">Sunting Data Tenaga Pendidikan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Tenaga Pendidikan</a></li>
                        <li class="breadcrumb-item active">Sunting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6" style="margin-left:280px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Tenaga Pendidikan</h3>
              </div>
              <!-- /.card-header -->
              <?php
                    $id = @$_GET['id'];
                    $sql_admin = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'") or die (mysqli_error($conn));
                    $data = mysqli_fetch_array($sql_admin);
                ?>
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">Id Tenaga Pendidikan</label>
                    <input type="text" class="form-control" name="id" value="<?=$data['id_user']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
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
                  <input type="submit" class="btn btn-primary mt-3" name="edit" value="Simpan" style="margin-left:200px;">
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>
  </div>
</div>
<?php
include "../footer.php";
?>
