<?php 
	
	// array
	// variabel yang dapat memiliki banyak nilai
	// nilai yang ada di dalam array adalah elemen
	// array pada php tipe datanya boleh beda
	// pasangan antara key dan value
	// key nya adalah index, yang dimulai dari 0
	$hari = ["senin","selasa","rabu"];

	// cara menpilkan array ada 2
	// 1.var_dump()
	// 2.print_r()

	// var_dump($hari);
	// echo "<br>";
	// echo "<br>";
	// print_r($hari);
	// echo "<br>";
	// echo "<br>";
	// menampilkan 1 elemen pada array
	// echo $hari[0];
	// echo "<br>";
	// echo "<br>";
	// echo $hari[2];
	// echo "<br>";
	// echo "<br>";

	//menambahkan elemen baru pada array

	var_dump($hari);

	echo "<br>";
	echo "<br>";

	$hari[] = "kamis"; 
	$hari[] = "jum'at";
	var_dump($hari);


?>