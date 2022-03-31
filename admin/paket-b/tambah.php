<?php
$page = "PKBM Sanggar Puri | Paket B";
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
                    <h1 class="m-0">Tambah Data Siswa Paket B</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="data.php">Paket B</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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
              <h3 class="card-title">Data Siswa</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <?php
              $tahun = date ('Y');
              $nomor = "PD".$tahun;
              // membaca kode  terbesar dari penomoran yang ada didatabase berdasarkan tahun
              $query = "SELECT MAX(RIGHT(id_user, 3)) AS id FROM siswa WHERE year(tgl_input)='$tahun'";
              $hasil = mysqli_query($conn, $query);
              $data  = mysqli_fetch_array($hasil);
              
              $no= $data['id'];
              $i = (int) substr($no, -3);
              $i++;
              
              $kode =  sprintf("%03s", $i);
              $idSiswa = $nomor.$kode;
            ?>
            <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="id">Id Siswa</label>
                <input type="text" class="form-control" name="id" value="<?php echo $idSiswa ?>" readonly>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="th_ujian">Tahun Ujian</label>
                    <select class="form-control" name="th_ujian">
                      <option hidden></option>
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
                <label class="control-label" for="jk">Jenis Kelamin</label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk" value="L">
                      <label class="form-check-label">L</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk" value="P">
                      <label class="form-check-label">P</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" name="nisn">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control" name="nis">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="control-label">Kewarganegaran</label>
                    <input type="text" class="form-control" name="kewarganegaraan">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="number" class="form-control" name="no_kk">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_akta">No Akta</label>
                <input type="text" class="form-control" name="no_akta">
              </div>
              <div class="form-group">
                <label for="kebutuhan_khusus">Berkebutuhan Khusus</label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Ya" name="kebutuhan_khusus">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="kebutuhan_khusus">
                      <label class="form-check-label">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Agama & Kepercayaan</label>
                <select class="form-control" name="agama">
                  <option hidden></option>
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
                    <input type="text" class="form-control" name="jalan" >
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="number" class="form-control" name="rt" >
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="number" class="form-control" name="rw" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="dusun">Dusun</label>
                    <input type="text" class="form-control" name="dusun" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="control-label" for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="control-label" for="desa">Desa</label>
                    <input type="text" class="form-control" name="desa" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="kd_pos">Kode Pos</label>
                    <input type="number" class="form-control" name="kd_pos" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="lintang">Lintang</label>
                    <input type="text" class="form-control" name="lintang" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="bujur">Bujur</label>
                    <input type="text" class="form-control" name="bujur" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Tempat Tinggal</label>
                <select class="form-control" name="tempat_tinggal" >
                  <option value=""  hidden></option>
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
                    <input type="number" class="form-control" name="anak_ke" >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label">Moda Transportasi</label>
                    <select class="form-control" name="transportasi" >
                      <option value=""  hidden></option>
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
                      <input class="form-check-input" type="radio" value="Ya" name="kps_pkh">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="kps_pkh">
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
                      <input class="form-check-input" type="radio" value="Ya" name="kip">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="kip">
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
                      <input class="form-check-input" type="radio" value="Ya" name="pip">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="pip">
                      <label class="form-check-label">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                    <input type="number" class="form-control" name="tb">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="bb">Berat Badan (kg)</label>
                    <input type="number" class="form-control" name="bb">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="jarak">Jarak Rumah ke Sekolah (dalam kilometer)</label>
                <input type="number" class="form-control" id="jarak" name="jarak">
              </div>
              <div class="row">
                <div class="col-6">
                    <label for="waktu_jam">Waktu Tempuh ke Sekolah (Jam / Menit)</label>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <div class="col-sm-11">
                        <input type="number" class="form-control" name="waktu_jam">
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group row">
                        <label for="waktu_jam">/</label>
                        <div class="col-sm-11">
                          <input type="number" class="form-control" name="waktu_menit">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label" for="jml_saudara">Jumlah Saudara Kandung</label>
                    <input type="number" class="form-control" name="jml_saudara" >
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
                <input type="text" class="form-control" name="nama_ayah">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="nik_ayah">NIK Ayah</label>
                    <input type="text" class="form-control" name="nik_ayah"  >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tahun_lahir_ayah">Tahun Lahir Ayah</label>
                    <input type="number" class="form-control" name="tahun_lahir_ayah">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Pendidikan Ayah</label>
                <input type="text" class="form-control" name="pendidikan_ayah">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="pekerjaan_ayah">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Penghasilan Ayah</label>
                    <select class="form-control" name="penghasilan_ayah">
                      <option hidden></option>
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
                      <input class="form-check-input" type="radio" value="Ya" name="kebutuhan_khusus_ayah">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="kebutuhan_khusus_ayah">
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
                <input type="text" class="form-control" name="nama_ibu">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="nik_ibu">NIK Ibu</label>
                    <input type="text" class="form-control" name="nik_ibu">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tahun_lahir_ibu">Tahun Lahir Ibu</label>
                    <input type="year" class="form-control" name="tahun_lahir_ibu"  >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Pendidikan Ibu</label>
                <input type="text" class="form-control" name="pendidikan_ibu">
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="pekerjaan_ibu">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="control-label">Penghasilan Ibu</label>
                    <select class="form-control" name="penghasilan_ibu">
                      <option hidden></option>
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
                      <input class="form-check-input" type="radio" value="Ya" name="kebutuhan_khusus_ibu">
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="Tidak" name="kebutuhan_khusus_ibu">
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
                <select class="form-control" name="wali" id="wali" onChange="pilihWali(this)">
                  <option value=""  hidden></option>
                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
                </select>
              </div>
              <div id="wali_detail">
                <div class="form-group">
                  <label for="nama_wali">Nama wali</label>
                  <input type="text" class="form-control" name="nama_wali">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="nik_wali">NIK wali</label>
                      <input type="text" class="form-control" name="nik_wali">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="tahun_lahir_wali">Tahun Lahir wali</label>
                      <input type="year" class="form-control" name="tahun_lahir_wali">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Pendidikan wali</label>
                  <input type="text" class="form-control" name="pendidikan_wali">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Pekerjaan wali</label>
                      <input type="text" class="form-control" name="pekerjaan_wali">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Penghasilan Wali</label>
                      <select class="form-control" name="penghasilan_wali">
                        <option hidden></option>
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
                  <label for="kebutuhan_khusus_wali">Berkebutuhan Khusus wali</label>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="Ya" name="kebutuhan_khusus_wali">
                        <label class="form-check-label">Ya</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="Tidak" name="kebutuhan_khusus_wali">
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
                    <input type="number" class="form-control" name="telp_rumah">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>No Hp</label>
                    <input type="number" class="form-control" name="no_hp"  >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="email" class="form-control" name="email"  >
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="pass" placeholder="Masukkan Password">
                    <span class="input-group-btn">
                        <button class="btn btn-default reveal" type="button" id="mybutton" onclick="change()">
                          <i class="fas fa-eye"></i>
                        </button>
                    </span>
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
