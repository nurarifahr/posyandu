<?php  

require 'dataibu/functions.php';

if(isset($_POST["register"])){
	if(registrasi($_POST) > 0){
		echo"<script>
			alert('User baru berhasil ditambahkan !');
			document.location.href='login.php';
		</script>";
	}else{
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
	<div class="regiscon"><br><br>
		<h1>Registrasi</h1>
			<form action="" method="post" ><br><br>
			<label for="username"  class="form-label" style="color:white;">Username</label>
			<input type="text" name="username" id="username" class="form-control"><br>

			<label for="password" class="form-label" style="color:white;">Password</label>
			<input type="password" name="password" id="password" class="form-control"><br>

			<label for="password2" class="form-label" style="color:white;">Konfirmasi Password</label>
			<input type="password" name="password2" id="password2" class="form-control"><br><br>

			<button type="submit" name="register" class="btn btn-primary">Register</button>



			</form>
		


	</div>

</body>
</html>