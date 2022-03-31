<?php
require "../../_config/config.php";

    if(isset($_POST['edit'])){
        $id_user=$_GET["id"];        
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));         
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));         
        $tempat_lahir = trim(mysqli_real_escape_string($conn, $_POST['tempat_lahir']));         
        $tgl_lahir = trim(mysqli_real_escape_string($conn, $_POST['tgl_lahir']));         
        $paket = trim(mysqli_real_escape_string($conn, $_POST['paket']));
        $th_ujian = trim(mysqli_real_escape_string($conn, $_POST['th_ujian']));
        $no_hp = trim(mysqli_real_escape_string($conn, $_POST['no_hp']));
        $status = trim(mysqli_real_escape_string($conn, $_POST['status']));
        $daftar_ulang = trim(mysqli_real_escape_string($conn, $_POST['daftar_ulang']));
        
         $query ="UPDATE user, siswa SET user.email='$email', user.nama='$nama', user.jk='$jk', user.no_hp='$no_hp', user.status='$status', 
         siswa.id_paket='$paket', siswa.th_ujian='$th_ujian', siswa.tempat_lahir='$tempat_lahir', siswa.tgl_lahir='$tgl_lahir', 
         siswa.daftar_ulang='$daftar_ulang' WHERE user.id_user='$id_user' AND siswa.id_user='$id_user'";
        
        if (mysqli_query($conn, $query)){
            echo "<script>window.location='data.php?message=Data Berhasil Disimpan';</script>";
            exit();
        }else{
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Gagal Disimpan';</script>";
        }
    }
?>