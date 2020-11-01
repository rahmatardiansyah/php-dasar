<?php 
	require 'functions.php';


	//query untuk menampilkan semua mahasiswa di table mahasiswa dan di urutkan berdasarkan nama(A-Z)
	$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");

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
	<h1>Daftar Mahasiswa</h1>


	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<!-- autofocus untuk langsung meletakkan cursor di input -->
		<!-- autocomplete untuk mematikan history pencarian -->
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>
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