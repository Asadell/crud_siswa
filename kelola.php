<!doctype html>
<?php
  include 'connection.php';

  $id = '';
  $nisn = '';
  $name = '';
  $gender = '';
  $photo = '';
  $address = '';

  if(isset($_GET['ubah'])){
    $id = $_GET['ubah'];

    $query = "SELECT * FROM `tb_siswa` WHERE id_siswa = $id";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $name = $result['nama_siswa'];
    $gender = $result['gender'];
    $photo = $result['foto_siswa'];
    $address = $result['alamat'];
  }
?>
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
            Kelola Data
          </a>
        </div>
      </nav>
    </header>
    <main class="container">
      <h1 class="mb-3">Isi Data Siswa</h1>
      <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="mb-3 row">
          <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
          <div class="col-sm-10">
            <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex: 112233" required value="<?php echo $nisn; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Nama Siswa</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Ex: Alexander Kurniawan" required value="<?php echo $name; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select class="form-select" name="gender" id="gender" required>
              <option <?php if($gender == 'Laki-laki'){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
              <option <?php if($gender == 'Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="photo" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-10">
            <div class="mb-3 mt-1">
              <input class="form-control" name="photo" type="file" id="photo" accept="image/*" <?php if(!isset($_GET['ubah'])){echo "required";} ?>>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="address" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="address" id="address" rows="3" required ><?php echo $address; ?></textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col">
            <?php
              if(isset($_GET['ubah'])){
            ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa-solid fa-file-import"></i> Simpan Perubahan</button>
            <?php
              }else{
            ?>
              <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fa-solid fa-file-import"></i> Tambahkan</button>
            <?php
              }
            ?>
            <button type="button" class="btn btn-danger"><i class="fa-solid fa-backward"></i> Batal</button>
          </div>
        </div>
      </form>
    </main>
    <footer>

    </footer>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>