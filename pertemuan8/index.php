<?php 
	
// koneksi ke database
$koneksi = mysqli_connect("localhost","rahmat","rahmat21","phpdasar");

// ambil data dari table mahasiswa
// parameter nya ada 2.koneksi dan query mysql
// Masukkan ke variable $result untuk cek apakah query berhasil atau tidak
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

// ambil data(fetch) mahasiswa dari objek $result
// mysqli_fetch_row() = mengembalikan array numeric
// mysqli_fetch_assoc() = mengembalikan array associative
// mysqli_fetch_array() = mengembalikan keduanya
// mysqli_fetch_object()

// cara menampilkan seluruh data mahasiswa
// while($mhs = mysqli_fetch_assoc($result)){
// var_dump($mhs);
// }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

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
		<!-- cara lama menampilkan semua data mahasiswa -->
		<?php $i=1; ?>
		<?php while($row = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="">Ubah</a> |
				<a href="">hapus</a>
			</td>
			<td><img src="img/<?php echo($row["gambar"]) ?>" alt="" height="50px" width="50px"></td>
			<td><?php echo $row["npm"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["jurusan"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endwhile; ?>

	</table>
</body>
</html>