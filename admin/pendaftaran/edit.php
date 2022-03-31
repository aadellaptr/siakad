<?php
$page = "PKBM Sanggar Puri | Pendaftar Siswa Baru";
include "../header.php";
require "proses.php";
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
                  <h1 class="m-0">Sunting Data Pendaftar</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="data.php">Pendaftar Siswa Baru</a></li>
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
      <form action="" method="post">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Siswa Baru</h3>
              </div>
              <!-- /.card-header -->
              <?php
                    $id = @$_GET['id'];
                    $sql_admin = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE siswa.id_user= '$id'") or die (mysqli_error($conn));
                    $data = mysqli_fetch_array($sql_admin);
                ?>
              <!-- form start -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="<?=$data['email']?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label" for="jk">Jenis Kelamin</label>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="L" <?php if($data['jk']=='L') echo'checked'?>>
                        <label class="form-check-label">L</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="P" <?php if($data['jk']=='P') echo'checked'?>>
                        <label class="form-check-label">P</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="<?=$data['tempat_lahir']?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="text" class="form-control" name="tgl_lahir" value="<?=$data['tgl_lahir']?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="control-label"><strong>Pendidikan Kesetaraan</strong></label>
                      <select class="form-control" name="paket">
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
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="control-label" for="th_ujian">Tahun Ujian</label>
                      <select class="form-control" name="th_ujian">
                        <option value="<?=$data['th_ujian']?>" hidden><?=$data['th_ujian']?></option>
                        <?php
                          for($i=date('Y'); $i<=date('Y')+3; $i++){?>
                          <option value="<?=$i?>"><?php echo $i ?></option>;
                        <?php 
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_hp">No Hp</label>
                  <input type="number" class="form-control" name="no_hp" value="<?=$data['no_hp']?>">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="control-label"><strong>Status</strong></label>
                      <select class="form-control" name="status">
                        <?php
                        if($data['status']==1){?>
                          <option value="1" hidden>Nonaktif</option>
                        <?php
                        }else{?>
                          <option value="2" hidden>Aktif</option>
                        <?php
                        }
                        ?>
                        <option value ="1">Nonaktif</option>
                        <option value ="2">Aktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="control-label" for="daftar_ulang">Daftar Ulang</label>
                      <select class="form-control" name="daftar_ulang">
                        <?php
                        if($data['daftar_ulang']==1){?>
                          <option value="1" hidden>Belum</option>
                        <?php
                        }else{?>
                          <option value="2" hidden>Sudah</option>
                        <?php
                        }
                        ?>
                        <option value ="1">Belum</option>
                        <option value ="2">Sudah</option>
                      </select>
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
            <input type="submit" class="btn btn-success float-right mb-5" name="edit" value="Simpan">
          </div>
        </div>  
      </form>
    </div>
  </section>
</div>
<?php
include "../footer.php";
?>
