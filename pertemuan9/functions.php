<?php 

//buat koneksi
$koneksi = mysqli_connect("localhost","rahmat","rahmat21","phpdasar");

function query($query)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;

}

function tambah($data){

		global $koneksi;//membuat variabel koneksi menjadi global
		//ambil data dari tiap element dalam form
		// simpan dulu ke dalam variable supaya saat query dibuat tidak kesulitan.
		// jika dimakssukan ke fucntions tidak lagi menggunakan variabel $_POST tetapi menggunakan variabel argumen/parameter yg dikirim yaitu $data
		// htmlspecialchars() berguna untuk mengubah tag html menjadi string
		$nama = htmlspecialchars($data["nama"]);
		$npm = htmlspecialchars($data["npm"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambar = htmlspecialchars($data["gambar"]);

		//query untuk insert data
		$query = "INSERT INTO mahasiswa VALUES ('','$nama','$npm','$email','$jurusan','$gambar')";
		mysqli_query($koneksi, $query);

		// kembalikan nilai query berhasil atau tidak
		return mysqli_affected_rows($koneksi);
}
		// cek apakah data berhasil ditambahkan atau tidak
		// if (mysqli_affected_rows($koneksi) > 0) {
		// 	echo "berhasil";
		// }else{
		// 	echo "gagal";
		// 	echo "<br>";
		// 	echo mysqli_error($koneksi);
		// }

function hapus($id)
{
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM mahasiswa where id = $id");

	// kembalikan nilai query berhasil atau tidak
	return mysqli_affected_rows($koneksi);
}

 ?>