<?php
require "../../_config/config.php";

  if(isset($_POST['simpan'])){
    $id_user=$_GET["id"];       
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));         
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));         
    $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));

    // foto
    if($_FILES['foto']['name']!=''){
      $ekstensi_diperbolehkan = array('png','jpg');
      $nama_foto = $_FILES['foto']['name'];
      // profile.png
      $x = explode('.',$nama_foto);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['foto']['size'];
      $file_tmp = $_FILES['foto']['tmp_name'];

      $ubah_nama = $nama.'.'.$ekstensi;

      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran<1044070){
          move_uploaded_file($file_tmp, 'uploads/'.$ubah_nama);

          $sql_foto = "UPDATE user set foto = '$ubah_nama' WHERE id_user='$id_user'";

          $query_foto = mysqli_query($conn, $sql_foto);

          if($query_foto){
            $_SESSION["alert-success"]="Data Berhasil Disimpan";
          }else{
            $_SESSION["alert-danger"]="Gagal Upload";
          }
        }else{
          $_SESSION["alert-danger"]="Gambar Terlalu Besar";
        }
      }else{
        $_SESSION["alert-danger"]="Ekstensi foto harus PNG/JPG";
      }
    }

      $query = "UPDATE user SET nama='$nama', email='$username', jk='$jk', no_hp='$telp' WHERE id_user = '$id_user'";

      if (mysqli_query($conn, $query)){
        // die (mysqli_error($conn));
        $_SESSION["alert-success"]="Data Berhasil Disimpan";
      }else{
        // die (mysqli_error($conn));
        $_SESSION["alert-danger"]="Data Gagal Disimpan";
      }
  }

  if(isset($_POST['ubah'])){  
    $id_user=$_GET["id"];
    $oldpass = trim(mysqli_real_escape_string($conn, $_POST['oldpass']));         
    $pass = trim(mysqli_real_escape_string($conn, $_POST['password']));         
    $pass2 = trim(mysqli_real_escape_string($conn, $_POST['password2']));
    $passwrd_hash = password_hash($pass2, PASSWORD_DEFAULT);         

    //cek konfirm password
    if ($pass != $pass2){
      $_SESSION["alert-danger"]="Konfirmasi Password Tidak Sesuai!";
      return false;
    }

    if(password_verify($oldpass, $_SESSION['user']['password'])){
      $sql_pass="UPDATE user SET password = '$passwrd_hash' WHERE  id_user = '$id_user'";

      $query_pass=mysqli_query($conn, $sql_pass);

      if($query_pass){
        echo "<script>window.location='../../log/logout.php?msg=Password Berhasil Diubah, Silahkan Login Kembali';</script>";
      }else{
        $_SESSION["alert-danger"]="Gagal Mengubah Password";
      }
    }else{
      $_SESSION["alert-danger"]="Password Salah!";
    }
  }
?>