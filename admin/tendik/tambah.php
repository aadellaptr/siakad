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
                    <h1 class="m-0">Tambah Data Tenaga Pendidikan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Tenaga Pendidikan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form id="data" action="" method="post">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Data Tenaga Pendidikan</h3>
                </div>
                <!-- /.card-header -->
                <?php
                  $query = mysqli_query($conn, "SELECT max(id_user) as id FROM user WHERE level='tendik'");
                  $data = mysqli_fetch_array($query);
                  $idTendik = $data['id'];
                
                  $i = (int) substr($idTendik, 3, 3);
                  $i++;
              
                  $identity = "TPD";
                  $idTendik = $identity . sprintf("%03s", $i);
                ?>
                <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="id">Id Tenaga Pendidikan</label>
                        <input type="text" class="form-control" name="kode" value="<?php echo $idTendik ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama">
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option hidden></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control" name="telp">
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
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="data.php" class="btn btn-secondary mb-5">Kembali</a>
              <input type="submit" class="btn btn-success float-right mb-5" name="tambah" value="Simpan">
            </div>
          </div>
        </form>
      </div>
    </section>
</div>
<?php
include "../footer.php";