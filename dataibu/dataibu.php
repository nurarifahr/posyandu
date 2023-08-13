<?php
//session
session_start();
if(!isset($_SESSION["login"])){
	header("Location: ../login.php");
	exit;
}  
//menghubungkan ke db
require 'functions.php';

//konfigurasi menetukan berpa data dalam halaman
$jumlahDataPerHalaman = 5;
$jumlahData = count (query ("SELECT * FROM tb_ibu"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

//ambil hal aktif
$halamanAktif = (isset($_GET["halaman"]))? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

//query
$tb_ibu = query("SELECT * FROM tb_ibu ORDER BY id_ibu DESC LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari
if(isset($_POST["cari"])){
	$tb_ibu = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Ibu</title>
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
				<a href="dataibu.php">Data Ibu</a><br><br>
				<a href="../dataanak/dataanak.php">Data Anak</a><br><br>
				<a href="../datatimbang/datatimbang.php">Penimbangan</a><br><br>
				<a href="../datavaksin/datavaksin.php">Data Vaksin</a><br><br>
				<a href="../datapetugas/datapetugas.php">Data Petugas</a><br><br>
				<a href="../dataimunisasi/dataimunisasi.php">Data Imunisasi</a><br><br>
			</div><br><br>
		<a href="../tentang/tentang.php">Tentang Posyandu</a>
	</div>

	<h1>DATA IBU</h1>
	<div class="tambahimun">
		<br><br>
		<a href="tambahibu.php">Tambah Data Ibu</a>
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
				<th>Nama Ibu</th>
				<th>NIK Ibu</th>
				<th>Alamat</th>
				<th>Nomer Telp</th>
				<th>Aksi</th>
			</tr>
			
			<?php $i =1; ?>
			<?php foreach ($tb_ibu as $row): ?>
				<tr class="table-light">
					<td><?= $i; ?></td>
					<td><?= $row ["nama_ibu"]; ?></td>
					<td><?= $row ["nik_ibu"]; ?></td>
					<td><?= $row ["alamat"]; ?></td>
					<td><?= $row ["nomer_telp"]; ?></td>
					<td>

					<a href="ubahibu.php?id=<?= $row["id_ibu"];?>"class="tombolubah">Ubah</a>
					<a href="hapusibu.php?id=<?=$row["id_ibu"];?>" onclick="return confirm('Anda yakin menghapusnya ?');" class="tombolhapus">Hapus</a>

					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</table>

	<!-- halaman -->	
	<nav>
		<?php if($halamanAktif > 1): ?>
			<a href="?halaman=<?= $halamanAktif - 1; ?>"  class="hal2" >&laquo;</a>
				<?php endif; ?>
				<!-- butuh pengulangan angka satu sampai halaman ke n-->
				<?php for( $i=1; $i<= $jumlahHalaman; $i++) : ?>
					<?php if($i == $halamanAktif) : ?>
						<a href="?halaman=<?= $i; ?>" class="hal1"><?= $i; ?></a>
					<?php else : ?>
						<a href="?halaman=<?= $i; ?>" class="hal2"><?= $i; ?></a>
					<?php endif; ?>
				<?php endfor; ?>

				<?php if($halamanAktif < $jumlahHalaman): ?>
			<a href="?halaman=<?= $halamanAktif + 1; ?>" class="hal2">&raquo;</a>
	<?php endif; ?>
	</nav>

</body>
</html>