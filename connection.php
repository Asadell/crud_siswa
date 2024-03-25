<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'belajar_db_sekolah';

  $conn = mysqli_connect($host, $user, $pass, $db);

  mysqli_select_db($conn, $db);
?>