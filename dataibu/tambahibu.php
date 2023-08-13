<?php 

//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  

 require 'functions.php';

 if(isset ($_POST["submit"])){
  if(tambahibu ($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil ditambahkan');
      document.location.href='dataibu.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal ditambahkan');
      document.location.href='dataibu.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styletambah.css">
</head>
<body>

  <div class="containeribu">
    <h1>Tambah Data Ibu</h1>
    <form action="" method="post" class="row g-3"> 
      <div class="col-md-6 col-md-offet-1">
        <label for="nama_ibu" class="form-label">Nama Ibu</label>
        <input class="form-control" type="text" name="nama_ibu" id="nama_ibu" placeholder="masukkan nama ibu" required>
      </div>   
      <div class="col-md-5">
        <label for="nik_ibu" class="form-label">NIK Ibu</label>
        <input class="form-control" type="text" name="nik_ibu" id="nik_ibu" placeholder="masukkan nik ibu" required>
      </div>  
      <div class="mb-3 col-md-11">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" type="text" name="alamat" placeholder="masukkan alamat" required></textarea>
      </div>  
      <div class="mb-3 col-md-11 nomertelpibu">
        <label for="nomer_telp" class="form-label">Nomor Telefon</label>
        <input class="form-control" type="text" name="nomer_telp" id="nomer_telp" placeholder="masukkan nomer telefon" required>
      </div>
      <button type="button" class="btn btn-danger col-md-2"><a href="dataibu.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2">Tambah Data</button>
    </form>
    
  </div>

</body>
</html>

