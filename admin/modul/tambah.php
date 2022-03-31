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
                    <h1 class="m-0">Tambah Data Modul</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Modul</a></li>
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
        <form action="" method="post" id="dataModul" enctype="multipart/form-data">
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
                  $query = mysqli_query($conn, "SELECT max(id_modul) as id FROM modul");
                  $data = mysqli_fetch_array($query);
                  $idModul= $data['id'];
                
                  $i = (int) substr($idModul, 3, 3);
                  $i++;
              
                  $identity = "EM";
                  $idModul = $identity . sprintf("%03s", $i);
                ?>
                <!-- form start -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="id">Id Modul</label>
                        <input type="text" class="form-control" name="kode" value="<?php echo $idModul ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="id_paket" class="control-label" >Paket</label>
                        <select class="form-control" name="id_paket" id="namaPaket" onChange="pilihMapel(this)" required>
                          <option value="" hidden></option>
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
                        <select class="form-control" name="mapel" id="mapel" required></select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="control-label" for="judul">Judul Modul</label>
                        <input type="text" class="form-control" name="judul" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="hal">Jumlah Halaman</label>
                        <input type="text" class="form-control" name="hal" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="buku">Modul</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input class="custom-file-input" type="file" name="buku" required></input>
                            <label class="custom-file-label">Pilih File</label>
                          </div>
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
?>

