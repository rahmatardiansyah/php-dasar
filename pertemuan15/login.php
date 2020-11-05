<?php 
	//jalankan dulu sessionnya
	session_start();
	require 'functions.php';

	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}
	//cek apakah tombil submit sudah dipencet atau belum
	if (isset($_POST["login"])) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");

		//cek apakah ada baris dengan username yang diinputkan
		if (mysqli_num_rows($result) === 1) {
			
			//jika ada,cek password nya
			$row = mysqli_fetch_assoc($result);
			//untuk decript password
			//cocokkan password yang diinputkan dengan password yang didalam database
			if(password_verify($password, $row["password"])){
				//set session
				$_SESSION["login"] = true;
				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
</head>
<body>
	<h1>Halaman Login</h1>
<?php if (isset($error)): ?>
	<p style="color: red;font-style: italic;">username atau password salah</p>
<?php endif ?>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>
	</form>
</body>
</html>