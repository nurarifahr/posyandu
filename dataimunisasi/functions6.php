<?php 
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "posyandu");
function query ($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc ($result)){
		$rows[] = $row;
	}
	return $rows;
}

//function tambah ibu
function tambahimunisasi ($data){
	global $conn;

	$tanggal = htmlspecialchars($data["tanggal"]);
	$nama_anak = htmlspecialchars($data["nama_anak"]);
	$nama_ibu = htmlspecialchars($data["nama_ibu"]);
	$umur = htmlspecialchars($data["umur"]);
	$tinggi = htmlspecialchars($data["tinggi"]);
	$bb_umur = htmlspecialchars($data["bb_umur"]);
	$periode = htmlspecialchars($data["periode"]);
	$nama_petugas = htmlspecialchars($data["nama_petugas"]);
	$nama_vaksin = htmlspecialchars($data["nama_vaksin"]);

	$query = "INSERT INTO tb_imunisasi VALUES ('', '$tanggal', '$nama_anak', '$nama_ibu', '$umur', '$tinggi', '$bb_umur', '$periode', '$nama_petugas', '$nama_vaksin')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapusimunisasi($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_imunisasi WHERE id_imunisasi = $id");
		return mysqli_affected_rows($conn);

	}

//untuk cari ibu
function cari($keyword){
	$query = "SELECT * FROM tb_imunisasi
				WHERE
				tanggal LIKE '%$keyword%' OR
				nama_anak LIKE '%$keyword%' OR
				nama_ibu LIKE '%$keyword%' OR
				umur LIKE '%$keyword%' OR
				tinggi LIKE '%$keyword%' OR
				bb_umur LIKE '%$keyword%' OR
				periode LIKE '%$keyword%' OR
				nama_petugas LIKE '%$keyword%' OR
				nama_vaksin LIKE '%$keyword%'
				";

	return query($query);
}




?>