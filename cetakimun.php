<?php 
include "vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
require 'dataibu/functions.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/stylecetak.css">
</head>
<body>

 <h1> DATA IMUNISASI ANAK </h1><br><br>
		<table border="1" cellspacing="0" cellpadding="10">
			<tr>
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
				<tr>
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
				</tr>
				<?php $i++; ?>
			<?php endwhile; ?>
		</table>

</body>
</html>

<?php  
	$html = ob_get_contents();
	$mpdf ->WriteHTML(utf8_decode($html));
	$mpdf ->Output("Data Imunisasi Anak", "I");
	exit;


?>
