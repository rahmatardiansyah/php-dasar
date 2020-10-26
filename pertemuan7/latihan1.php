<?php 

	// variable scope

	// $x = 10;//variabel local

	// function tampilx()
	// {
	// 	global $x;//membuat variable local menjadi global
	// 	echo $x;
	// }

	// tampilx();
	

	//superglobals
	//variabel global milik php
	//merupakan array associative
	
	// echo $_SERVER["SERVER_NAME"];

	//mengisi array associative
	// $_GET["nama"] = "Rahmat Ardiansyah";
	// $_GET["npm"] = "193510147";

	// mengirim data ke $_GET 
	// ?key=value
	// http://localhost/~rahmat/php-dasar/pertemuan7/latihan1.php?nama=rahmat%20ardiansyah
	
	// menambah data ke $_GET
	// ?key=value&key=value
	// http://localhost/~rahmat/php-dasar/pertemuan7/latihan1.php?nama=rahmat%20ardiansyah&npm=193510147

	// var_dump($_GET);

		$mahasiswa = [[
		"nama" => "Rahmat Ardiansyah",
		"npm" => "193510147",
		"email" => "rahmatnsn@gmail.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "1.jpeg"
	],
	[
		"nama" => "ardi rahmat",
		"npm" => "193510102",
		"email" => "rahmat21@gmail.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "2.webp"
	]
];

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>GET</title>
 </head>
 <body>
 	<h1>DAFTAR MAHASISWA</h1>
 	<ul>
 	<?php foreach ($mahasiswa as $mhs): ?>
 		<li>
 			<!-- Mengirimkan data ke halaman -->
 			<!-- <a href="latihan2.php?nama=<?php echo $mhs["nama"]; ?>"> -->

 			<a href="latihan2.php?nama=<?php echo $mhs["nama"]; ?>&npm=<?php echo $mhs["npm"]; ?>&email=<?php echo $mhs["email"]; ?>&jurusan=<?php echo $mhs["jurusan"]; ?>&gambar=<?php echo $mhs["gambar"]; ?>"><?php echo $mhs["nama"]; ?></a>
 		</li>
 	<?php endforeach ?>
 	</ul>
 </body>
 </html>