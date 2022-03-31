<?php
$page = "PKBM Sanggar Puri | Informasi";
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
                    <h1 class="m-0">Tambah Informasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Informasi</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
      
    ?>
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
                  <h3 class="card-title">Informasi</h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="id" class="control-label">ID Informasi</label>
                    <input type="text" class="form-control" name="id" value="" readonly >
                  </div> -->
                  <div class="form-group">
                    <label for="judul" class="control-label">Judul</label>
                    <input type="text" class="form-control" name="judul" >
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="cover">Cover</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input class="custom-file-input"  type="file" name="cover"></input>
                        <label class="custom-file-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="isi" class="control-label">Isi</label>
                    <textarea class="form-control" name="isi" rows="6" style="white-space: pre-line;"></textarea>
                  </div>
                </div>
              </div>
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
</div>
<?php
include "../footer.php";
?>
