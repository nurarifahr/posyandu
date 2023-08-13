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
function tambahpetugas ($data){
	global $conn;

	$nama_petugas = htmlspecialchars($data["nama_petugas"]);
	$user_petugas = htmlspecialchars($data["user_petugas"]);

	$query = "INSERT INTO tb_petugas VALUES ('', '$nama_petugas', '$user_petugas')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapuspetugas($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_petugas WHERE id_petugas = $id");
		return mysqli_affected_rows($conn);

	}


//function ubah
	function ubahpetugas($data){
	global $conn;

	$id = $data["id_petugas"];
	$nama_petugas = htmlspecialchars($data["nama_petugas"]);
	$user_petugas = htmlspecialchars($data["user_petugas"]);

	$query = "UPDATE tb_petugas SET
				nama_petugas = '$nama_petugas',
				user_petugas = '$user_petugas'
				WHERE id_petugas = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


//untuk cari
function cari($keyword){
	$query = "SELECT * FROM tb_petugas
				WHERE
				nama_petugas LIKE '%$keyword%' OR
				user_petugas LIKE '%$keyword%'
				";

	return query($query);
}




?>