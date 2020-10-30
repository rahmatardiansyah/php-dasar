<?php 
	require 'functions.php';

	$mahasiswa = query("SELECT * FROM mahasiswa");
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
					<a href="">Ubah</a> |
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