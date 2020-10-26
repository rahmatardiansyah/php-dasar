<?php 
	// cek dulu apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {//kata submit disini berdasarkan name button yg kita set
	// cek username dan password
		if ($_POST["username"] == "admin" && $_POST["password"] == "rahmat21") {
			// jika benar redirect ke halaman admin.php
			header("Location: admin.php");
			exit;
		}else{
			// jika salah tampilkan pesan kesalahan
			$error = true;
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
		p {
			color: red;
			font-style: italic;
		}
	</style>
</head>
<body>
	<h1>Login Admin</h1>


	<?php if (isset($error)): ?><!-- jika variable $error ada tampilkan  -->

	<p>Username / Password salah</p>
	<?php endif ?>
	<ul>
		<form action="" method="post">
		
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">password : </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="submit">login</button>
			</li>
		
		</form>
	</ul>
</body>
</html>