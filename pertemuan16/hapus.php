<?php 
	session_start();
	//jika tidak ada variabel $_SESSION yang elemennya ["login"],maka pindahkan user ke halaman login.php
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php';
	
	// tangkap id nya dulu dengan $_GET karena id dikirim menggunakan url
	$id = $_GET["id"];

	// cek apakah ada baris yang berubah atau tidak -1/1
	if(hapus($id) > 0){
		echo "<script>
			alert('data berhasil dihapus!!');
			document.location.href = 'index.php';
			</script>";
	}else{
		echo "<script>
			alert('data gagal dihapus!');
			document.location.href = 'index.php';
			</script>";
	}
 ?>