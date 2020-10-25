<?php 

// argument nya harus sesuai dengan parameter
function salam($waktu = "Datang",$nama = "Rahmat"){
	return "Selamat $waktu, $nama!";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan Function</title>
</head>
<body>
	<h1><?= salam("Pagi","Ardiansyah"); ?></h1>
</body>
</html>