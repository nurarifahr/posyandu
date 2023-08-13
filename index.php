<?php  
//session
session_start();
if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}  

require 'dataibu/functions.php';
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu Utama</title>
	<link rel="stylesheet" href="css/styleutama.css">
</head>
<body>
	<h1>SISTEM INFORMASI POSYANDU</h1><br>
	<h2>Hai, Selamat Datang Admin</h2>

	<div class="iconibu">
		<a href="dataibu/dataibu.php"><img src="img/mother.png"></a>
		<p>DATA IBU</p>
	</div>
	<div class="iconanak">
		<a href="dataanak/dataanak.php"><img src="img/baby.png"></a>
		<p>DATA ANAK</p>
		
	</div>
	<div class="icontimbang">
		<a href="datatimbang/datatimbang.php"><img src="img/body-scale.png"></a>
		<p>PENIMBANGAN</p>
	</div>
	<div class="iconvaksin">
		<a href="datavaksin/datavaksin.php"><img src="img/lab.png"></a>
		<p>DATA VAKSIN</p>
	</div>
	<div class="iconpetugas">
		<a href="datapetugas/datapetugas.php"><img src="img/nurse.png"></a>
		<p>DATA PETUGAS</p>
	</div>
	<div class="iconimun">
		<a href="dataimunisasi/dataimunisasi.php"><img src="img/syringe.png"></a>
		<p>DATA IMUNISASI</p>
	</div>
</body>
</html>