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
function tambahibu ($data){
	global $conn;

	$nama_ibu = htmlspecialchars($data["nama_ibu"]);
	$nik_ibu = htmlspecialchars($data["nik_ibu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nomer_telp = htmlspecialchars($data["nomer_telp"]);

	$query = "INSERT INTO tb_ibu VALUES ('', '$nama_ibu', '$nik_ibu', '$alamat', '$nomer_telp')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows ($conn);
}

//function hapus data
	function hapusibu($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM tb_ibu WHERE id_ibu = $id");
		return mysqli_affected_rows($conn);

	}


//function ubah.php
	function ubahibu($data){
	global $conn;

	$id = $data["id_ibu"];
	$nama_ibu = htmlspecialchars($data["nama_ibu"]);
	$nik_ibu = htmlspecialchars($data["nik_ibu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nomer_telp = htmlspecialchars($data["nomer_telp"]);

	$query = "UPDATE tb_ibu SET
				nama_ibu = '$nama_ibu',
				nik_ibu = '$nik_ibu',
				alamat = '$alamat',
				nomer_telp = '$nomer_telp'

				WHERE id_ibu = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


//untuk cari ibu
function cari($keyword){
	$query = "SELECT * FROM tb_ibu
				WHERE
				nama_ibu LIKE '%$keyword%' OR
				nik_ibu LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%' OR
				nomer_telp LIKE '%$keyword%'
				";

	return query($query);
}


// function regristasi

function registrasi($data){
	global $conn;

	$username = strtolower (stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username ada belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo"<script>
				alert('Username sudah terdaftar');
			</script>";
		return false;
	}

	if($password !== $password2){
		echo "<script>
				alert('Konfirmasi password salah !');
			</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}





?>
