<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}    
 require 'functions6.php';

 if(isset ($_POST["submit"])){
  if(tambahimunisasi ($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil ditambahkan');
      document.location.href='dataimunisasi.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal ditambahkan');
      document.location.href='dataimunisasi.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styletambah.css">
</head>
<body>

  <div class="containerimunisasi">
    <h1>Tambah Data Imunisasi</h1>
    <form action="" method="post" class="row g-3"> 
      <div class="col-md-5">
        <label for="tanggal" class="form-label">Tanggal Imunisasi</label>
        <input class="form-control" type="date" name="tanggal" id="tanggal" required>
      </div>  
      <div class="col-md-6 col-md-offet-1">
        <label for="nama_anak" class="form-label">Nama Anak</label>
          <select name="nama_anak" id="nama_anak" class="form-select" aria-label="Default select example">
            <option selected>--Pilih Nama Anak--</option>
            <?php 
              $query = mysqli_query ($conn, "SELECT * FROM tb_anak");
              while($row = mysqli_fetch_assoc($query)){
                echo'<option value = "'.$row['id_anak'].'">'.$row['nama_anak'].'</option>';
              };
             ?>
          </select>
      </div>   
      <div class="col-md-5">
        <label for="nama_ibu" class="form-label">Nama Ibu</label>
          <select name="nama_ibu" id="nama_ibu" class="form-select" aria-label="Default select example">
            <option selected>--Pilih Nama Ibu--</option>
            <?php 
              $query = mysqli_query ($conn, "SELECT * FROM tb_ibu");
              while($row = mysqli_fetch_assoc($query)){
                echo'<option value = "'.$row['id_ibu'].'">'.$row['nama_ibu'].'</option>';
              };
             ?>
          </select>
      </div>  
      <div class="col-md-6">
        <label for="umur" class="form-label">Umur</label>
        <input class="form-control" id="umur"  type="text" name="umur" placeholder="masukkan umur anak" required>
      </div>  
      <div class="col-md-4">
        <label for="tinggi" class="form-label">Tinggi</label>
        <input class="form-control" type="text" name="tinggi" id="tinggi" placeholder="masukkan tinggi anak">
      </div>
      <div class="col-md-4">
        <label for="bb_umur" class="form-label">Berat Badan</label>
          <select name="bb_umur" id="bb_umur" class="form-select" aria-label="Default select example">
            <option selected>--Berat Badan Anak--</option>
            <?php 
              $query = mysqli_query ($conn, "SELECT * FROM tb_penimbangan");
              while($row = mysqli_fetch_assoc($query)){
                echo'<option value = "'.$row['id_timbang'].'">'.$row['bb_umur'].'</option>';
              };
             ?>
          </select>
      </div>  
      <div class="col-md-3">
        <label for="periode" class="form-label">Periode</label>
        <input class="form-control" type="text" name="periode" id="periode">
      </div>
      <div class="col-md-5">
        <label for="nama_petugas" class="form-label">Nama Petugas</label>
          <select name="nama_petugas" id="nama_petugas" class="form-select" aria-label="Default select example">
            <option selected>--Pilih Nama Petugas--</option>
            <?php 
              $query = mysqli_query ($conn, "SELECT * FROM tb_petugas");
              while($row = mysqli_fetch_assoc($query)){
                echo'<option value = "'.$row['id_petugas'].'">'.$row['nama_petugas'].'</option>';
              };
             ?>
          </select>
      </div>  
      <div class="col-md-6">
        <label for="nama_vaksin" class="form-label">Nama Vaksin</label>
          <select name="nama_vaksin" id="nama_vaksin" class="form-select" aria-label="Default select example">
            <option selected>--Pilih Nama Vaksin--</option>
            <?php 
              $query = mysqli_query ($conn, "SELECT * FROM tb_vaksin");
              while($row = mysqli_fetch_assoc($query)){
                echo'<option value = "'.$row['id_vaksin'].'">'.$row['nama_vaksin'].'</option>';
              };
             ?>
          </select>
      </div>  

      <button type="button" class="btn btn-danger col-md-2 kembalitugas"><a href="dataimunisasi.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2 kembalitugas ubahdata">Tambah Data</button>
    </form>
    
  </div>

</body>
</html>

