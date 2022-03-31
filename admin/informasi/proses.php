<?php
require "../../_config/config.php";

  $query = "SELECT MAX(RIGHT(id_info, 2)) AS id FROM informasi";
  $hasil = mysqli_query($conn, $query);
  $data  = mysqli_fetch_array($hasil);
if(isset($_POST['tambah'])){
  
  $number = '1234567890';
  $shuffle  = str_shuffle($number);

  $no= $data['id'];
  $i = (int) substr($no, -2);
  $i++;
  
  $kode =  sprintf("%02s", $i);
  $id_info = $shuffle.$kode;      
  $judul = trim(mysqli_real_escape_string($conn, $_POST['judul']));         
  $isi = trim(mysqli_real_escape_string($conn, $_POST['isi']));
  $date = date('Y-m-d');

  // foto
  if($_FILES['cover']['name']!=''){
    $ekstensi_diperbolehkan = array('jpeg','jpg', 'png');
    $nama_foto = $_FILES['cover']['name'];
    // profile.png
    $x = explode('.',$nama_foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['cover']['size'];
    $file_tmp = $_FILES['cover']['tmp_name'];

    $ubah_nama = $judul.'.'.$ekstensi;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      move_uploaded_file($file_tmp, '../../../dist/img/'.$ubah_nama);

      $sql = "INSERT INTO informasi VALUES ('$id_info', '$judul', '$ubah_nama', '$isi', '$date')";

      $query = mysqli_query($conn, $sql);

      if($query){
        // die (mysqli_error($conn));
        $_SESSION["alert-success"]="Data Berhasil Disimpan";
      }else{
        // die (mysqli_error($conn));
        $_SESSION["alert-danger"]="Gagal Upload";
      }
    }else{
      // die (mysqli_error($conn));
      $_SESSION["alert-danger"]="Ekstensi foto harus PNG/JPG/JPEG";
    }
  }
}

if(isset($_POST['edit'])){
  $id_info=$_GET["id"];       
  $judul = trim(mysqli_real_escape_string($conn, $_POST['judul']));         
  $isi = trim(mysqli_real_escape_string($conn, $_POST['isi']));

  // foto
  if($_FILES['cover']['name']!=''){
    $ekstensi_diperbolehkan = array('jpeg','jpg', 'png');
    $nama_foto = $_FILES['cover']['name'];
    // profile.png
    $x = explode('.',$nama_foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['cover']['size'];
    $file_tmp = $_FILES['cover']['tmp_name'];

    $ubah_nama = $judul.'.'.$ekstensi;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      move_uploaded_file($file_tmp, '../../../dist/img/'.$ubah_nama);

      $sql_foto = "UPDATE informasi set cover = '$ubah_nama' WHERE id_info='$id_info'";

      $query_foto = mysqli_query($conn, $sql_foto);

      if($query_foto){
        $_SESSION["alert-success"]="Data Berhasil Disimpan";
      }else{
        $_SESSION["alert-danger"]="Gagal Upload";
      }
    }else{
      $_SESSION["alert-danger"]="Ekstensi foto harus PNG/JPG/JPEG";
    }
  }

  $query = "UPDATE informasi SET judul='$judul', isi='$isi' WHERE id_info = '$id_info'";

  if (mysqli_query($conn, $query)){
    // die (mysqli_error($conn));
    $_SESSION["alert-success"]="Data Berhasil Disimpan";
  }else{
    // die (mysqli_error($conn));
    $_SESSION["alert-danger"]="Data Gagal Disimpan";
  }
}
?>