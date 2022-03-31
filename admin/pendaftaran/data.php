<?php
$page = "PKBM Sanggar Puri | Pendaftar Siswa Baru";
include "../header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pendaftar Siswa Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Siswa Baru</li>
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
                            <h3 class="card-title">Data Siswa Baru</h3>
                            <div class="card-tools">
                                <a href="tambah.php" class="btn btn-success btn-xs"><i class="fas fa-plus"> DATA</i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="admin" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Paket</th>
                                        <th>Tahun Ujian</th>
                                        <th>No Telp</th>
                                        <th>Status</th>
                                        <th>Daftar Ulang</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query="SELECT * FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE status='1' OR daftar_ulang='1'";
                                            $sql_admin = mysqli_query($conn, $query) or die (mysqli_error($conn));
                                            while($data = mysqli_fetch_array($sql_admin)) { 
                                        ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data['nama']?></td>
                                                <td><?=$data['jk']?></td>
                                                <td><?=$data['nama_paket']?></td>
                                                <td><?=$data['th_ujian']?></td>
                                                <td><?=$data['no_hp']?></td>
                                                <?php 
                                                if($data['status']=="1"){?>
                                                    <td><span class="badge rounded-pill bg-danger">Nonaktif</span></td>
                                                <?php
                                                }else{?>
                                                    <td><span class="badge rounded-pill bg-success">Aktif</span></td>
                                                <?php
                                                }
                                                ?>
                                                <?php 
                                                if($data['daftar_ulang']=="1"){?>
                                                    <td><span class="badge rounded-pill bg-danger">Belum</span></td>
                                                <?php
                                                }else{?>
                                                    <td><span class="badge rounded-pill bg-success">Sudah</span></td>
                                                <?php
                                                }
                                                ?>
                                                <td>
                                                    <a href ="edit.php?id=<?=$data['id_user']?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:;" data-id="<?=$data['id_user']?>" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                                </td>
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
    "scrollY" : false, "scrollX" : true,
    "responsive": false, "lengthChange": true, "autoWidth": true,
    "columnDefs" : [
                    {width: 20, targets: 0},
                    {width: 200, targets: 1},
                    {width: 150, targets: 3},
                    {width: 50, targets: 4},
                    {width: 65, targets: 7}],
    "buttons": [{extend :'excel', 
                    title : 'Data Siswa Paket A <?php echo "(".$tgl.")"?>'
                },"colvis"]
    }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
});
</script>

