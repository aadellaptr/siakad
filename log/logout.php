<?php
  session_start();
  unset($_SESSION["user"]);
  
  if(isset($_GET["msg"])){ 
    $pesan=$_GET["msg"];
    echo "<script>window.location='login.php?msg=$pesan';</script>";
  }else{
    echo "<script>window.location='login.php';</script>";
  }
?>