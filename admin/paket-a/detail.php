<?php
$page = "PKBM Sanggar Puri | Paket A";
include "../header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <?php
        $id = @$_GET['id'];
        $sql_siswa = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE siswa.id_user= '$id'") or die (mysqli_error($conn));
        $data = mysqli_fetch_assoc($sql_siswa);
      ?>
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Data Siswa </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="data.php">Paket A</a></li>
            <li class="breadcrumb-item active">Sunting</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Data <?=$data['nama']?>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a href="detail-print.php?id=<?=$data['id_user']?>" rel="noopener" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">ID Siswa</dt>
              <dd class="col-sm-8">: <?=$data['id_user']?></dd>
              <dt class="col-sm-4">Paket</dt>
              <dd class="col-sm-8">: <?=$data['nama_paket']?></dd>
              <dt class="col-sm-4">Tahun Ujian</dt>
              <dd class="col-sm-8">: <?=$data['th_ujian']?></dd>
              <dt class="col-sm-4">Nama</dt>
              <dd class="col-sm-8">: <?=$data['nama']?></dd>
              <dt class="col-sm-4">Jenis Kelamin</dt>
              <dd class="col-sm-8">: <?=$data['jk']?></dd>
              <?php 
              if ($data['nisn']!==""){?>
                <dt class="col-sm-4">NISN</dt>
                <dd class="col-sm-8">: <?=$data['nisn']?></dd>
              <?php } 
              if ($data['nis']!==""){?>
                <dt class="col-sm-4">NIS</dt>
                <dd class="col-sm-8">: <?=$data['nis']?></dd>
              <?php } ?>
              <dt class="col-sm-4">Kewarganegaraan</dt>
              <dd class="col-sm-8">: <?=$data['kewarganegaraan']?></dd>
              <?php 
              if ($data['nik']!==""){?>
                <dt class="col-sm-4">NIK</dt>
                <dd class="col-sm-8">: <?=$data['nik']?></dd>
              <?php }
              if ($data['no_kk']!==""){?>
                <dt class="col-sm-4">No KK</dt>
                <dd class="col-sm-8">: <?=$data['no_kk']?></dd>
              <?php } ?>
              <dt class="col-sm-4">Tempat, Tanggal Lahir</dt>
              <?php
                $tgl_lahir = date('d-m-Y', strtotime($data['tgl_lahir']));
              ?> 
              <dd class="col-sm-8">: <?=$data['tempat_lahir'].', '.$tgl_lahir?></dd>
              <?php 
              if ($data['no_akta']!==""){?>
                <dt class="col-sm-4">No Akta</dt>
                <dd class="col-sm-8">: <?=$data['no_akta']?></dd>
              <?php } 
              if ($data['kebutuhan_khusus']!==""){?>
                <dt class="col-sm-4">Berkebutuhan Khusus</dt>
                <dd class="col-sm-8">: <?=$data['kebutuhan_khusus']?></dd>
              <?php } ?>
              <dt class="col-sm-4">Agama</dt>
              <dd class="col-sm-8">: <?=$data['agama']?></dd>
              <dt class="col-sm-4">Alamat</dt>
              <?php 
              if($data['rt']=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']!=="" && $data['rw']!=="" && $data['dusun']=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].', RW '.$data['rw'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else if($data['rt']=="" && $data['rw']!=="" && $data['dusun']!=="" && $data['kd_pos']!==""){?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RW '.$data['rw'].', '.$data['dusun'].', '.$data['desa'].', '.$data['kecamatan'].', '.$data['kd_pos']?></dd>
              <?php
              }else{?>
                  <dd class="col-sm-8">: <?=$data['jalan'].', RT '.$data['rt'].' RW '.$data['rw'].', '.$data['dusun'].', '.$data['kecamatan'].', '.$data['desa'].', '.$data['kd_pos']?></dd>
              <?php
              }
              if ($data['lintang']!==""){?>
                <dt class="col-sm-4">Lintang</dt>
                <dd class="col-sm-8">: <?=$data['lintang']?></dd>
              <?php } 
              if ($data['bujur']!==""){?>
                <dt class="col-sm-4">Bujur</dt>
                <dd class="col-sm-8">: <?=$data['bujur']?></dd>
              <?php } ?>
              <dt class="col-sm-4">Tempat Tinggal</dt>
              <dd class="col-sm-8">: <?=$data['tempat_tinggal']?></dd>
              
              <dt class="col-sm-4">Moda Transportasi</dt>
              <dd class="col-sm-8">: <?=$data['transportasi']?></dd>  
              <dt class="col-sm-4">Anak ke</dt>
              <dd class="col-sm-8">: <?=$data['anak_ke']?></dd>  
              <?php 
              if ($data['kps_pkh']!==""){?>
                <dt class="col-sm-4">Penerima KPS / KPH?</dt>
                <dd class="col-sm-8">: <?=$data['kps_pkh']?></dd> 
              <?php } 
              if ($data['kip']!==""){?>
                <dt class="col-sm-4">Memiliki KIP?</dt>
                <dd class="col-sm-8">: <?=$data['kip']?></dd> 
              <?php } 
              if ($data['pip']!==""){?>
                <dt class="col-sm-4">Layak Mendapatkan PIP?</dt>
                <dd class="col-sm-8">: <?=$data['pip']?></dd>
              <?php } 
              if ($data['telp_rumah']!==""){?>
                <dt class="col-sm-4"> No Telp Rumah</dt>
                <dd class="col-sm-8">: <?=$data['telp_rumah']?></dd>  
              <?php } 
              if ($data['no_hp']!==""){?>
                <dt class="col-sm-4">No Hp</dt>
                <dd class="col-sm-8">: <?=$data['no_hp']?></dd>
              <?php } ?>
              <dt class="col-sm-4">Email</dt>
              <dd class="col-sm-8">: <?=$data['email']?></dd>    
              <dt class="col-sm-4">Tahun Masuk</dt>
              <dd class="col-sm-8">: <?=$data['tahun_masuk']?></dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Data Periodik <?=$data['nama']?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">Tinggi Badan</dt>
              <dd class="col-sm-8">: <?=$data['tb'].' cm'?></dd>
              <dt class="col-sm-4">Berat Badan</dt>
              <dd class="col-sm-8">: <?=$data['bb'].' kg'?></dd>
              <dt class="col-sm-4">Jarak Rumah ke Sekolah</dt>
              <dd class="col-sm-8">: <?=$data['jarak']?></dd>
              <?php 
              if ($data['waktu_jam']!=="0" && $data['waktu_menit']!=="0"){?>
                <dt class="col-sm-4">Waktu Tempuh ke Sekolah</dt>
                <dd class="col-sm-8">: <?=$data['waktu_jam'].' jam '.$data['waktu_menit'].' menit'?></dd>
                <?php
              }else if ($data['waktu_jam']!=="0" && $data['waktu_menit']=="0"){?>
                <dt class="col-sm-4">Waktu Tempuh ke Sekolah</dt>
                <dd class="col-sm-8">: <?=$data['waktu_jam'].' jam'?></dd>
                <?php
              }else if($data['waktu_jam']=="0" && $data['waktu_menit']!=="0"){?>
                <dt class="col-sm-4">Waktu Tempuh ke Sekolah</dt>
                <dd class="col-sm-8">: <?=$data['waktu_menit'].' menit'?></dd>    
              <?php } ?>
              <dt class="col-sm-4">Jumlah Saudara Kandung</dt>
              <dd class="col-sm-8">: <?=$data['jml_saudara']?></dd> 
            </dl>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <?php if($data['nama_ayah']!==""){?>
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Data Ayah <?=$data['nama']?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">Nama Ayah</dt>
              <dd class="col-sm-8">: <?=$data['nama_ayah']?></dd>  
              <?php 
              if ($data['nik_ayah']!==""){?>
                <dt class="col-sm-4">NIK Ayah</dt>
                <dd class="col-sm-8">: <?=$data['nik_ayah']?></dd>
              <?php } 
              if ($data['tahun_lahir_ayah']!=="0000"){?>
                <dt class="col-sm-4">Tahun Lahir Ayah</dt>
                <dd class="col-sm-8">: <?=$data['tahun_lahir_ayah']?></dd>
              <?php } 
              if ($data['pendidikan_ayah']!==""){?>
                <dt class="col-sm-4">Pendidikan Ayah</dt>
                <dd class="col-sm-8">: <?=$data['pendidikan_ayah']?></dd>
              <?php } 
              if ($data['pekerjaan_ayah']!==""){?>
                <dt class="col-sm-4">Pekerjaan Ayah</dt>
                <dd class="col-sm-8">: <?=$data['pekerjaan_ayah']?></dd>
              <?php } 
              if ($data['penghasilan_ayah']!==""){?>
                <dt class="col-sm-4">Penghasilan Ayah</dt>
                <dd class="col-sm-8">: <?=$data['penghasilan_ayah']?></dd>
              <?php }
              if ($data['kebutuhan_khusus_ayah']!==""){?>
                <dt class="col-sm-4">Berkebutuhan Khusus Ayah</dt>
                <dd class="col-sm-8">: <?=$data['kebutuhan_khusus_ayah']?></dd>
              <?php } ?>
            </dl>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Data Ibu <?=$data['nama']?>
            </h3>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">Nama Ibu</dt>
              <dd class="col-sm-8">: <?=$data['nama_ibu']?></dd> 
                <?php 
                if ($data['nik_ibu']!==""){?>
                  <dt class="col-sm-4">NIK Ibu</dt>
                  <dd class="col-sm-8">: <?=$data['nik_ibu']?></dd> 
                <?php } 
                if ($data['tahun_lahir_ibu']!=="0000"){?>
                  <dt class="col-sm-4">Tahun Lahir Ibu</dt>
                  <dd class="col-sm-8">: <?=$data['tahun_lahir_ibu']?></dd> 
                <?php } ?> 
              <dt class="col-sm-4">Pendidikan Ibu</dt>
              <dd class="col-sm-8">: <?=$data['pendidikan_ibu']?></dd>  
              <dt class="col-sm-4">Pekerjaan Ibu</dt>
              <dd class="col-sm-8">: <?=$data['pekerjaan_ibu']?></dd>  
              <dt class="col-sm-4">Penghasilan Ibu</dt>
              <dd class="col-sm-8">: <?=$data['penghasilan_ibu']?></dd>
              <?php 
              if ($data['kebutuhan_khusus_ibu']!==""){?>
                <dt class="col-sm-4">Berkebutuhan Khusus Ibu</dt>
                <dd class="col-sm-8">: <?=$data['kebutuhan_khusus_ibu']?></dd>
              <?php } ?> 
            </dl>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <?php if($data['nama_wali']!==""){?>
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Data Wali <?=$data['nama']?>
            </h3>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">Nama wali</dt>
              <dd class="col-sm-8">: <?=$data['nama_wali']?></dd>  
              <?php 
              if ($data['nik_wali']!==""){?>
                <dt class="col-sm-4">NIK wali</dt>
                <dd class="col-sm-8">: <?=$data['nik_wali']?></dd>
              <?php } 
              if ($data['tahun_lahir_wali']!=="0000"){?>
                <dt class="col-sm-4">Tahun Lahir wali</dt>
                <dd class="col-sm-8">: <?=$data['tahun_lahir_wali']?></dd>
              <?php } 
              if ($data['pendidikan_ayah']!==""){?>
                <dt class="col-sm-4">Pendidikan wali</dt>
                <dd class="col-sm-8">: <?=$data['pendidikan_wali']?></dd>
              <?php } 
              if ($data['pekerjaan_wali']!==""){?>
                <dt class="col-sm-4">Pekerjaan wali</dt>
                <dd class="col-sm-8">: <?=$data['pekerjaan_wali']?></dd>
              <?php } 
              if ($data['penghasilan_wali']!==""){?>
                <dt class="col-sm-4">Penghasilan wali</dt>
                <dd class="col-sm-8">: <?=$data['penghasilan_wali']?></dd>
              <?php }
              if ($data['kebutuhan_khusus_wali']!==""){?>
                <dt class="col-sm-4">Berkebutuhan Khusus wali</dt>
                <dd class="col-sm-8">: <?=$data['kebutuhan_khusus_wali']?></dd>
              <?php } ?>
            </dl>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
include "../footer.php";
?>
