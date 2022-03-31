<?php
$page = "Data Diri";
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
                  <h1 class="m-0">Data Diri</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="../dashboard/index.php?id=<?=$_SESSION['user']['id_user']?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="data-diri.php?id=<?=$_SESSION['user']['id_user']?>">Data Diri</a></li>
                      <li class="breadcrumb-item active">Ubah Data Diri</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form id="data" action="" method="post">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ubah Data Diri</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <?php
            $id = @$_GET['id'];
            $sql_siswa = mysqli_query($conn, "SELECT *  FROM user INNER JOIN siswa ON user.id_user=siswa.id_user INNER JOIN paket ON paket.id_paket = siswa.id_paket WHERE siswa.id_user= '$id'") or die (mysqli_error($conn));
            $data = mysqli_fetch_assoc($sql_siswa);
          ?>
          <!-- form start -->
          <div class="card-body">
            <div class="form-group">
              <label for="id">Id Siswa</label>
              <input type="text" class="form-control" name="id" value="<?=$data['id_user']?>" readonly>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="id_paket">Paket</label>
                  <select class="form-control" name="id_paket">
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
              <label class="control-label" for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
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
                  <label for="nisn">NISN</label>
                  <input type="number" class="form-control" name="nisn" value="<?=$data['nisn']?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="number" class="form-control" name="nis" value="<?=$data['nis']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label class="control-label">Kewarganegaran</label>
                  <input type="text" class="form-control" name="kewarganegaraan" value="<?=$data['kewarganegaraan']?>">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="number" class="form-control" name="nik" value="<?=$data['nik']?>">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="no_kk">No KK</label>
                  <input type="number" class="form-control" name="no_kk" value="<?=$data['no_kk']?>" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="<?=$data['tempat_lahir']?>" >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" value="<?=$data['tgl_lahir']?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="no_akta">No Akta</label>
              <input type="text" class="form-control" name="no_akta" value="<?=$data['no_akta']?>" >
            </div>
            <div class="form-group">
              <label for="kebutuhan_khusus">Berkebutuhan Khusus</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus"  value="Ya" <?php if($data['kebutuhan_khusus']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus" value="Tidak" <?php if($data['kebutuhan_khusus']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Agama & Kepercayaan</label>
              <select class="form-control" name="agama" >
                <option value="<?=$data['agama']?>" hidden><?=$data['agama']?></option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katholik</option>
                <option>Hindu</option>
                <option>Budha</option>
                <option>Khonghucu</option>
                <option>Kepercayaan kpd Tuhan YME</option>
                <option>Lainnya</option>
              </select>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <label class="control-label" for="jalan">Alamat Jalan</label>
                  <input type="text" class="form-control" name="jalan" value="<?=$data['jalan']?>" >
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="rt">RT</label>
                  <input type="number" class="form-control" name="rt" value="<?=$data['rt']?>">
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="rw">RW</label>
                  <input type="number" class="form-control" name="rw" value="<?=$data['rw']?>" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="dusun">Dusun</label>
                  <input type="text" class="form-control" name="dusun" value="<?=$data['dusun']?>" >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="control-label" for="kecamatan">Kecamatan</label>
                  <input type="text" class="form-control" name="kecamatan" value="<?=$data['kecamatan']?>" >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label class="control-label" for="desa">Desa</label>
                  <input type="text" class="form-control" name="desa" value="<?=$data['desa']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="kd_pos">Kode Pos</label>
                  <input type="number" class="form-control" name="kd_pos" value="<?=$data['kd_pos']?>">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="lintang">Lintang</label>
                  <input type="text" class="form-control" name="lintang" value="<?=$data['lintang']?>">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="bujur">Bujur</label>
                  <input type="text" class="form-control" name="bujur" value="<?=$data['bujur']?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Tempat Tinggal</label>
              <select class="form-control" name="tempat_tinggal" >
                <option value="<?=$data['tempat_tinggal']?>" hidden><?=$data['tempat_tinggal']?></option>
                <option>Bersama Orang Tua</option>
                <option>Wali</option>
                <option>Kost</option>
                <option>Asrama</option>
                <option>Panti Asuhan</option>
                <option>Pesantren</option>
                <option>Lainnya</option>
              </select>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="anak_ke">Anak ke-berapa (Berdasarkan KK)</label>
                  <input type="number" class="form-control" name="anak_ke" value="<?=$data['anak_ke']?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label">Moda Transportasi</label>
                  <select class="form-control" name="transportasi" >
                    <option value="<?=$data['transportasi']?>" hidden><?=$data['transportasi']?></option>
                    <option>Jalan Kaki</option>
                    <option>Angkutan umum/bus/pete-pete</option>
                    <option>Mobil/bus antar jemput</option>
                    <option>Kereta Api</option>
                    <option>Ojek</option>
                    <option>Andong/bendi/sado/dokar/delman/becak</option>
                    <option>Perahu penyebrangan/rakit/getek</option>
                    <option>Kuda</option>
                    <option>Sepeda</option>
                    <option>Sepeda Motor</option>
                    <option>Mobil pribadi</option>
                    <option>Lainnya</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="kps_pkh">Penerima KPS / PKH</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kps_pkh" value="Ya" <?php if($data['kps_pkh']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kps_pkh" value="Tidak" <?php if($data['kps_pkh']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="kip">Apakah Punya KIP?</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kip" value="Ya" <?php if($data['kip']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kip" value="Tidak" <?php if($data['kip']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="pip">Apakah Peserta Didik Tersebut Layak Mendapatkan PIP?</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pip" value="Ya" <?php if($data['pip']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pip" value="Tidak" <?php if($data['pip']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Periodik</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="tb" class="control-label">Tinggi Badan (cm)</label>
                  <input type="number" class="form-control" name="tb" value="<?=$data['tb']?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="bb">Berat Badan (kg)</label>
                  <input type="number" class="form-control" name="bb" value="<?=$data['bb']?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="jarak">Jarak Rumah ke Sekolah (dalam kilometer)</label>
              <input type="number" class="form-control" id="jarak" name="jarak" value="<?=$data['jarak']?>">
            </div>
            <div class="row">
              <div class="col-6">
                <label for="waktu_jam">Waktu Tempuh ke Sekolah (Jam / Menit)</label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <div class="col-sm-11">
                      <input type="number" class="form-control" name="waktu_jam"
                        <?php if($data['waktu_jam']=="0"){?> 
                          value="<?php echo ''?>"
                        <?php
                        }else{?>
                          value="<?=$data['waktu_jam']?>"
                        <?php
                        }
                        ?> 
                      >
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group row">
                      <label for="waktu_menit">/</label>
                      <div class="col-sm-11">
                        <input type="number" class="form-control" name="waktu_menit"
                          <?php if($data['waktu_menit']=="0"){?> 
                            value="<?php echo ''?>"
                          <?php
                          }else{?>
                            value="<?=$data['waktu_menit']?>"
                          <?php
                          }
                          ?>
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label" for="jml_saudara">Jumlah Saudara Kandung</label>
                  <input type="number" class="form-control" name="jml_saudara" value="<?=$data['jml_saudara']?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Ayah Kandung</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_ayah">Nama Ayah</label>
              <input type="text" class="form-control" name="nama_ayah" value="<?=$data['nama_ayah']?>">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nik_ayah">NIK Ayah</label>
                  <input type="text" class="form-control" name="nik_ayah" value="<?=$data['nik_ayah']?>" >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="tahun_lahir_ayah">Tahun Lahir Ayah</label>
                  <input type="year" class="form-control" name="tahun_lahir_ayah" 
                    <?php if($data['tahun_lahir_ayah']=="0000"){?> 
                      value="<?php echo ''?>"
                    <?php
                    }else{?>
                        value="<?=$data['tahun_lahir_ayah']?>"
                    <?php
                    }
                    ?> 
                  >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Pendidikan Ayah</label>
              <input type="text" class="form-control" name="pendidikan_ayah" value="<?=$data['pendidikan_ayah']?>">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Pekerjaan Ayah</label>
                  <input type="text" class="form-control" name="pekerjaan_ayah" value="<?=$data['pekerjaan_ayah']?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Penghasilan Ayah</label>
                  <select class="form-control" name="penghasilan_ayah">
                    <option value="<?=$data['penghasilan_ayah']?>" hidden><?=$data['penghasilan_ayah']?></option>
                    <option>Kurang dari Rp500.000</option>
                    <option>Rp500.000 - Rp999.999</option>
                    <option>Rp1.000.000 - Rp1.999.999</option>
                    <option>Rp2.000.000 - Rp4.999.999</option>
                    <option>Rp5.000.000 - Rp20.000.000</option>
                    <option>Lebih dari Rp20.000.000</option>
                    <option>Tidak Berpenghasilan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="kebutuhan_khusus_ayah">Berkebutuhan Khusus Ayah</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus_ayah" value="Ya" <?php if($data['kebutuhan_khusus_ayah']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus_ayah" value="Tidak" <?php if($data['kebutuhan_khusus_ayah']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Ibu Kandung</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="control-label" for="nama_ibu">Nama Ibu</label>
              <input type="text" class="form-control" name="nama_ibu" value="<?=$data['nama_ibu']?>">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nik_ibu">NIK Ibu</label>
                  <input type="text" class="form-control" name="nik_ibu" value="<?=$data['nik_ibu']?>" >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="tahun_lahir_ibu">Tahun Lahir Ibu</label>
                  <input type="year" class="form-control" name="tahun_lahir_ibu" 
                    <?php if($data['tahun_lahir_ibu']=="0000"){?> 
                      value="<?php echo ''?>"
                    <?php
                    }else{?>
                        value="<?=$data['tahun_lahir_ibu']?>"
                    <?php
                    }
                    ?> 
                  >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Pendidikan Ibu</label>
              <input type="text" class="form-control" name="pendidikan_ibu" value="<?=$data['pendidikan_ibu']?>">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label">Pekerjaan Ibu</label>
                  <input type="text" class="form-control" name="pekerjaan_ibu" value="<?=$data['pekerjaan_ibu']?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Penghasilan Ibu</label>
                  <select class="form-control" name="penghasilan_ibu">
                    <option value="<?=$data['penghasilan_ibu']?>" hidden><?=$data['penghasilan_ibu']?></option>
                    <option>Kurang dari Rp500.000</option>
                    <option>Rp500.000 - Rp999.999</option>
                    <option>Rp1.000.000 - Rp1.999.999</option>
                    <option>Rp2.000.000 - Rp4.999.999</option>
                    <option>Rp5.000.000 - Rp20.000.000</option>
                    <option>Lebih dari Rp20.000.000</option>
                    <option>Tidak Berpenghasilan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="kebutuhan_khusus_ibu">Berkebutuhan Khusus Ibu</label>
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus_ibu" value="Ya" <?php if($data['kebutuhan_khusus_ibu']=='Ya') echo'checked'?>>
                    <label class="form-check-label">Ya</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kebutuhan_khusus_ibu" value="Tidak" <?php if($data['kebutuhan_khusus_ibu']=='Tidak') echo'checked'?>>
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Wali</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Mempunyai Wali</label>
              <select class="form-control" name="wali" id="wali" onChange="pilihWali(this)" >
                <option value="<?=$data['wali']?>" hidden><?=$data['wali']?></option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>
            <div id="wali_detail">
              <div class="form-group">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" class="form-control" name="nama_wali" value="<?=$data['nama_wali']?>">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="nik_wali">NIK Wali</label>
                    <input type="text" class="form-control" name="nik_wali" value="<?=$data['nik_wali']?>" >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tahun_lahir_wali">Tahun Lahir Wali</label>
                    <input type="year" class="form-control" name="tahun_lahir_wali" 
                      <?php if($data['tahun_lahir_wali']=="0000"){?> 
                        value="<?php echo ''?>"
                      <?php
                      }else{?>
                          value="<?=$data['tahun_lahir_wali']?>"
                      <?php
                      }
                      ?> 
                    >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Pendidikan Wali</label>
                <input type="text" class="form-control" name="pendidikan_wali" value="<?=$data['pendidikan_wali']?>">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Pekerjaan Wali</label>
                    <input type="text" class="form-control" name="pekerjaan_wali" value="<?=$data['pekerjaan_wali']?>">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Penghasilan Wali</label>
                    <select class="form-control" name="penghasilan_wali">
                      <option value="<?=$data['penghasilan_wali']?>" hidden><?=$data['penghasilan_wali']?></option>
                      <option>Kurang dari Rp500.000</option>
                      <option>Rp500.000 - Rp999.999</option>
                      <option>Rp1.000.000 - Rp1.999.999</option>
                      <option>Rp2.000.000 - Rp4.999.999</option>
                      <option>Rp5.000.000 - Rp20.000.000</option>
                      <option>Lebih dari Rp20.000.000</option>
                      <option>Tidak Berpenghasilan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="kebutuhan_khusus_wali">Berkebutuhan Khusus Wali</label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kebutuhan_khusus_wali" value="Ya" <?php if($data['kebutuhan_khusus_wali']=='Ya') echo'checked'?>>
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kebutuhan_khusus_wali" value="Tidak" <?php if($data['kebutuhan_khusus_wali']=='Tidak') echo'checked'?>>
                      <label class="form-check-label">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Kontak</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="telp_rumah">Telpon Rumah</label>
                  <input type="text" class="form-control" name="telp_rumah" value="<?=$data['telp_rumah']?>" >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" name="no_hp" value="<?=$data['no_hp']?>">
                </div>
              </div>
            </div>
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
