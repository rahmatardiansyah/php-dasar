<?php
  // Variable tidak boleh dengan angka, tapi boleh mengandung angka
  $nama = "Rahmat Ardiansyah";
  echo "$nama";
  echo "<br>";
  // Operator aritmatika
  $x = 10;
  $y = 20;
  echo $x + $y;
  echo "<br>";

  $nama_depan = "rahmat";
  $nama_belakang = "ardiansyah";

  echo $nama_depan . " " . $nama_belakang;
  echo "<br>";
  echo "<br>";

  $x = 1;
  $x = 5;
  // x ditimpa
  echo $x;

  echo "<br>";
  echo "<br>";

  $nama2 = "rahmat";
  $nama2 .= " ";
  $nama2 .= "ardiansyah";

  echo $nama2;

  // perbandingan
  // < , > , <=, >= ,==
  //
  echo "<br>";
  echo "<br>";
  var_dump(1>5);
  echo "<br>";
  echo "<br>";
  var_dump(1 == "1");

  // Operator identitas
  //
  // ===
  // !==
  //

  echo "<br>";
  echo "<br>";
  var_dump(1 === "1");

  // Operator Logika
  //
  // && , ||, !
  echo "<br>";
  echo "<br>";
  $x = 10;
  var_dump($x < 6 && $x % 2 == 0);


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belajar PHP</title>
</head>
<body>
<h1>Halo,Selamat Datang <?php echo $nama; ?></h1>
</body>
</html>
