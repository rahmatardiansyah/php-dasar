<?php 


require 'functions.php';

	//ambil data dari url yaitu dari $_GET
	$id = $_GET["id"];

	//query data mahasiswa berdasarkan id
	//query $mhs akan mengkasilkan array numeric
	//jadi harus ditambah [0] (index yg ke 0) agar langsung di baca "YANG INDEXNYA 0"
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


	//cek apakah tombol submit sudah dipencet atau belum
	if(isset($_POST["submit"])){ 

		//fungsi ubah akan mengembalikan nilai -1/1 . artinya ada yg berubah di database
		if(ubah($_POST) > 0){
			echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
			</script>";
		}else{
			echo "<script>
			alert('data gagal diubah!');
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
	<title>Ubah data mahasiswa</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="post">
		<!-- kirimkan id yang tipenya hidden -->
		<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="npm">NPM : </label>
				<input type="text" name="npm" id="npm" required value="<?php echo $mhs["npm"]; ?>">
				<!-- attribut value berguna untuk mengisi data ke input -->
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" value="<?php echo $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>
		
	</form>
</body>
</html>