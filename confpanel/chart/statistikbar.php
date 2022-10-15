
<body>
  <table class="tbl_statistik">
    <caption class="caption_statistik">Statistik Pengunjung (Seminggu Terakhir)</caption>
      <thead class="thead_statistik">	
        <tr><th class="th_statistik">Tanggal</th><th class="th_statistik">Pengunjung</th><th class="th_statistik">Hits</th></tr>
      </thead>
        <tbody>

<?php
$konek    = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');

$tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
//$tgl_skrg = date("20130918"); // untuk simulasi saja sesuai dengan di database

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
      
  echo "<tr><td class=\"td_statistik\">$hasil_urutan</td><td class=\"td_statistik\">$query_pengujung</td><td class=\"td_statistik\">$hits_today</td></tr>";    
}
?> 
    </table>
      </tbody>
