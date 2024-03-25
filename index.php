<?php
  include 'connection.php';

  $query = "SELECT * FROM tb_siswa;";
  $sql = mysqli_query($conn, $query);
  $no = 0;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar CRUD Siswa</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
  <link href="assets/fontawesome-free-6.5.1-web/css/fontawesome.css" rel="stylesheet" />
  <link href="assets/fontawesome-free-6.5.1-web/css/brands.css" rel="stylesheet" />
  <link href="assets/fontawesome-free-6.5.1-web/css/solid.css" rel="stylesheet" />
  </head>
  <body>
    <header>
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD - BS5
          </a>
        </div>
      </nav>
    </header>
    <main class="container">
      <h1 class="mt-4">Data Siswa</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Berisi data yang telah disimpan di database.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create Read Update Delete</cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary mb-4"><i class="fa-solid fa-user-plus"></i> Tambah Data</a>
      <div class="table-responsive">
        <table class="table align-middle text-center table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th>No.</th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Foto Siswa</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql)) {
          ?>
            <tr>
              <td>
                <?php
                  echo ++$no;
                ?>
              </td>
              <td>
                <?php
                  echo $result['nisn'];
                ?>
              </td>
              <td>
                <?php
                  echo $result['nama_siswa'];
                ?>
              </td>
              <td>
                <?php
                  echo $result['gender'];
                ?>
              </td>
              <td><img src="img/<?php echo $result['foto_siswa']; ?>" alt="" style="width: 150px;"></td>
              <td>
                <?php
                  echo $result['alamat'];
                ?>
              </td>
              <td>
                <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus??')"><i class="fa-solid fa-trash"></i></a>
                <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>"  type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-square-pen"></i></a>
              </td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </main>
    <footer>

    </footer>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>