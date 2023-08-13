<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  
 require 'functions4.php';

//ambil data url
 $id = $_GET["id"];
 $petugas = query("SELECT * FROM tb_petugas WHERE id_petugas = $id")[0];

 if(isset($_POST["submit"])){
  
  if(ubahpetugas($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil diubah');
      document.location.href='datapetugas.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal diubah');
      document.location.href='datapetugas.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Ubah Data Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styletambah.css">
    <link rel="stylesheet" href="../css/styleibu.css">
</head>
<body>
   <div class="navbar1">
    <img src="../img/gambarposyandu.png">
    <img src="../img/akun.png" style="position: absolute; margin-left: 1125px; width: 60px; height: 50px; margin-top: 25px;">
    <a href="../logout.php" class="logout">Logout</a>
  </div>
  <div class="navbar2">
    <img src="../img/teksposyandu.png"><br><br>
    <a href="">Menu Utama</a><br><br>
      <div class="navbar3">
        <a href="../dataibu/dataibu.php">Data Ibu</a><br><br>
        <a href="../dataanak/dataanak.php">Data Anak</a><br><br>
        <a href="../datatimbang/datatimbang.php">Penimbangan</a><br><br>
        <a href="datavaksin.php">Data Vaksin</a><br><br>
        <a href="../datapetugas/datapetugas.php">Data Petugas</a><br><br>
        <a href="../dataimunisasi/dataimunisasi.php">Data Imunisasi</a><br><br>
      </div><br><br>
    <a href="../tentang/tentang.php">Tentang Posyandu</a>
  </div>
<br><br>
<h1>Ubah Data Petugas</h1>
  <div class="containerpetugas">
    <form action="" method="post" class="row g-3"> 
      <input type="hidden" name="id_petugas" value="<?= $petugas["id_petugas"]; ?>"> 
      <div class="col-md-11 col-md-offet-1">
        <label for="nama_petugas" class="form-label namavaksin">Nama Petugas</label>
        <input class="form-control" type="text" name="nama_petugas" id="nama_petugas" placeholder="masukkan nama petugas" required value="<?= $petugas["nama_petugas"]; ?>">
      </div><br><br>
      <div class="col-md-11 col-md-offet-1">
        <label for="user_petugas" class="form-label">Username Petugas</label>
        <input class="form-control" type="text" name="user_petugas" id="user_petugas" placeholder="masukkan username petugas" required value="<?= $petugas["user_petugas"]; ?>">
      </div>

      <button type="button" class="btn btn-danger col-md-2 kembalitugas"><a href="datapetugas.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2 tambahtugas">Tambah Data</button>
    </form>
    
  </div>

</body>
</html>
