<?php 
include 'header_module.php';
include 'menu.php';
include 'control.php';

// MODULE PELAYANAN DAN PRODUK \\
if (@$_GET['tbl']=='pelayanandanproduk'){
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Pelayanan dan Produk</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Judul</th>
                    <th><i class=\"\"></i> Informasi</th>
                    <th><i class=\"\"></i> Detail Deskripsi</th>
                    <th><i class=\"\"></i> Gambar</th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$showstudi = mysqli_query ($link, "SELECT * FROM tbl_services ORDER BY id_services ASC");
while ($data = mysqli_fetch_assoc($tampil)) {
$kalimat  = $data['detail_services'];  
$cetak    = substr($kalimat, 0, 55) . "...";
echo"
                  <tr>
                    <td>$id_services</td>
                    <td>$data[title_services]</td>
                    <td>$data[description_services]</td>
                    <td>$cetak</td>
                    <td><a href=\"index.php#\">$data[pict_services]</a></td>
                    <td>";
                    ?>
                    <?php
                      $language = $data['lang_services'];
                      if ($language=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data[lang_services]</span>
                    </td>
                    <td>
                      <button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button>
                      <button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button>
                      <button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button>
                    </td>
                  </tr>";
                  $id_services++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages; $i++){
                    echo"
                      <a href=\"galeri.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
                  }
                  echo"  
                </div>";
        mysqli_close($link);                
               
               echo"
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->
    </section>
    </section>";    
}

include 'footer_module.php';
?>

 
