<?php 
	//jalankan dulu sessionnya
	session_start();
	require 'functions.php';

	//cek apakah ada variabel $_COOKIE yang di set
	if (isset($_COOKIE["id"]) && isset($_COOKIE['key'])) {

		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		//ambil username berdasarkan id
		$result = mysqli_query($koneksi,"SELECT username FROM user WHERE id=$id");
		$row = mysqli_fetch_assoc($result);

		//cek cookie[username] dengan username di database
		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
		}
	}

	//jika ada $_SESSION = true
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

				//cek remember me
				if (isset($_POST["remember"])) {
					//buat cookie
					//setcookie('login', 'true', time()+60);
					setcookie('id', $row['id'], time()+60*2);
					setcookie('key', hash('sha256', $row['username']), time()+60*2);
				}
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
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember me</label>
			</li>
			<li>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>
	</form>
</body>
</html>