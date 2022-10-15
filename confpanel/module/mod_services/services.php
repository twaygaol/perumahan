<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PELAYANAN DAN PRODUK \\
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
                    <th><i class=\"\"></i> Gambar</th>
                    <th><i class=\"\"></i> Judul</th>
                    <th><i class=\"\"></i> Informasi</th>
                    <th><i class=\"\"></i> Detail Deskripsi</th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_services = mysqli_query ($link, "SELECT * FROM tbl_services ORDER BY id_services DESC");
while ($data_services = mysqli_fetch_assoc($tampil_services)) {
$kalimat_services  = $data_services['detail_services'];  
$cetak_services    = substr($kalimat_services, 0, 10) . "...";
echo"
                  <tr>
                    <td>$id_services</td>
                    <td><a class=\"fancybox\" href=\"../../../img/$data_services[pict_services]\">$data_services[pict_services]</a></td>
                    <td>$data_services[title_services]</td>
                    <td>$data_services[description_services]</td>
                    <td>$cetak_services</td>
                    <td>";
                    ?>
                    <?php
                      $language_services = $data_services['lang_services'];
                      if ($language_services=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data_services[lang_services]</span>
                    </td>
                    <td>
                      <a href=\"../../module/mod_services/aksi.php?pelayanandanproduk=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_services/aksi.php?pelayanandanproduk=edit&id_services=$data_services[id_services]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_services/aksi.php?pelayanandanproduk=hapus&id_services=$data_services[id_services]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_services++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_services; $i++){
                    echo"
                      <a href=\"services.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

include '../../footer_module.php';
}
?>

 
