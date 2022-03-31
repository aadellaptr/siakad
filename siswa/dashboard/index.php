<?php
$page="Dashboard";
include "../header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?id=<?=$_SESSION['user']['id_user']?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      $id = @$_GET['id'];
      $sql_siswa = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE siswa.id_user= '$id'") or die (mysqli_error($conn));
      $data = mysqli_fetch_assoc($sql_siswa);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
        if($data['daftar_ulang']=='2'){?>
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <?php
                $tahun = date('Y');
                $paket = $data['id_paket'];
                $sql_dashboard = mysqli_query($conn,"SELECT * FROM modul WHERE id_paket='$paket'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              ?>
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $jumlah_data ?></h3>

                  <p>Modul</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
                <a href="../modul/data.php?id=<?=$_SESSION['user']['id_user']?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>Data Diri</h3>


                  <p>Lihat Data Diri</p>
                </div>
                <div class="icon">
                  <i class="fas fa-edit"></i>
                </div>
                <a href="../akun/data-diri.php?id=<?=$_SESSION['user']['id_user']?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        <?php
        }else{?>
          <div class="row">
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Data Diri
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a href="../akun/ubah-data-diri.php?id=<?=$data['id_user']?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?php if($data['agama']==''){?>
                    <div class="alert alert-danger">
                      <p>Anda belum melengkapi data diri. Silahkan Lengkapi data diri Anda <strong><a href="../akun/ubah-data-diri.php?id=<?=$data['id_user']?>">disini</a></strong> untuk proses daftar ulang.</p>
                    </div>
                  <?php
                  }else{?>
                    <div class="avatar">
                      <?php 
                        if(isset($data['foto']) && $data['foto']!=''){
                          $foto ='uploads/'.$data['foto'];
                        }else{
                          $foto ='../../dist/img/avatar5.png';
                        }
                      ?>
                      <img class="profile-user-img img-fluid img-circle" style="margin: 20px 200px 50px;" src="<?= $foto ?>"alt="User profile picture">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="ttl">Tempat, Tanggal Lahir</label>
                      <?php
                        $tgl_lahir = date('d-m-Y', strtotime($data['tgl_lahir']));
                      ?> 
                      <input type="text" class="form-control" name="ttl" value="<?=$data['tempat_lahir'].', '.$tgl_lahir?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" class="form-control" name="jk" value="<?=$data['jk']?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Paket</label>
                      <input type="text" class="form-control" name="paket" value="<?=$data['nama_paket']?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Tahun Ujian</label>
                      <input type="text" class="form-control" name="th_ujian" value="<?=$data['th_ujian']?>" disabled>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Persyaratan Daftar Ulang
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="alert alert-info">
                    <p>Silahkan daftar ulang dengan membawa berkas sebagai berikut ke PKBM Sanggar Puri</p>
                  </div>
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>Fotocopy Akte</td>
                        <td><span class="badge rounded-pill bg-primary">1 lembar</span></td>
                      </tr>
                      <tr>
                        <th>2</th>
                        <td>Pas Foto Berwarna Uk. 3x4 <br>(Background Merah : Kemeja / Jilbab Putih)</td>
                        <td><span class="badge rounded-pill bg-primary">5 lembar</span></td>
                      </tr>
                      <tr>
                        <th>3</th>
                        <td>Pas Foto Berwarna Uk. 2x3 <br>(Background Merah : Kemeja / Jilbab Putih)</td>
                        <td><span class="badge rounded-pill bg-primary">3 lembar</span></td>
                      </tr>
                      <tr>
                        <th>4</th>
                        <td>Fotocopy KTP</td>
                        <td><span class="badge rounded-pill bg-primary">1 lembar</span></td>
                      </tr>
                      <tr>
                        <th>5</th>
                        <td>Fotocopy NISN</td>
                        <td><span class="badge rounded-pill bg-primary">1 lembar</span></td>
                      </tr>
                      <tr>
                        <th>6</th>
                        <td>Fotocopy Kartu Keluarga</td>
                        <td><span class="badge rounded-pill bg-primary">1 lembar</span></td>
                      </tr>
                      <tr>
                        <th>7</th>
                        <td>Bukti Pendaftaran</td>
                        <td>
                          <div class="row no-print">
                            <div class="col-12">
                              <a href="../akun/detail-print.php?id=<?=$data['id_user']?>" rel="noopener" target="_blank" <?php if($data['agama']=='')echo "class='btn btn-xs btn-success disabled'";?> class="btn btn-xs btn-success"><i class="fas fa-print"></i> Print</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan='3'>
                          <?php
                          if($data['agama']==''){?>
                            <div class="alert alert-danger">
                              <p>Anda belum melengkapi data diri. Silahkan Lengkapi data diri Anda <strong><a href="../akun/ubah-data-diri.php?id=<?=$data['id_user']?>">disini</a></strong> untuk proses daftar ulang.</p>
                            </div>
                          <?php
                          }
                          ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div> 
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
          </div>
        <?php
        }
        ?>
      </div>
    </section>
  </div>
  
  
<?php 
include "../footer.php";
?>
