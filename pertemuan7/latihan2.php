<?php 
	// fungsi isset untuk mengecek apakah sebuah variable sudah dibikin atau belum
	
	if (
		!isset($_GET["nama"]) || 
		!isset($_GET["npm"]) || 
		!isset($_GET["email"]) ||
		!isset($_GET["jurusan"]) ||
		!isset($_GET["gambar"]) 
	) {//jika variabel $_GET["nama"] dll BELUM dibikin maka paksa user nya pindah ke latihan1.php
		// redirect atau memindahkan user dari sebuah halaman ke halaman lain
		header("Location: latihan1.php");
		exit;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Mahasiswa</title>
</head>
<body>
		<!-- $_GET untuk menangkap data -->
 		<ul>
 			<li><img src="img/<?php echo $_GET["gambar"]; ?>" alt="" width="100px" height="100px"></li>
 			<li>Nama : <?php echo $_GET["nama"]; ?></li>
 			<li>NPM : <?php echo $_GET["npm"]; ?></li>
 			<li>Email : <?php echo $_GET["email"]; ?></li>
 			<li>Jurusan : <?php echo $_GET["jurusan"]; ?></li>
 		</ul>
	<a href="latihan1.php">Kembali ke daftar mahasiswa</a>
</body>
</html>