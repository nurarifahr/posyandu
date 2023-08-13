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
function tambahtimbang ($data){
	global $conn;

	$nama_anak = htmlspecialchars($data["nama_anak"]);
	$jk = htmlspecialchars($data["jk"]);
	$bb_umur = htmlspecialchars($data["bb_umur"]);
	$bb_berdiri = htmlspecialchars($data["bb_berdiri"]);
	$bb_terlentang = htmlspecialchars($data["bb_terlentang"]);

	$query = "INSERT INTO tb_penimbangan VALUES ('', '$nama_anak', '$jk', '$bb_umur', '$bb_berdiri', '$bb_terlentang')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapustimbang($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_penimbangan WHERE id_timbang = $id");
		return mysqli_affected_rows($conn);

	}


//function ubah.php
	function ubahtimbang($data){
	global $conn;

	$id = $data["id_timbang"];
	$id_anak = htmlspecialchars($data["nama_anak"]);
	$jk = htmlspecialchars($data["jk"]);
	$bb_umur = htmlspecialchars($data["bb_umur"]);
	$bb_berdiri = htmlspecialchars($data["bb_berdiri"]);
	$bb_terlentang = htmlspecialchars($data["bb_terlentang"]);

	$query = "UPDATE tb_penimbangan SET
				id_anak = '$id_anak',
				jk = '$jk',
				bb_umur = '$bb_umur',
				bb_berdiri = '$bb_berdiri',
				bb_terlentang = '$bb_terlentang'

				WHERE id_timbang = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


//untuk cari ibu
function cari($keyword){
	$query = "SELECT * FROM tb_penimbangan
				WHERE
				id_anak LIKE '%$keyword%' OR
				jk LIKE '%$keyword%' OR
				bb_umur LIKE '%$keyword%' OR
				bb_berdiri LIKE '%$keyword%' OR
				bb_terlentang LIKE '%$keyword%'
				";

	return query($query);
}




?>