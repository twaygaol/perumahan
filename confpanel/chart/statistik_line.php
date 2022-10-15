<!DOCTYPE html>
<head><title>Statistik Pengunjung</title>
	<link href="css/basic.css" type="text/css" rel="stylesheet" />
	<link href="css/visualize.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery.min.js"></script>		
	<script type="text/javascript" src="js/visualize.jQuery.js"></script>		
	<script type="text/javascript">
	$(function(){
	   $('table').visualize({type: 'line', width: '420px'});
  });
  </script>
</head>
<body>

<?php
$konek    = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');

$tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
//$tgl_skrg = date("20140117"); // untuk simulasi saja sesuai dengan di database

// dapatkan 6 hari sblm tgl sekarang 
$seminggu = strtotime("-1 week +1 day",strtotime($tgl_skrg));
$hasilnya = date('Y-m-d', $seminggu);

echo "<table>
	     <caption>Statistik Pengunjung (Seminggu Terakhir)</caption>
	       <thead>
		      <tr>
			     <td></td>";
   
for ($i=0; $i<=6; $i++){
  $urutan_tgl   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_urutan = date("d/m/y", $urutan_tgl);      
  echo "<th>$hasil_urutan</th>";    
}

echo "</tr>
	</thead>
	   <tbody>
        <tr>
          <th>Visitor</th>";

for ($i=0; $i<=6; $i++){
  $tgl_pengujung   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_pengujung = date("Y-m-d", $tgl_pengujung);
  $query_pengujung = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$hasil_pengujung' GROUP BY ip"));
  echo "<td>$query_pengujung</td>";    
}
  
echo "</tr>
      <tr>
        <th>Hits</th>";

for ($i=0; $i<=6; $i++){
  $tgl_hits   = strtotime("+$i day",strtotime($hasilnya));
  $hasil_hits = date('Y-m-d', $tgl_hits);
  $query_hits = mysqli_fetch_array(mysqli_query($konek, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$hasil_hits' GROUP BY tanggal"));

  $hits_today = $query_hits['hitstoday'];
    
  if ($hits_today==""){ $hits_today="0"; }

  echo "<td>$hits_today</td>";
}
    
echo "</tr>
    </tbody>
  </table>";
?> 
