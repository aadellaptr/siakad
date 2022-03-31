<?php
    require "../../_config/config.php";

   $query = "DELETE FROM modul WHERE id_modul ='$_GET[id]'";
   if (mysqli_query($conn, $query)){
        echo "<script>window.location='data.php?message=Data Berhasil Dihapus';</script>";
        exit();
    }else{
        // die (mysqli_error($conn));
        echo "<script>window.location='data.php?message=Data Gagal Dihapus';</script>";
    }
?>