<?php
require "../../_config/config.php";

    if(isset($_POST['tambah'])){
        $id_user = trim(mysqli_real_escape_string($conn, $_POST['id']));         
        $id_paket = "2";         
        $th_ujian = trim(mysqli_real_escape_string($conn, $_POST['th_ujian']));
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));
        $nisn= trim(mysqli_real_escape_string($conn, $_POST['nisn']));
        $nis= trim(mysqli_real_escape_string($conn, $_POST['nis']));
        $kewarganegaraan = trim(mysqli_real_escape_string($conn, $_POST['kewarganegaraan']));
        $nik = trim(mysqli_real_escape_string($conn, $_POST['nik']));
        $no_kk = trim(mysqli_real_escape_string($conn, $_POST['no_kk']));
        $tempat_lahir = trim(mysqli_real_escape_string($conn, $_POST['tempat_lahir']));         
        $tgl_lahir = trim(mysqli_real_escape_string($conn, $_POST['tgl_lahir']));         
        $no_akta= trim(mysqli_real_escape_string($conn, $_POST['no_akta']));        
        if (empty($_POST['kebutuhan_khusus'])){
            $kebutuhan_khusus ="";
        }else{ 
        $kebutuhan_khusus = $_POST['kebutuhan_khusus'];
        }         
        $agama = trim(mysqli_real_escape_string($conn, $_POST['agama']));         
        $jalan = trim(mysqli_real_escape_string($conn, $_POST['jalan']));         
        $rt = trim(mysqli_real_escape_string($conn, $_POST['rt']));         
        $rw = trim(mysqli_real_escape_string($conn, $_POST['rw']));         
        $dusun = trim(mysqli_real_escape_string($conn, $_POST['dusun']));         
        $kecamatan = trim(mysqli_real_escape_string($conn, $_POST['kecamatan']));         
        $desa = trim(mysqli_real_escape_string($conn, $_POST['desa']));         
        $kd_pos = trim(mysqli_real_escape_string($conn, $_POST['kd_pos']));         
        $lintang = trim(mysqli_real_escape_string($conn, $_POST['lintang']));         
        $bujur = trim(mysqli_real_escape_string($conn, $_POST['bujur']));         
        $tempat_tinggal = trim(mysqli_real_escape_string($conn, $_POST['tempat_tinggal']));         
        $tb = trim(mysqli_real_escape_string($conn, $_POST['tb']));         
        $bb = trim(mysqli_real_escape_string($conn, $_POST['bb']));      
        $jarak = trim(mysqli_real_escape_string($conn, $_POST['jarak']));
        $waktu_jam = trim(mysqli_real_escape_string($conn, $_POST['waktu_jam']));
        $waktu_menit = trim(mysqli_real_escape_string($conn, $_POST['waktu_menit']));
        $transportasi = trim(mysqli_real_escape_string($conn, $_POST['transportasi']));
        $anak_ke = trim(mysqli_real_escape_string($conn, $_POST['anak_ke']));
        $jml_saudara = trim(mysqli_real_escape_string($conn, $_POST['jml_saudara']));
        if (empty($_POST['kps_pkh'])){
            $kps_pkh ="";
        }else{ 
        $kps_pkh = $_POST['kps_pkh'];
        }
        if (empty($_POST['kip'])){
            $kip ="";
        }else{ 
        $kip = $_POST['kip'];
        }
        if (empty($_POST['pip'])){
            $pip ="";
        }else{ 
        $pip= $_POST['pip'];
        }
        $nama_ayah = trim(mysqli_real_escape_string($conn, $_POST['nama_ayah']));
        $nik_ayah = trim(mysqli_real_escape_string($conn, $_POST['nik_ayah']));
        $tahun_lahir_ayah = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_ayah']));
        $pendidikan_ayah = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_ayah']));
        $pekerjaan_ayah = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_ayah']));
        $penghasilan_ayah = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_ayah']));
        if (empty($_POST['kebutuhan_khusus_ayah'])){
            $kebutuhan_khusus_ayah ="";
        }else{ 
        $kebutuhan_khusus_ayah = $_POST['kebutuhan_khusus_ayah'];
        }
        $nama_ibu = trim(mysqli_real_escape_string($conn, $_POST['nama_ibu']));
        $nik_ibu = trim(mysqli_real_escape_string($conn, $_POST['nik_ibu']));
        $tahun_lahir_ibu = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_ibu']));
        $pendidikan_ibu = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_ibu']));
        $pekerjaan_ibu = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_ibu']));
        $penghasilan_ibu = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_ibu']));
        if (empty($_POST['kebutuhan_khusus_ibu'])){
            $kebutuhan_khusus_ibu ="";
        }else{ 
        $kebutuhan_khusus_ibu = $_POST['kebutuhan_khusus_ibu'];
        }
        $wali = trim(mysqli_real_escape_string($conn, $_POST['wali']));
        $nama_wali = trim(mysqli_real_escape_string($conn, $_POST['nama_wali']));
        $nik_wali = trim(mysqli_real_escape_string($conn, $_POST['nik_wali']));
        $tahun_lahir_wali = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_wali']));
        $pendidikan_wali = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_wali']));
        $pekerjaan_wali = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_wali']));
        $penghasilan_wali = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_wali']));
        if (empty($_POST['kebutuhan_khusus_wali'])){
            $kebutuhan_khusus_wali ="";
        }else{ 
        $kebutuhan_khusus_wali = $_POST['kebutuhan_khusus_wali'];
        }
        $telp_rumah = trim(mysqli_real_escape_string($conn, $_POST['telp_rumah']));         
        $no_hp = trim(mysqli_real_escape_string($conn, $_POST['no_hp']));         
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));         
        $pass = trim(mysqli_real_escape_string($conn, $_POST['password']));
        $passwrd_hash = password_hash($pass, PASSWORD_DEFAULT);
        $tahun_masuk = date('Y');      
        $tgl_input = date('Y-m-d');
        $level = "siswa";
        $status = "2";
        $daftar_ulang = "2";
        
        $query = mysqli_query($conn, "INSERT INTO user (id_user, email, password, nama, jk, no_hp, level, status) VALUES ('$id_user', '$email','$passwrd_hash', '$nama', '$jk', '$no_hp', '$level', '$status')");

        $query .= mysqli_query($conn, "INSERT INTO siswa (id_user, id_paket, th_ujian, nisn, nis, kewarganegaraan, nik, no_kk, tempat_lahir, tgl_lahir, 
        no_akta, kebutuhan_khusus, agama, jalan, rt, rw, dusun, kecamatan, desa, kd_pos, lintang, bujur, tempat_tinggal,         
        tb, bb, jarak, waktu_jam, waktu_menit, transportasi, anak_ke, jml_saudara, kps_pkh, kip, 
        pip, nama_ayah, nik_ayah, tahun_lahir_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, kebutuhan_khusus_ayah, 
        nama_ibu, nik_ibu, tahun_lahir_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, kebutuhan_khusus_ibu, wali, 
        nama_wali, nik_wali, tahun_lahir_wali, pendidikan_wali, pekerjaan_wali, penghasilan_wali, kebutuhan_khusus_wali, 
        telp_rumah, tahun_masuk, tgl_input, daftar_ulang) VALUES ('$id_user', '$id_paket','$th_ujian','$nisn', '$nis','$kewarganegaraan','$nik','$no_kk', '$tempat_lahir', '$tgl_lahir',
        '$no_akta','$kebutuhan_khusus','$agama','$jalan','$rt','$rw','$dusun','$kecamatan','$desa','$kd_pos','$lintang','$bujur','$tempat_tinggal',        
        '$tb','$bb','$jarak','$waktu_jam','$waktu_menit','$transportasi','$anak_ke','$jml_saudara','$kps_pkh','$kip',
        '$pip','$nama_ayah','$nik_ayah','$tahun_lahir_ayah','$pendidikan_ayah','$pekerjaan_ayah','$penghasilan_ayah','$kebutuhan_khusus_ayah',
        '$nama_ibu','$nik_ibu','$tahun_lahir_ibu','$pendidikan_ibu','$pekerjaan_ibu','$penghasilan_ibu','$kebutuhan_khusus_ibu','$wali',
        '$nama_wali','$nik_wali','$tahun_lahir_wali','$pendidikan_wali','$pekerjaan_wali','$penghasilan_wali','$kebutuhan_khusus_wali',
        '$telp_rumah','$tahun_masuk','$tgl_input', '$daftar_ulang')");

        if ($query){
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Berhasil Ditambahkan';</script>";
            exit();
        }else{
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Gagal Ditambahkan';</script>";
        }

    }else if(isset($_POST['edit'])){
        $id_user=$_GET["id"];       
        $id_paket = trim(mysqli_real_escape_string($conn, $_POST['id_paket']));         
        $th_ujian = trim(mysqli_real_escape_string($conn, $_POST['th_ujian']));         
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));
        $nisn = trim(mysqli_real_escape_string($conn, $_POST['nisn']));
        $nis = trim(mysqli_real_escape_string($conn, $_POST['nis']));
        $kewarganegaraan = trim(mysqli_real_escape_string($conn, $_POST['kewarganegaraan']));
        $nik = trim(mysqli_real_escape_string($conn, $_POST['nik']));
        $no_kk = trim(mysqli_real_escape_string($conn, $_POST['no_kk']));
        $tempat_lahir = trim(mysqli_real_escape_string($conn, $_POST['tempat_lahir']));         
        $tgl_lahir = trim(mysqli_real_escape_string($conn, $_POST['tgl_lahir']));         
        $no_akta= trim(mysqli_real_escape_string($conn, $_POST['no_akta']));         
        if (empty($_POST['kebutuhan_khusus'])){
            $kebutuhan_khusus ="";
        }else{ 
        $kebutuhan_khusus = $_POST['kebutuhan_khusus'];
        }           
        $agama = trim(mysqli_real_escape_string($conn, $_POST['agama']));         
        $jalan = trim(mysqli_real_escape_string($conn, $_POST['jalan']));         
        $rt = trim(mysqli_real_escape_string($conn, $_POST['rt']));         
        $rw = trim(mysqli_real_escape_string($conn, $_POST['rw']));         
        $dusun = trim(mysqli_real_escape_string($conn, $_POST['dusun']));         
        $kecamatan = trim(mysqli_real_escape_string($conn, $_POST['kecamatan']));         
        $desa = trim(mysqli_real_escape_string($conn, $_POST['desa']));         
        $kd_pos = trim(mysqli_real_escape_string($conn, $_POST['kd_pos']));         
        $lintang = trim(mysqli_real_escape_string($conn, $_POST['lintang']));         
        $bujur = trim(mysqli_real_escape_string($conn, $_POST['bujur']));         
        $tempat_tinggal = trim(mysqli_real_escape_string($conn, $_POST['tempat_tinggal']));         
        $tb = trim(mysqli_real_escape_string($conn, $_POST['tb']));         
        $bb = trim(mysqli_real_escape_string($conn, $_POST['bb']));                
        $jarak = trim(mysqli_real_escape_string($conn, $_POST['jarak']));
        $waktu_jam = trim(mysqli_real_escape_string($conn, $_POST['waktu_jam']));
        $waktu_menit = trim(mysqli_real_escape_string($conn, $_POST['waktu_menit']));
        $transportasi = trim(mysqli_real_escape_string($conn, $_POST['transportasi']));
        $anak_ke = trim(mysqli_real_escape_string($conn, $_POST['anak_ke']));
        $jml_saudara = trim(mysqli_real_escape_string($conn, $_POST['jml_saudara']));
        
        if (empty($_POST['kps_pkh'])){
            $kps_pkh ="";
        }else{ 
        $kps_pkh = $_POST['kps_pkh'];
        }
        
        if (empty($_POST['kip'])){
            $kip ="";
        }else{ 
        $kip = $_POST['kip'];
        }
       
        if (empty($_POST['pip'])){
            $pip ="";
        }else{ 
        $pip = $_POST['pip'];
        }
        
        $nama_ayah = trim(mysqli_real_escape_string($conn, $_POST['nama_ayah']));
        $nik_ayah = trim(mysqli_real_escape_string($conn, $_POST['nik_ayah']));
        $tahun_lahir_ayah = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_ayah']));
        $pendidikan_ayah = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_ayah']));
        $pekerjaan_ayah = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_ayah']));
        $penghasilan_ayah = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_ayah']));
        if (empty($_POST['kebutuhan_khusus_ayah'])){
            $kebutuhan_khusus_ayah ="";
        }else{ 
        $kebutuhan_khusus_ayah = $_POST['kebutuhan_khusus_ayah'];
        }
        $nama_ibu = trim(mysqli_real_escape_string($conn, $_POST['nama_ibu']));
        $nik_ibu = trim(mysqli_real_escape_string($conn, $_POST['nik_ibu']));
        $tahun_lahir_ibu = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_ibu']));
        $pendidikan_ibu = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_ibu']));
        $pekerjaan_ibu = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_ibu']));
        $penghasilan_ibu = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_ibu']));
        if (empty($_POST['kebutuhan_khusus_ibu'])){
            $kebutuhan_khusus_ibu ="";
        }else{ 
        $kebutuhan_khusus_ibu = $_POST['kebutuhan_khusus_ibu'];
        }
        $wali = trim(mysqli_real_escape_string($conn, $_POST['wali']));
        $nama_wali = trim(mysqli_real_escape_string($conn, $_POST['nama_wali']));
        $nik_wali = trim(mysqli_real_escape_string($conn, $_POST['nik_wali']));
        $tahun_lahir_wali = trim(mysqli_real_escape_string($conn, $_POST['tahun_lahir_wali']));
        $pendidikan_wali = trim(mysqli_real_escape_string($conn, $_POST['pendidikan_wali']));
        $pekerjaan_wali = trim(mysqli_real_escape_string($conn, $_POST['pekerjaan_wali']));
        $penghasilan_wali = trim(mysqli_real_escape_string($conn, $_POST['penghasilan_wali']));
        if (empty($_POST['kebutuhan_khusus_wali'])){
            $kebutuhan_khusus_wali ="";
        }else{ 
        $kebutuhan_khusus_wali = $_POST['kebutuhan_khusus_wali'];
        }
        $telp_rumah = trim(mysqli_real_escape_string($conn, $_POST['telp_rumah']));         
        $no_hp = trim(mysqli_real_escape_string($conn, $_POST['no_hp']));         
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        
        $query ="UPDATE user, siswa SET user.email='$email', user.nama='$nama', user.jk='$jk', user.no_hp='$no_hp', siswa.id_paket='$id_paket', siswa.th_ujian='$th_ujian', siswa.nisn='$nisn', siswa.nis='$nis',kewarganegaraan='$kewarganegaraan', siswa.nik='$nik', siswa.no_kk='$no_kk', siswa.tempat_lahir='$tempat_lahir', siswa.tgl_lahir='$tgl_lahir',
         siswa.no_akta='$no_akta', siswa.kebutuhan_khusus='$kebutuhan_khusus', siswa.agama='$agama', siswa.jalan='$jalan', siswa.rt='$rt', siswa.rw='$rw', siswa.dusun='$dusun', siswa.kecamatan='$kecamatan', siswa.desa='$desa', siswa.kd_pos='$kd_pos', siswa.lintang='$lintang', siswa.bujur='$bujur', siswa.tempat_tinggal='$tempat_tinggal',       
         siswa.tb='$tb', siswa.bb='$bb', siswa.jarak='$jarak', siswa.waktu_jam='$waktu_jam', siswa.waktu_menit='$waktu_menit', siswa.transportasi='$transportasi', siswa.anak_ke='$anak_ke', siswa.jml_saudara='$jml_saudara', siswa.kps_pkh='$kps_pkh', siswa.kip='$kip',
         siswa.pip='$pip', siswa.nama_ayah='$nama_ayah', siswa.nik_ayah='$nik_ayah', siswa.tahun_lahir_ayah='$tahun_lahir_ayah', siswa.pendidikan_ayah='$pendidikan_ayah', siswa.pekerjaan_ayah='$pekerjaan_ayah', siswa.penghasilan_ayah='$penghasilan_ayah', siswa.kebutuhan_khusus_ayah='$kebutuhan_khusus_ayah',
         siswa.nama_ibu='$nama_ibu', siswa.nik_ibu='$nik_ibu', siswa.tahun_lahir_ibu='$tahun_lahir_ibu', siswa.pendidikan_ibu='$pendidikan_ibu', siswa.pekerjaan_ibu='$pekerjaan_ibu', siswa.penghasilan_ibu='$penghasilan_ibu', siswa.kebutuhan_khusus_ibu='$kebutuhan_khusus_ibu', siswa.wali='$wali',
         siswa.nama_wali='$nama_wali', siswa.nik_wali='$nik_wali', siswa.tahun_lahir_wali='$tahun_lahir_wali', siswa.pendidikan_wali='$pendidikan_wali', siswa.pekerjaan_wali='$pekerjaan_wali', siswa.penghasilan_wali='$penghasilan_wali', siswa.kebutuhan_khusus_wali='$kebutuhan_khusus_wali',
         siswa.telp_rumah='$telp_rumah' WHERE user.id_user='$id_user' AND siswa.id_user='$id_user'";

        if (mysqli_query($conn, $query)){
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Berhasil Disimpan';</script>";
            exit();
        }else{
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Gagal Disimpan';</script>";
        } 
    }
?>