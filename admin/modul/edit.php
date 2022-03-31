<?php
$page = "PKBM Sanggar Puri | Modul";
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
                    <h1 class="m-0">Sunting Data Modul</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Modul</a></li>
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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Data Modul</h3>
                </div>
                <!-- /.card-header -->
                <?php
                  $id = @$_GET['id'];
                  $sql_admin = mysqli_query($conn, "SELECT * FROM modul INNER JOIN paket ON paket.id_paket = modul.id_paket WHERE modul.id_modul = '$id'") or die (mysqli_error($conn));
                  $data = mysqli_fetch_array($sql_admin);
                ?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="id">Id Modul</label>
                        <input type="text" class="form-control" name="id" value="<?=$data['id_modul']?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="id_paket" class="control-label" >Paket</label>
                        <select class="form-control" name="id_paket" id="namaPaket" onChange="pilihMapel(this)" required>
                          <option value="<?=$data['id_paket']?>" hidden><?=$data['nama_paket']?></option>
                          <?php $ambil = mysqli_query($conn, "SELECT * FROM paket");
                              while ($paket = mysqli_fetch_assoc($ambil)){
                          ?>
                          <option value ="<?php echo $paket ["id_paket"] ?>">
                              <?php echo $paket["nama_paket"]?> 
                          </option>
                          <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group" >
                        <label class="control-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel" id="mapel" value="<?=$data['mapel']?>"required>
                        <option value="<?=$data['mapel']?>" hidden><?=$data['mapel']?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="judul" class="control-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" value="<?=$data['judul']?>" required>
                      </div>
                      <div class="form-group">
                        <label for="hal" class="control-label">Jumlah Halaman</label>
                        <input type="text" class="form-control" name="hal" value="<?=$data['hal']?>" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="pdf">Modul</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input class="custom-file-input" type="file" name="pdf"></input>
                            <label class="custom-file-label" ><?php echo $data['pdf']?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="data.php" class="btn btn-secondary mb-5">Kembali</a>
              <input type="submit" class="btn btn-success float-right mb-5" name="edit" value="Simpan">
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
