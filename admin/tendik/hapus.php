<?php
    require "../../_config/config.php";

    $query = "DELETE FROM user WHERE id_user ='$_GET[id]'";
    if (mysqli_query($conn, $query)){
        echo "<script>window.location='data.php?message=Data Berhasil Dihapus';</script>";
        exit();
    }else{
        echo "<script>window.location='data.php?message=Data Gagal Dihapus';</script>";
    }
?>