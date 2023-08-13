<?php  
session_start();
require 'dataibu/functions.php';
//session
if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}


//jika tekan tombol submit
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

if(mysqli_num_rows($result) === 1){
	$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			//session
			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;
		}
	}
	$error = true;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
	<div class="wadahlogin"><br><br><br>
		<h1>Sistem Informasi Posyandu</h1>
		<div class="menulogin" class="col-md-6">
			<h2>LOGIN</h2>
			<form action="" method="post" ><br><br>
				<label for="username"  class="form-label">Username</label>
				<input type="text" name="username" id="username" class="form-control"><br>

				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" id="password" class="form-control"><br>
				<?php if(isset($error)) : ?>
					<p class="error">username/password salah</p>
				<?php endif; ?><br>

				<p class="register">Buat akun ? <a href="registrasi.php">Registrasi</a></p><br>

				<button type="submit" name="login" class="btn btn-primary">Login</button>



			</form>
			
		</div>

	</div>
</body>
</html>