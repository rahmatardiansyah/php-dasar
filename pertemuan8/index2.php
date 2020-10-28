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
		<?php foreach ($mahasiswa as $rows): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<a href="">Ubah</a> |
					<a href="">hapus</a>
				</td>
				<td><img src="img/<?php echo $rows["gambar"]; ?>" alt="" width="100px" height="100px"></td>
				<td><?php echo $rows["npm"]; ?></td>
				<td><?php echo $rows["nama"]; ?></td>
				<td><?php echo $rows["email"]; ?></td>
				<td><?php echo $rows["jurusan"]; ?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>

	</table>
</body>
</html>