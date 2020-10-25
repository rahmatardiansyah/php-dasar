<?php 
	// untuk menampilkan tanggal dengan format tertentu
	//echo date("l, d-M-Y");
	
	// unix Timestamp / EPOCH time
	// detik yang berlalu sejak 1 Januari 1970
	// echo time();

	// echo date("l, d-M-Y", time()-60*60*24*3);

	// mktime
	// membuat sendiri detik
	// mktime(0,0,0,0,0,0)
	// jam,menit,detik,bulan,tanggal,tahun
	// echo date("l", mktime(0,0,0,4,21,2001));

	// strtotime()
	echo date("l", strtotime("21 Apr 2001"));

 ?>