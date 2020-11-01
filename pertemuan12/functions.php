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

//menampung data $_POST yang dikirimkan dari form
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
		
		// $_FILES memiliki 2 dimensi,dimensi pertama adalah name input type="file",
		// dimensi kedua ada 5 buah elemen array (name,type,tmp_name,error)

		// upload gambar
		$gambar = upload();
		if(!$gambar){ // jika $gambar berisi nilai false
			return false;
		}

		//query untuk insert data
		$query = "INSERT INTO mahasiswa VALUES ('','$nama','$npm','$email','$jurusan','$gambar')";
		mysqli_query($koneksi, $query);

		// kembalikan nilai query berhasil atau tidak
		return mysqli_affected_rows($koneksi);
}

function upload()
{
	//$_FILES[name input][nama elemen]
	$namaFile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
			 alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png','webp'];
	//fungsi explode untuk memecah sebuah string menjadi array
	//rahmatardiansyah.jpg = ['rahmatardiansyah','jpg'];
	$ekstensiGambar = explode('.', $namaFile);
	//fungsi end untuk menampilkan elemen array yang index paling terakhir
	//fungsi strtolower untuk menghasilkan huruf kecil
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	//cek apakah ada sebuah string di dalam array/menghasilkan true jika ada string('jpg','jpeg','png','webp'). menghasilkan false jika tidak ada
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 alert('yang anda upload bukan gambar!');
			</script>";
		return false;
	}

	//cek jika ukurannya terlalu besar
	if($ukuranFile > 1000000){
		echo "<script>
			 alert('Ukuran gambar terlalu besar!');
			</script>";
		return false;
	}

	// lolos pengecekkan,gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	//return nama file karena akan masuk ke variable $gambar dan akan masuk kedalam database
	return $namaFileBaru;

}
// cek apakah data berhasil ditambahkan atau tidak
// if (mysqli_affected_rows($koneksi) > 0) {
// 	echo "berhasil";
// }else{
// 	echo "gagal";
// 	echo "<br>";
// 	echo mysqli_error($koneksi);
// }

// id di dapat dari url atau variable $_GET
function hapus($id)
{
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM mahasiswa where id = $id");

	// kembalikan nilai query berhasil atau tidak
	return mysqli_affected_rows($koneksi);
}


//menampung data $_POST yang dikirimkan dari form
function ubah($data)
{
		global $koneksi;
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$npm = htmlspecialchars($data["npm"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		$gambarLama = htmlspecialchars($data["gambarLama"]);

		//cek apakah user milih gambar baru atau tidak
		if($_FILES['gambar']['error'] === 4){
			$gambar = $gambarLama;
		}else{
			$gambar = upload();
		}

		//query untuk update data
		$query = "UPDATE mahasiswa SET 
					npm = '$npm',
					nama = '$nama',
					email = '$email',
					jurusan = '$jurusan',
					gambar = '$gambar'
				WHERE id = $id
				";
		mysqli_query($koneksi, $query);

		// kembalikan nilai -1/1 (ada baris yg berubah atau tidak)
		return mysqli_affected_rows($koneksi);

}

function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa WHERE 
				nama LIKE '%$keyword%' OR
				npm LIKE '%$keyword%' OR
				nama LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
				";

	return query($query);
}
 ?>