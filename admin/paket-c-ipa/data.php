<?php
$page = "PKBM Sanggar Puri | Paket C (IPA)";
include "../header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Siswa Paket C (IPA)</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Paket C (IPA)</li>
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
                            <div class = "row">
                                <div class="col-8">
                                    <form method ="get">
                                        <div class="form-group row mt-0 mb-0">
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
                                </div>
                                <div class="col-4">
                                    <div class="card-tools float-sm-right">
                                        <a href="tambah.php" class="btn btn-success btn-xs mt-2"><i class="fas fa-plus"> DATA</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="admin" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-cog"></i></th>
                                        <th>No</th>
                                        <th>Id Siswa</th>
                                        <th>Tahun Ujian</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>NISN</th>
                                        <th>NIS</th>
                                        <th>Kewarganegaraan</th>
                                        <th>NIK</th>
                                        <th>No KK</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>No Akta</th>
                                        <th>Berkebutuhan Khusus</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Lintang</th>
                                        <th>Bujur</th>
                                        <th>Tempat Tinggal</th>
                                        <th>Tinggi Badan</th>
                                        <th>Berat Badan</th>
                                        <th>Jarak Rumah ke Sekolah</th>
                                        <th>Waktu Tempuh ke Sekolah</th>
                                        <th>Moda Transportasi</th>
                                        <th>Anak ke</th>
                                        <th>Jumlah Saudara</th>
                                        <th>Penerima KPS / KPH?</th>
                                        <th>Memiliki KIP?</th>
                                        <th>Layak Mendapatkan PIP?</th>
                                        <th>Nama Ayah</th>
                                        <th>NIK Ayah</th>
                                        <th>Tahun Lahir Ayah</th>
                                        <th>Pendidikan Ayah</th>
                                        <th>Pekerjaan Ayah</th>
                                        <th>Penghasilan Ayah</th>
                                        <th>Berkebutuhan Khusus Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>NIK Ibu</th>
                                        <th>Tahun Lahir Ibu</th>
                                        <th>Pendidikan Ibu</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Penghasilan Ibu</th>
                                        <th>Berkebutuhan Khusus Ibu</th>
                                        <th>Nama Wali</th>
                                        <th>NIK Wali</th>
                                        <th>Tahun Lahir wali</th>
                                        <th>Pendidikan Wali</th>
                                        <th>Pekerjaan Wali</th>
                                        <th>Penghasilan Wali</th>
                                        <th>No Telp Rumah</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                        <th>Tahun Masuk</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $now = date('Y');
                                            if (isset($_GET['th_ujian'])){
                                                $thn = $_GET['th_ujian'];
                                                $query = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian='$thn' AND status='2' AND daftar_ulang='2'");
                                            }else{
                                                $query = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user WHERE id_paket='3' AND th_ujian='$now' AND status='2' AND daftar_ulang='2'");
                                            }
                                            while($data = mysqli_fetch_array($query)) { 
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href ="detail.php?id=<?=$data['id_user']?>" class="btn btn-primary btn-xs"><i class="fas fa-ellipsis-h"></i></a>
                                                    <a href ="edit.php?id=<?=$data['id_user']?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                                    <a href="javascript:;" data-id="<?=$data['id_user']?>" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                                </td>
                                                <td><?=$no++?></td>
                                                <td><?=$data['id_user']?></td>
                                                <td><?=$data['th_ujian']?></td>
                                                <td><?=$data['nama']?></td>
                                                <td><?=$data['jk']?></td>
                                                <td><?=$data['nisn']?></td>
                                                <td><?=$data['nis']?></td>
                                                <td><?=$data['kewarganegaraan']?></td>
                                                <td><?=$data['nik']?></td>
                                                <td><?=$data['no_kk']?></td>
                                                <?php
                                                 $tgl_lahir = date('d-m-Y', strtotime($data['tgl_lahir']));
                                                ?> 
                                                <td><?=$data['tempat_lahir'].', '.$tgl_lahir?></td>
                                                <td><?=$data['no_akta']?></td>
                                                <td><?=$data['kebutuhan_khusus']?></td>
                                                <td><?=$data['agama']?></td>
                                                <?php 
                                                if($data['rt']=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                                                    <td><?=$data['jalan'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }else{?>
                                                    <td><?=$data['jalan'].', RT '.$data['rt'].' RW '.$data['rw'].', '.$data['dusun'].', '.$data['kecamatan'].', '.$data['desa'].', '.$data['kd_pos']?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><?=$data['lintang']?></td>
                                                <td><?=$data['bujur']?></td>
                                                <td><?=$data['tempat_tinggal']?></td>
                                                <td><?=$data['tb'].' cm'?></td>
                                                <td><?=$data['bb'].' kg'?></td>
                                                <td><?=$data['jarak']?></td>
                                                <?php 
                                                if($data['waktu_jam']=="0" && $data['waktu_menit']=="0" ){?>
                                                    <td><?php echo ""?></td>
                                                <?php
                                                }else if($data['waktu_menit']=="0"){?>
                                                    <td><?=$data['waktu_jam'].' jam'?></td>
                                                <?php
                                                }else if($data['waktu_jam']=="0"){?>
                                                    <td><?=$data['waktu_menit'].' menit'?></td>
                                                <?php
                                                }else{?>
                                                    <td><?=$data['waktu_jam'].' jam '.$data['waktu_menit'].' menit'?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><?=$data['transportasi']?></td>  
                                                <td><?=$data['anak_ke']?></td>  
                                                <td><?=$data['jml_saudara']?></td>  
                                                <td><?=$data['kps_pkh']?></td>  
                                                <td><?=$data['kip']?></td>  
                                                <td><?=$data['pip']?></td>  
                                                <td><?=$data['nama_ayah']?></td>  
                                                <td><?=$data['nik_ayah']?></td>
                                                <?php
                                                if($data['tahun_lahir_ayah']=="0000"){?>
                                                    <td><?php echo ""?></td>
                                                <?php
                                                }else{?>
                                                    <td><?=$data['tahun_lahir_ayah']?></td>
                                                <?php
                                                }
                                                ?>  
                                                <td><?=$data['pendidikan_ayah']?></td>  
                                                <td><?=$data['pekerjaan_ayah']?></td>  
                                                <td><?=$data['penghasilan_ayah']?></td>  
                                                <td><?=$data['kebutuhan_khusus_ayah']?></td>  
                                                <td><?=$data['nama_ibu']?></td>  
                                                <td><?=$data['nik_ibu']?></td>  
                                                <?php
                                                if($data['tahun_lahir_ibu']=="0000"){?>
                                                    <td><?php echo ""?></td>
                                                <?php
                                                }else{?>
                                                    <td><?=$data['tahun_lahir_ibu']?></td>
                                                <?php
                                                }
                                                ?>   
                                                <td><?=$data['pendidikan_ibu']?></td>  
                                                <td><?=$data['pekerjaan_ibu']?></td>  
                                                <td><?=$data['penghasilan_ibu']?></td>  
                                                <td><?=$data['kebutuhan_khusus_ibu']?></td>
                                                <td><?=$data['nama_wali']?></td>  
                                                <td><?=$data['nik_wali']?></td>  
                                                <?php
                                                if($data['tahun_lahir_wali']=="0000"){?>
                                                    <td><?php echo ""?></td>
                                                <?php
                                                }else{?>
                                                    <td><?=$data['tahun_lahir_wali']?></td>
                                                <?php
                                                }
                                                ?>   
                                                <td><?=$data['pendidikan_wali']?></td>  
                                                <td><?=$data['pekerjaan_wali']?></td>  
                                                <td><?=$data['penghasilan_wali']?></td>    
                                                <td><?=$data['telp_rumah']?></td>   
                                                <td><?=$data['no_hp']?></td>   
                                                <td><?=$data['email']?></td>   
                                                <td><?=$data['tahun_masuk']?></td>   
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
                        {width: 150, targets: 4},
                        {width: 130, targets: 11},
                        {width: 150, targets: 15}],
        "buttons": [{extend :'excel', 
                     title : 'Data Siswa Paket C (IPA) <?php echo "(".$tgl.")"?>'
                    },"colvis"]
        }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
    });
</script>