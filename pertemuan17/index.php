<?php 
	session_start();
	//jika tidak ada variabel $_SESSION yang elemennya ["login"],maka pindahkan user ke halaman login.php
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php';

	//pagination
	// konfigurasi
	$jumlahDataPerHalaman = 3;
	// hitung jumlah data dalam database
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	// ceil untuk membulatkan keatas
	// floor untuk membulatkan kebawah
	// round untuk pembulatan biasa
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	// operator ternary
	// jika $_GET["halaman"] ada maka diambil dari $_GET["halaman"]. jika tidak $halamanAktif=1
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	// halaman 2 = awalData = 3
	// halaman 3 = awalData = 6
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


	//query untuk menampilkan semua mahasiswa di table mahasiswa dan di urutkan berdasarkan nama(A-Z)
	// LIMIT 0, 3 = tampilkan 3 data dari index ke 0 
	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

	//tombol cari ditekan
	// kalau tombil cari di pencet masukkan,ambil apapun yang diketiikan oleh user.Masukkan ke function cari
	if(isset($_POST["cari"])){
		$mahasiswa = cari($_POST["keyword"]);
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
</head>
<body>
	<font face="Times New Roman">
	<a href="logout.php">Logout</a>
	<h1>Daftar Mahasiswa</h1>


	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<!-- autofocus untuk langsung meletakkan cursor di input -->
		<!-- autocomplete untuk mematikan history pencarian -->
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>

	<!-- jika halamanAktif == 1 maka prev halaman tidak muncul -->
	<?php if($halamanAktif > 1) : ?>
		<a href="?halaman=<?php echo $halamanAktif - 1 ?>">&laquo;</a>
	<?php endif; ?>
	<!-- jika halamannya aktif warna merah -->
	<?php for($i = 1;$i <= $jumlahHalaman;$i++) : ?>
		<?php if($i == $halamanAktif) : ?>
			<a href="?halaman=<?php echo $i ?>" style="font-weight: bold;color: red"><?php echo $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?php echo $i ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>
	<!-- jika halamanAktifnya terakhir maka next halaman tidak muncul -->
	<?php if($halamanAktif < $jumlahHalaman) : ?>
	<a href="?halaman=<?php echo $halamanAktif + 1 ?>">&raquo;</a>
	<?php endif; ?>
	
	<br>
	</font>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<!-- kirimkan id ke fungsi ubah. untuk mengubah data id yg mana -->
					<!-- mengirimkan data ke url akan masuk ke varibel $_GET -->
					<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
					<!-- kalau return confirm mengambalikan nilai true artinya akan mengujungi halaman hapus -->
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
				</td>
				<td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="100px" height="100px"></td>
				<td><?php echo $row["npm"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>

	</table>
</body>
</html>