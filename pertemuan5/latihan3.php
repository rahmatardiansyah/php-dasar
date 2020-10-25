<?php 
	// ini adalah array numeric artinya indexnya angka
	$mahasiswa = [
		["Rahmat Ardiansyah", "193510147", "Teknik Informatika", "rahmat21@student.uir.ac.id"],
		["Rahmat Ardiansyah", "193510101", "Teknik Informatika", "rahmat21@student.uir.ac.id"],
		["Rahmat", "193510105", "Teknik Informatika", "rahmat21@student.uir.ac.id"],

];



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Mahasiswa</title>
</head>
<body>
 		<!-- <?php foreach($mahasiswa as $mhs) :?>
 		<ul>
 			<li><?php echo $mhs; ?></li>
 		</ul>
 		<?php endforeach; ?> -->
 		<!-- kalau ada 2 mahasiswa -->

 		<?php foreach($mahasiswa as $mhs) : ?>
 			<ul>
 				<li>Nama    :<?php echo $mhs[0]; ?></li>
 				<li>NPM     :<?php echo $mhs[1]; ?></li>
 				<li>Jurusan :<?php echo $mhs[2]; ?></li>
 				<li>Email   :<?php echo $mhs[3]; ?></li>
 			</ul>
 		<?php endforeach; ?>
</body>
</html>	