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


 ?>