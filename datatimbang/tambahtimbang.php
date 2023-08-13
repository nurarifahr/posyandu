<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  
 require 'functions5.php';

 if(isset ($_POST["submit"])){
  if(tambahtimbang ($_POST) > 0){
    echo"
    <script>
      alert('Data berhasil ditambahkan');
      document.location.href='datatimbang.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal ditambahkan');
      document.location.href='datatimbang.php';
    </script>
    ";
  }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Penimbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styletambah.css">
</head>
<body>

  <div class="containertimbang">
    <h1>Tambah Data Penimbangan Anak</h1>
    <form action="" method="post" class="row g-3"> 
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
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <input class="form-control" type="text" name="jk" id="jk" placeholder="masukkan jenis Kelamin" required>
      </div>  
      <div class="mb-3 col-md-11">
        <label for="bb_umur" class="form-label">Berat Badan (umur)</label>
        <input class="form-control" id="bb_umur"  type="text" name="bb_umur" placeholder="masukkan berat badan (umur)" required>
      </div>  
      <div class="col-mb-3 col-md-11 tgllahir">
        <label for="bb_berdiri" class="form-label">Berat Badan (berdiri)</label>
        <input class="form-control" type="text" name="bb_berdiri" id="bb_berdiri" placeholder="masukkan berat badan (berdiri)">
      </div>
      <div class="col-mb-3 col-md-11">
        <label for="bb_terlentang" class="form-label">Berat Badan (terlentang)</label>
        <input class="form-control" type="text" name="bb_terlentang" id="bb_terlentang" placeholder="masukkan berat badan (terlentang)">
      </div>
      <button type="button" class="btn btn-danger col-md-2 kembalitugas"><a href="datatimbang.php">Kembali</a></button>
      <button type="submit" name="submit" class="btn btn-success col-md-2 kembalitugas ubahdata">Tambah Data</button>
    </form>
    
  </div>

</body>
</html>

