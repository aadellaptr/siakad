<?php
$page="PKBM Sanggar Puri | Dashboard";
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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method ="get">
          <div class="form-group row mt-0 mb-3">
            <label for="year" class="col-sm-1.5 col-form-label">Tahun Ujian</label>
            <div class="col-sm-3">
              <select class="form-control" name="th_ujian" style="width: 100%; ">
                <?php
                $now = date('Y');
                ?>
                <option value="" hidden>
                    <?php if (isset($_GET['th_ujian'])){
                        echo $_GET['th_ujian'];
                    }else{
                        echo $now;
                    }
                    ?>
                </option>
                <?php
                $ambil = mysqli_query($conn, "SELECT DISTINCT th_ujian FROM siswa");
                while ($filter = mysqli_fetch_assoc($ambil)){
                ?>
                <option value="<?php echo $filter['th_ujian']?>"><?php echo $filter['th_ujian']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-2">
                <input type="submit" class="btn btn-primary btn-xs mt-2" name="filter" value="FILTER">
            </div>
          </div>
        </form>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              $now = date('Y');
              if (isset($_GET['th_ujian'])){
                $thn = $_GET['th_ujian'];
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1' AND th_ujian='$thn' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }else{
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1' AND th_ujian='$now' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h6><b>Peserta Didik Paket A</b></h6>
                <h5><b>Jumlah: <?php echo $jumlah_data ?></b></h5>
                <?php
                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1'  AND th_ujian=$thn AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk = mysqli_num_rows($sql_lk);
                  }else{
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1'  AND th_ujian=$now AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk= mysqli_num_rows($sql_lk);
                  }

                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1' AND th_ujian=$thn AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr = mysqli_num_rows($sql_pr);
                  }else{
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='1' AND th_ujian=$now AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr= mysqli_num_rows($sql_pr);
                  }
                ?>
                <p>Laki-laki&ensp;&ensp;&ensp;&ensp;: <?php echo $jml_lk ?><br>Perempuan&ensp; : <?php echo $jml_pr ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person mt-4"></i>
              </div>
              <a href="../paket-a/data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              $now = date('Y');
              if (isset($_GET['th_ujian'])){
                $thn = $_GET['th_ujian'];
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2' AND th_ujian='$thn' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }else{
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2' AND th_ujian='$now' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h6><b>Peserta Didik Paket B</b></h6>
                <h5><b>Jumlah: <?php echo $jumlah_data ?></b></h5>
                <?php
                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2'  AND th_ujian=$thn AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk = mysqli_num_rows($sql_lk);
                  }else{
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2'  AND th_ujian=$now AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk= mysqli_num_rows($sql_lk);
                  }

                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2' AND th_ujian=$thn AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr = mysqli_num_rows($sql_pr);
                  }else{
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='2' AND th_ujian=$now AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr= mysqli_num_rows($sql_pr);
                  }
                ?>
                <p>Laki-laki&ensp;&ensp;&ensp;&ensp;: <?php echo $jml_lk ?><br>Perempuan&ensp; : <?php echo $jml_pr ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person mt-4"></i>
              </div>
              <a href="../paket-b/data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              $now = date('Y');
              if (isset($_GET['th_ujian'])){
                $thn = $_GET['th_ujian'];
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian='$thn' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }else{
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian='$now' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }
            ?>
            <div class="small-box bg-secondary">
              <div class="inner">
                <h6><b>Peserta Didik Paket C (IPA)</b></h6>
                <h5><b>Jumlah: <?php echo $jumlah_data ?></b></h5>
                <?php
                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3'  AND th_ujian=$thn AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk = mysqli_num_rows($sql_lk);
                  }else{
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3'  AND th_ujian=$now AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk= mysqli_num_rows($sql_lk);
                  }

                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian=$thn AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr = mysqli_num_rows($sql_pr);
                  }else{
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian=$now AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr= mysqli_num_rows($sql_pr);
                  }
                ?>
                <p>Laki-laki&ensp;&ensp;&ensp;&ensp;: <?php echo $jml_lk ?><br>Perempuan&ensp; : <?php echo $jml_pr ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person mt-4"></i>
              </div>
              <a href="../paket-c-ipa/data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              $now = date('Y');
              if (isset($_GET['th_ujian'])){
                $thn = $_GET['th_ujian'];
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4' AND th_ujian='$thn' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }else{
                $sql_dashboard = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4' AND th_ujian='$now' AND status='2' AND daftar_ulang='2'");
                $jumlah_data = mysqli_num_rows($sql_dashboard);
              }
            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h6><b>Peserta Didik Paket C (IPS)</b></h6>
                <h5><b>Jumlah: <?php echo $jumlah_data ?></b></h5>
                <?php
                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4'  AND th_ujian=$thn AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk = mysqli_num_rows($sql_lk);
                  }else{
                    $sql_lk= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4'  AND th_ujian=$now AND jk='L' AND status='2' AND daftar_ulang='2'");
                    $jml_lk= mysqli_num_rows($sql_lk);
                  }

                  if (isset($_GET['th_ujian'])){
                    $thn = $_GET['th_ujian'];
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4' AND th_ujian=$thn AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr = mysqli_num_rows($sql_pr);
                  }else{
                    $sql_pr= mysqli_query($conn,"SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='4' AND th_ujian=$now AND jk='P' AND status='2' AND daftar_ulang='2'");
                    $jml_pr= mysqli_num_rows($sql_pr);
                  }
                ?>
                <p>Laki-laki&ensp;&ensp;&ensp;&ensp;: <?php echo $jml_lk ?><br>Perempuan&ensp; : <?php echo $jml_pr ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person mt-4"></i>
              </div>
              <a href="../paket-c-ips/data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php 
  include "../footer.php";
  ?>
