<?php 
	session_start();
	//jika tidak ada variabel $_SESSION yang elemennya ["login"],maka pindahkan user ke halaman login.php
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}


require 'functions.php';

	//cek apakah tombol submit sudah dipencet atau belum
	if(isset($_POST["submit"])){ 

		if(tambah($_POST) > 0){
			echo "<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
			</script>";
		}else{
			echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
			</script>";
		}


	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>
	<!-- setelah menggunakan attribut enctype form seolah-olah memiliki 2 jalur,untuk string akan dikelola $_POST dan untuk file akan dikelola $_FILES -->
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="npm">NPM : </label>
				<input type="text" name="npm" id="npm" required>
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>
		
	</form>
</body>
</html>