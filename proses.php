<?php
  include "connection.php";

  if(isset($_POST['aksi'])){
    $nisn = $_POST['nisn'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $photo = $_FILES['photo']['name'];
    $address = $_POST['address'];
    
    if($_POST['aksi'] == 'add'){
      // var_dump($_POST);
      // die();
      
      $dir = "img/";
      $tempFile = $_FILES['photo']['tmp_name'];
      move_uploaded_file($tempFile, $dir.$photo);
      
      $query = "INSERT INTO `tb_siswa` VALUES (NULL, '$nisn', '$name', '$gender', '$photo', '$address');";
      $sql = mysqli_query($conn, $query);

      if($sql) {
        header("location: index.php");
      } else {
        echo $query;
      }
    } else if($_POST['aksi'] == 'edit') {
      // var_dump($_POST);
      // die();
      $id = $_POST['id'];
      $query = '';
      
      $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id';";
      $sqlShow = mysqli_query($conn, $queryShow);
      $result = mysqli_fetch_assoc($sqlShow);
      
      if($_FILES['photo']['name']){
        // $photo = $_FILES['photo']['name'];
        $query = "UPDATE `tb_siswa` SET `nisn`='$nisn',`nama_siswa`='$name',`gender`='$gender',`foto_siswa`='$photo',`alamat`='$address' WHERE `id_siswa` = '$id';";
        unlink("img/".$result['foto_siswa']);
        
        $dir = "img/";
        $tempFile = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tempFile, $dir.$photo);
        echo "Ada file";
      }else {
        // $photo = $result['foto_siswa'];
        $query = "UPDATE `tb_siswa` SET `nisn`='$nisn',`nama_siswa`='$name',`gender`='$gender',`alamat`='$address' WHERE `id_siswa` = '$id';";
        echo "Tidak ada file";
      }
      // die();
      $sql = mysqli_query($conn, $query);
      // die();
      if($sql) {
        header("location: index.php");
      } else {
        echo $query;
      }
    }
  }
  if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['foto_siswa']);

    $query = "DELETE FROM `tb_siswa` WHERE id_siswa = '$id';";
    $sql = mysqli_query($conn, $query);

    if($sql) {
      // echo $query; 
      header("location: index.php");
    } else {
      echo $query;
    }
  }
  // var_dump($_POST);
      // die();
?>