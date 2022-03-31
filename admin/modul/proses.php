<?php
require "../../_config/config.php";

    if(isset($_POST['tambah'])){
        $pdf=$_FILES["buku"]["name"];
        $lokasimodul =$_FILES["buku"]["tmp_name"];
        move_uploaded_file($lokasimodul, "../../modul/$pdf");

        $id_modul = trim(mysqli_real_escape_string($conn, $_POST['kode']));         
        $id_paket = trim(mysqli_real_escape_string($conn, $_POST['id_paket']));         
        $mapel = trim(mysqli_real_escape_string($conn, $_POST['mapel']));
        $judul = trim(mysqli_real_escape_string($conn, $_POST['judul']));         
        $hal = trim(mysqli_real_escape_string($conn, $_POST['hal']));

        $query = "INSERT INTO modul VALUES ('$id_modul','$id_paket','$mapel', '$judul', '$hal', '$pdf')";
        
        if (mysqli_query($conn, $query)){
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Berhasil Ditambahkan';</script>";
            exit();
        }else{
            // die (mysqli_error($conn));
            echo "<script>window.location='data.php?message=Data Gagal Disimpan';</script>";
        }
    
    }else if(isset($_POST['edit'])){

        $id_modul=$_GET["id"];               
        $id_paket = trim(mysqli_real_escape_string($conn, $_POST['id_paket']));         
        $mapel = trim(mysqli_real_escape_string($conn, $_POST['mapel']));
        $judul = trim(mysqli_real_escape_string($conn, $_POST['judul']));         
        $hal = trim(mysqli_real_escape_string($conn, $_POST['hal']));

        // file
        if($_FILES['pdf']['name']!=''){
            $pdf=$_FILES["pdf"]["name"];
            $lokasimodul =$_FILES["pdf"]["tmp_name"];

            move_uploaded_file($lokasimodul, "../../modul/$pdf");

            $query = "UPDATE modul set pdf = '$pdf' WHERE id_modul='$id_modul'";
            if (mysqli_query($conn, $query)){
                    
            }else{
                $_SESSION["alert-danger"]="Gagal Upload Modul"; die;
            }
        }
        
        $query = "UPDATE modul SET id_paket='$id_paket', mapel='$mapel', judul ='$judul', hal='$hal' WHERE id_modul = '$id_modul'";

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