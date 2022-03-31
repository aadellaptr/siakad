<?php
    require "../../_config/config.php";

    $id_user=$_GET["id"];  
    $query = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
    $query .= mysqli_query($conn, "DELETE FROM siswa WHERE id_user='$id_user'");
   
   if ($query){
        echo "<script>window.location='data.php?message=Data Berhasil Dihapus';</script>";
        exit();
    }else{
        // die (mysqli_error($conn));
        echo "<script>window.location='data.php?message=Data Gagal Dihapus';</script>";
    }
?>