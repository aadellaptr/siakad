<?php
$page = "Modul";
include "../header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Modul</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="../dashboard/index.php?id=<?=$_SESSION['user']['id_user']?>">Home</a></li>
                      <li class="breadcrumb-item active">Modul</li>
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
        <div class="col-12">
          <div class="card">
          <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">Data Modul</h3>
            </div>
            <div class="card-body">
              <table id="modul" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Modul</th>
                    <th>Paket</th>
                    <th>Mata Pelajaran</th>
                    <th>Judul Buku</th>
                    <th>Jumlah Halaman</th>
                    <th>Modul</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $id = @$_GET['id'];
                      $sql_siswa = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE siswa.id_user= '$id'") or die (mysqli_error($conn));
                      $data = mysqli_fetch_assoc($sql_siswa);
                      $paket = $data['id_paket'];

                      $no = 1;
                      $query="SELECT * FROM modul WHERE id_paket='$paket'";
                      $sql_admin = mysqli_query($conn, $query) or die (mysqli_error($conn));
                      while($data = mysqli_fetch_array($sql_admin)) { 
                    ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$data['id_modul']?></td>
                      <?php
                      if($data['id_paket']=="1" ){?>
                          <td><?php echo "Paket A Setara SD"?></td>
                      <?php
                      }else if($data['id_paket']=="2"){?>
                          <td><?php echo "Paket B Setara SMP"?></td>
                      <?php
                      }else if($data['id_paket']=="3"){?>
                          <td><?php echo "Paket C Setara SMA IPA"?></td>
                      <?php
                      }else{?>
                          <td><?php echo "Paket C Setara SMA IPS"?></td>
                      <?php
                      }
                      ?>
                      <td><?=$data['mapel']?></td>
                      <td><?=$data['judul']?></td>
                      <td><?=$data['hal']?></td>
                      <td><a href ="../../modul/<?php echo $data['pdf']?>" target="_blank" class="btn btn-primary btn-xs">Baca</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
     </div>
  </section>
</div>

<?php
include "../footer.php";
?>
<script>
<?php 
$tgl = date('d-m-Y H:i:s');
?>
$(function () {
      $("#modul").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "columnDefs" : [
                        {width: 130, targets: 5},
                        {width: 50, targets: 6}]
        }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
    });
</script>


                      