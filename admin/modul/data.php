<?php
$page = "PKBM Sanggar Puri | Modul";
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
                      <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
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
      <?php
          include "../../alert/alert.php";
      ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
          <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">Data Modul</h3>
              <div class="card-tools">
                  <a href="tambah.php" class="btn btn-success btn-xs"><i class="fas fa-plus"> DATA</i></a>
              </div>
            </div>
            <div class="card-body">
              <table id="admin" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><i class="fas fa-cog"></i></th>
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
                      $no = 1;
                      $query="SELECT * FROM modul";
                      $sql_admin = mysqli_query($conn, $query) or die (mysqli_error($conn));
                      while($data = mysqli_fetch_array($sql_admin)) { 
                    ?>
                    <tr>
                      <td>
                        <a href ="edit.php?id=<?=$data['id_modul']?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                        <a href="javascript:;" data-id="<?=$data['id_modul']?>" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                      </td>
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
                      <td><a href ="../../modul/<?php echo $data['pdf']?>" class="btn btn-primary btn-xs" target="_blank">Baca</a></td>
                    </tr>
                    <div class="modal fade" id="modalDelete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href ="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
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
      $("#admin").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "columnDefs" : [
                        {width: 130, targets: 5},
                        {width: 50, targets: 6}],
        "buttons": [{extend :'excel', 
                     title : 'Data Modul <?php echo "(".$tgl.")"?>'
                    }, 
                    "colvis"]
        }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
    });
</script>


                      