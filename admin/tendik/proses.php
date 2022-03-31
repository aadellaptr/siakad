<?php
require "../../_config/config.php";

    if(isset($_POST['tambah'])){
        $id_user = trim(mysqli_real_escape_string($conn, $_POST['kode']));         
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
        $username = trim(mysqli_real_escape_string($conn, $_POST['username']));         
        $pass = trim(mysqli_real_escape_string($conn, $_POST['password']));
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));         
        $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
        $level ='tendik';
        $status ='2';
        
        $query = mysqli_query($conn, "INSERT INTO user (id_user, email, password, nama, jk, no_hp, level, status) VALUES ('$id_user','$username','$pass_hash','$nama', '$jk', '$telp','$level','$status')");
        
        if ($query){
            echo "<script>window.location='data.php?message=Data Berhasil Ditambahkan';</script>";
            exit();
        }else{
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Gagal Disimpan';</script>";
        }
    
    }else if(isset($_POST['edit'])){
        $id_user=$_GET["id"];       
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));         
        $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
        
        $query = "UPDATE user SET nama='$nama', jk='$jk', no_hp='$telp' WHERE id_user = '$id_user'";

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