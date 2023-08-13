<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  

 require 'functions3.php';

//ambil data url
 $id = $_GET["id"];
 $vaksin = query("SELECT * FROM tb_vaksin WHERE id_vaksin = $id")[0];

 if(isset($_POST["submit"])){
  
  if(ubahvaksin($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil diubah');
      document.location.href='datavaksin.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal diubah');
      document.location.href='datavaksin.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Ubah Data Vaksin</title>
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
<h1>Ubah Data Vaksin</h1>
  <div class="containervaksin">
    <form action="" method="post" class="row g-3"> 
      <input type="hidden" name="id_vaksin" value="<?= $vaksin["id_vaksin"]; ?>">     
      <div class="col-md-11 col-md-offet-1">
        <label for="nama_vaksin" class="form-label">Nama Vaksin</label>
        <input class="form-control" type="text" name="nama_vaksin" id="nama_vaksin" placeholder="masukkan nama vaksin" required value="<?= $vaksin["nama_vaksin"]; ?>">
      </div><br><br>

      <button type="button" class="btn btn-danger col-md-2"><a href="datavaksin.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2 tombolvaksin">Ubah Data</button>

    </form>
    
  </div>

</body>
</html>
