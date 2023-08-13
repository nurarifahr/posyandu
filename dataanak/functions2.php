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
function tambahanak ($data){
	global $conn;

	$nama_anak = htmlspecialchars($data["nama_anak"]);
	$nik_anak = htmlspecialchars($data["nik_anak"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);

	$query = "INSERT INTO tb_anak VALUES ('', '$nama_anak', '$nik_anak', '$tempat_lahir', '$tgl_lahir', '$jk')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapusanak($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_anak WHERE id_anak = $id");
		return mysqli_affected_rows($conn);

	}


//function ubah
	function ubahanak($data){
	global $conn;

	$id = $data["id_anak"];
	$nama_anak = htmlspecialchars($data["nama_anak"]);
	$nik_anak = htmlspecialchars($data["nik_anak"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);

	$query = "UPDATE tb_anak SET
				nama_anak = '$nama_anak',
				nik_anak = '$nik_anak',
				tempat_lahir = '$tempat_lahir',
				tgl_lahir = '$tgl_lahir',
				jk = '$jk'

				WHERE id_anak = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


//untuk cari
function cari($keyword){
	$query = "SELECT * FROM tb_anak
				WHERE
				nama_anak LIKE '%$keyword%' OR
				nik_anak LIKE '%$keyword%' OR
				tempat_lahir LIKE '%$keyword%' OR
				tgl_lahir LIKE '%$keyword%' OR
				jk LIKE '%$keyword%'
				";

	return query($query);
}




?>