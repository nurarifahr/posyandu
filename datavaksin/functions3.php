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

//function tambah
function tambahvaksin ($data){
	global $conn;

	$nama_vaksin = htmlspecialchars($data["nama_vaksin"]);

	$query = "INSERT INTO tb_vaksin VALUES ('', '$nama_vaksin')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapusvaksin($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_vaksin WHERE id_vaksin = $id");
		return mysqli_affected_rows($conn);

	}


//function 
	function ubahvaksin($data){
	global $conn;

	$id = $data["id_vaksin"];
	$nama_vaksin = htmlspecialchars($data["nama_vaksin"]);


	$query = "UPDATE tb_vaksin SET
				nama_vaksin = '$nama_vaksin'
				WHERE id_vaksin = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


//untuk cari 
function cari($keyword){
	$query = "SELECT * FROM tb_vaksin
				WHERE
				nama_vaksin LIKE '%$keyword%'
				";

	return query($query);
}




?>