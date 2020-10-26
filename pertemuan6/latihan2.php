<?php 
// 	$mahasiswa = [
// 		["Rahmat Ardiansyah", "193510147", "Teknik Informatika", "rahmat21@student.uir.ac.id"],
// 		["Rahmat Ardiansyah", "193510101", "Teknik Informatika", "rahmat21@student.uir.ac.id"],
// 		["Rahmat", "193510105", "Teknik Informatika", "rahmat21@student.uir.ac.id"],

// ];

// array associative
// key nya adalah string yang kita buat sendiri

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
 	<title>Latihan Array 2</title>
 </head>
 <body>
 	<?php foreach ($mahasiswa as $mhs): ?>
 		<ul>
 			<li><img src="img/<?php echo $mhs["gambar"]; ?>" alt="" width="100px" height="100px"></li>
 			<li>Nama :<?php echo $mhs["nama"]; ?></li>
 			<li>NPM : <?php echo $mhs["npm"]; ?></li>
 			<li>Email : <?php echo $mhs["email"]; ?></li>
 			<li>Jurusan : <?php echo $mhs["jurusan"]; ?></li>
 		</ul>
 	<?php endforeach ?>
 </body>
 </html>