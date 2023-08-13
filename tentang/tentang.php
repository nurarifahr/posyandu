<?php
//session
session_start();
if(!isset($_SESSION["login"])){
	header("Location: ../login.php");
	exit;
}  
  
require '../dataibu/functions.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Anak</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styleibu.css">
	<link rel="stylesheet" href="../css/styletentang.css">
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
				<a href="dataanak.php">Data Anak</a><br><br>
				<a href="../datatimbang/datatimbang.php">Penimbangan</a><br><br>
				<a href="../datavaksin/datavaksin.php">Data Vaksin</a><br><br>
				<a href="../datapetugas/datapetugas.php">Data Petugas</a><br><br>
				<a href="../dataimunisasi/dataimunisasi.php">Data Imunisasi</a><br><br>
			</div><br><br>
		<a href="../tentang/tentang.php">Tentang Posyandu</a>
	</div>

	<h1>TENTANG POSYANDU</h1>
	<img src="../img/ttgposyandu.png">
	<div class="containertentang">
		<h2>DEFINISI POSYANDU</h2>
			<p>
                Posyandu adalah kegiatan kesehatan dasar yang diselenggarakan dari, oleh dan untuk masyarakat yang dibantu oleh petugas kesehatan untuk memberdayakan dan memberikan kemudahan kepada masyarakat guna memperoleh pelayanan kesehatan bagi ibu, bayi dan anak balita. Posyandu yang sudah ada dimasyarakat saat ini sangat berperan dalam mendukung pencapaian pembangunan kesehatan ibu dan anak. <br><br>
                Dengan program Posyandu Balita di masing-masing RW di kelurahan Lingkar Selatan yang selama ini berjalan dengan baik dan rutin dilakukan satu kali dalam satu bulan dan pembinaan yang dilakukan oleh Puskesmas secara bergantian di masing-masing Posyandu yang sudah tersebar di masing-masing RW tersebut sangat membantu masyarakat utamanya kesehatan ibu dan anak.. Ada lima program prioritas yang dilakukan oleh Posyandu yaitu : KB, KIA, gizi, imunisasi, dan penanggulangan diare. Dengan program tersebut terbukti dapat menurunkan angka kematian bayi dan balita. Partisipasi masyarakat dalam mendukung terlaksananya Posyandu Balita ini sangat penting, tanpa keikutsertaan mereka ke Posyandu maka program ini tidak akan dapat berjalan dengan baik. Dengan keaktifan mereka untuk datang dan memanfaatkan pelayanan kesehatan di posyandu dapat mencegah dan mendeteksi sedini mungkin gangguan dan hambatan pertumbuhan pada balita. (Source: republika.co.id)
			</p><br>
		<h2>TUJUAN POSYANDU</h2>
			<P>
				Menurunkan angka kematian bayi (AKB), angka kematian ibu (ibu hamil), melahirkan dan nifas.
				Meningkatkan peran serta masyarakat untuk mengembangkan kegiatan kesehatan dan KB serta kegiatan lainnya yang menunjang untuk tercapainya masyarakat sehat sejahtera.
				Berfungsi sebagai wahana gerakan reproduksi keluarga sejahtera, gerakan ketahanan keluarga dan gerakan ekonomi keluarga sejahtera.		
			</P>
	</div>


</body>
</html>