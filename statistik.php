<html>
<head><title>Statistik Pengunjung</title></head>
<body>

<?php
$ip      = $_SERVER['REMOTE_ADDR']; // Dapatkan IP user
$tanggal = date("Ymd"); // Dapatkan tanggal sekarang
$waktu   = time(); // Dapatkan nilai waktu

$konek = mysqli_connect("sql208.epizy.com","epiz_32794488","5SQu2CZ204D","epiz_32794488_db_companyprofile");

// Cek user yang mengakses berdasarkan IP-nya 
$s = mysqli_query($konek, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
// Kalau belum ada, simpan datanya sebagai user baru
if(mysqli_num_rows($s) == 0){
  mysqli_query($konek, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip', '$tanggal', '1', '$waktu')");
}
// Kalau sudah ada, update data hits user  
else{
  mysqli_query($konek, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$query1     = mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip");
$pengunjung = mysqli_num_rows($query1);

$query2        = mysqli_query($konek, "SELECT COUNT(hits) as total FROM statistik");
$hasil2        = mysqli_fetch_array($query2);
$totpengunjung = $hasil2['total'];
 
$query3 = mysqli_query($konek, "SELECT SUM(hits) as jumlah FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal");
$hasil3 = mysqli_fetch_array($query3);
$hits   = $hasil3['jumlah'];
 
$query4  = mysqli_query($konek, "SELECT SUM(hits) as total FROM statistik");
$hasil4  = mysqli_fetch_array($query4);
$tothits = $hasil4['total'];  

// Cek berapa pengunjung yang sedang online
$bataswaktu       = time() - 300; 
$pengunjungonline = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE online > '$bataswaktu'"));


// Angka total pengunjung dalam bentuk gambar
$folder = "counter"; // nama folder
$ext    = ".png";     // ekstension file gambar

// ubah digit angka menjadi enam digit
$totpengunjunggbr = sprintf("%06d", $totpengunjung);
// ganti angka teks dengan angka gambar
for ($i = 0; $i <= 9; $i++){
	$totpengunjunggbr = str_replace($i, "<img src=\"$folder/$i$ext\" alt=\"$i\" hidden>", $totpengunjunggbr);
} 

echo "<h3 hidden>Statistik Pengunjung</h3>
       $totpengunjunggbr<br><br>
    
      <img src=\"$folder/hariini.png\" hidden> <p hidden>Pengunjung hari ini : $pengunjung </p>
      <img src=\"$folder/total.png\" hidden><p hidden> Total pengunjung    : $totpengunjung </p>
      
      <img src=\"$folder/hariini.png\" hidden> <p hidden> Hits hari ini  :  $hits</p>
      <img src=\"$folder/total.png\" hidden> <p hidden>Total hits     :  $tothits</p>
      
      <img src=\"$folder/online.png\" hidden> <p hidden>Pengunjung Online : $pengunjungonline </p>";
?> 
