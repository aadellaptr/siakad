<?php
require "../_config/config.php";
include "../function/function.php";

  if(isset($_POST['login'])){
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $pass= trim(mysqli_real_escape_string($conn, $_POST['password']));
    $sql_login = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'") or die (mysqli_error($conn));
    
    if(mysqli_num_rows($sql_login) >= 1){
      $akun = mysqli_fetch_assoc($sql_login);
      if(password_verify($pass, $akun['password'])){
        $_SESSION['user'] = $akun;
        switch($akun['level']){
          case 'admin';
          echo "<script>window.location='../admin/dashboard/index.php';</script>";
          break;
          case 'tendik';
          echo "<script>window.location='../admin/dashboard/index.php';</script>";
          break;
          case 'siswa';
          if($akun['status']=='1'){
             unset($_SESSION["user"]);
            echo "<script>window.location='pembayaran.php';</script>";
            break;
          }else{
            echo "<script>window.location.href='../siswa/dashboard/index.php?id=".$akun['id_user']."';</script>";
            break;
          }
        }
      }else{ 
        $_SESSION["alert-danger"]="Password Salah";
      }
    }else{
      $_SESSION["alert-danger"]="Email atau Password Salah";
    }
  }

  if(isset($_POST['request'])){
    $email  = trim(mysqli_real_escape_string($conn, $_POST['email']));
   
    $query =  mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    
    if(mysqli_num_rows($query) < 1){
      $_SESSION["alert-danger"]="Email: <b>$email</b> belum terdaftar";
    }else{
      $token_ganti_password   = md5(rand(0,1000));
      $judul_email            = "Ganti Password";
      $isi_email              = "Seseorang meminta untuk melakukan perubahan password. Silakan klik link di bawah ini:<br/>";
      $isi_email              .= url_dasar()."/ganti-password.php?email=$email&token=$token_ganti_password";
      
      kirim_email($email,$email,$judul_email,$isi_email);

      $query     = mysqli_query($conn, "UPDATE user set token_ganti_password = '$token_ganti_password' where email = '$email'");

      $_SESSION["alert-success"]="Link Ganti Password Sudah Dikirimkan ke Email Anda.";
    }
  }


if(isset($_POST['submit'])){
  $email=$_GET["email"];
  $password   = $_POST['password'];
  $konfirmasi_password = $_POST['password2'];
  $pass_hash = password_hash($password, PASSWORD_DEFAULT);

  if($password !=$konfirmasi_password){
    $_SESSION["alert-danger"]="Konfirmasi Password Tidak Sesuai!";
    return false;
  }
  $sql_pass="UPDATE user SET token_ganti_password='', password = '$pass_hash' WHERE  email = '$email'";

  $query_pass=mysqli_query($conn, $sql_pass);

  if($query_pass){
    echo "<script>window.location='login.php?msg=Password Berhasil Diubah, Silahkan Login Kembali';</script>";
  }else{
    $_SESSION["alert-danger"]="Gagal Mengubah Password";
  } 
}
?>