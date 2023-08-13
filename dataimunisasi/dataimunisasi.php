<?php  
//session
session_start();
if(!isset($_SESSION["login"])){
	header("Location: ../login.php");
	exit;
}    
require 'functions6.php';

//tombol cari
if(isset($_POST["cari"])){
	$tb_imunisasi = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Imunisasi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
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
		<a href="../index.php">Menu Utama</a><br><br>
			<div class="navbar3">
				<a href="../dataibu/dataibu.php">Data Ibu</a><br><br>
				<a href="../dataanak/dataanak.php">Data Anak</a><br><br>
				<a href="../datatimbang/datatimbang.php">Penimbangan</a><br><br>
				<a href="../datavaksin/datavaksin.php">Data Vaksin</a><br><br>
				<a href="../datapetugas/datapetugas.php">Data Petugas</a><br><br>
				<a href="dataimunisasi.php">Data Imunisasi</a><br><br>
			</div><br><br>
		<a href="../tentang/tentang.php">Tentang Posyandu</a>
	</div>

	<h1>DATA IMUNISASI</h1>
	<div class="tambahimun">
		<br><br>
		<a href="tambahimunisasi.php">Tambah Data Imunisasi</a>
	</div>


	<div  class="cetak">
		<a href="../cetakimun.php" target="_blank"><img src="../img/printing.png"></a>
	</div>
	<!-- cari -->
	<div class="tombolcari">
	<form action="" method="post">
		<input type="text" name="keyword" autofocus="" placeholder="pencarian " autocomplete="off">
		<button type="submit" name="cari">Cari</button>
	</form>
	</div>
		<br><br><br>	


	<div class="tabelimun">
		<table  class="table table-success table-striped" border="2" cellspacing="0" cellpadding="20">
			<tr class="table-dark">
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Anak</th>
				<th>Nama Ibu</th>
				<th>Umur</th>
				<th>Tinggi</th>
				<th>Berat Badan</th>
				<th>Periode</th>
				<th>Nama Petugas</th>
				<th>Nama Vaksin</th>
				<th>Aksi</th>
			</tr>
			
			<?php $i =1; 	
				$query = "SELECT * FROM tb_imunisasi 
				INNER JOIN tb_anak ON tb_imunisasi.id_anak = tb_anak.id_anak
				INNER JOIN tb_ibu ON tb_imunisasi.id_ibu = tb_ibu.id_ibu
				INNER JOIN tb_penimbangan ON tb_imunisasi.id_timbang = tb_penimbangan.id_timbang
				INNER JOIN tb_petugas ON tb_imunisasi.id_petugas = tb_petugas.id_petugas
				INNER JOIN tb_vaksin ON tb_imunisasi.id_vaksin = tb_vaksin.id_vaksin
				";				; 
				$imunisasi = mysqli_query($conn,$query) or die (mysqli_error($conn));?>
			<?php while ($row = mysqli_fetch_array($imunisasi)): ?>
				<tr class="table-light">
					<td><?= $i; ?></td>
					<td><?= $row ["tanggal"]; ?></td>
					<td><?= $row ["nama_anak"]; ?></td>
					<td><?= $row ["nama_ibu"]; ?></td>
					<td><?= $row ["umur"]; ?></td>
					<td><?= $row ["tinggi"]; ?></td>
					<td><?= $row ["bb_umur"]; ?></td>
					<td><?= $row ["periode"]; ?></td>
					<td><?= $row ["nama_petugas"]; ?></td>
					<td><?= $row ["nama_vaksin"]; ?></td>
					<td>

					<a href="hapusimunisasi.php?id=<?=$row["id_imunisasi"];?>" onclick="return confirm('Anda yakin menghapusnya ?');" class="tombolhapus">Hapus</a>

					</td>
				</tr>
				<?php $i++; ?>
			<?php endwhile; ?>
		</table>

</body>
</html>