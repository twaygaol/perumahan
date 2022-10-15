<!DOCTYPE html>
<head><title>Statistik Pengunjung</title>
	<link href="css/basic.css" rel="stylesheet" />
	<link href="css/visualize.css" rel="stylesheet" />
  <script src="chart/js/jquery.min.js"></script>        
  <script src="chart/js/visualize.jQuery.js"></script>      
 
</head>
<body>
  <table style="width:100%";>
    <caption>STATISTIK PENGUNJUNG ( Seminggu Terakhir )</caption>
     <thead>
        <tr>
          <th>Tanggal</th>
          <th>Pengunjung</th>
          <th>Hits</th>
        </tr>
     </thead>
        <tbody>


<?php
$konek    = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');

$tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
// $tgl_skrg = date("Y-m-d"); // untuk simulasi saja sesuai dengan di database

// dapatkan 6 hari sblm tgl sekarang 
$seminggu = strtotime("-1 week +1 day",strtotime($tgl_skrg));
$hasilnya = date("Y-m-d", $seminggu);

//lakukan looping sebanyak 6 kali   
for ($i=0; $i<=6; $i++){
  $urutan_tgl   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_urutan = date("d-M-Y", $urutan_tgl);
    
  $tgl_pengujung   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_pengujung = date("Y-m-d", $tgl_pengujung);
  $query_pengujung = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$hasil_pengujung' GROUP BY ip"));
   
  $tgl_hits   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_hits = date("Y-m-d", $tgl_hits);
  $query_hits = mysqli_fetch_array(mysqli_query($konek, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$hasil_hits' GROUP BY tanggal"));
    
  $hits_today = $query_hits['hitstoday'];
    
  if ($hits_today==""){ $hits_today="0"; }
      
  echo "<tr>
        <td>$hasil_urutan</td>
        <td>$query_pengujung</td>
        <td>$hits_today</td>
        </tr>";    
}
?> 
      </tbody>
    </table>
