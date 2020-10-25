<?php 
	// pengulanga pada array

	$angka = [1,4,3,6,4,2,6,11,33,33,44,2,3,1];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan 2</title>
 	<style type="text/css">
 		.kotak{
 			width: 50px;
 			height: 50px;
 			background-color: salmon;
 			text-align: center;
 			line-height: 50px;
 			margin: 3px;
 			float: left;
 		}
 		.clear{
 			clear: both;
 		}
 	</style>
 </head>
 <body>
 	<!-- cara pertama -->
 	<?php  for($i = 0; $i < count($angka); $i++) : ?>
 		 <div class="kotak"><?php echo $angka[$i]; ?></div>
 	<?php endfor; ?>


 	<div class="clear"></div>

 	<?php foreach($angka as $a) : ?>
 		<div class="kotak"><?= $a; ?></div>
	<?php endforeach; ?>
 </body>
 </html>