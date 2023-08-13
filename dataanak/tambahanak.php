<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  

 require 'functions2.php';

 if(isset ($_POST["submit"])){
  if(tambahanak ($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil ditambahkan');
      document.location.href='dataanak.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal ditambahkan');
      document.location.href='dataanak.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styletambah.css">
</head>
<body>

  <div class="containeranak">
    <h1>Tambah Data Anak</h1>
    <form action="" method="post" class="row g-3"> 
      <div class="col-md-6 col-md-offet-1">
        <label for="nama_anak" class="form-label">Nama Anak</label>
        <input class="form-control" type="text" name="nama_anak" id="nama_anak" placeholder="masukkan nama anak" required>
      </div>   
      <div class="col-md-5">
        <label for="nik_anak" class="form-label">NIK Anak</label>
        <input class="form-control" type="text" name="nik_anak" id="nik_anak" placeholder="masukkan nik anak" required>
      </div>  
      <div class="mb-3 col-md-11">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input class="form-control" id="tempat_lahir"  type="text" name="tempat_lahir" placeholder="masukkan tempat lahir" required>
      </div>  
      <div class="col-mb-3 col-md-11 tgllahir">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir">
      </div>
      <div class="col-mb-3 col-md-11">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <input class="form-control" type="text" name="jk" id="jk" placeholder="masukkan jenis kelamin" required>
      </div>
      <button type="button" class="btn btn-danger col-md-2"><a href="dataanak.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2">Tambah Data</button>
    </form>
    
  </div>

</body>
</html>

