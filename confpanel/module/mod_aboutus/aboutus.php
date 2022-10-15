<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE TENTANG KAMI \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Tentang Kami</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Informasi Menu</th>
                    <th><i class=\"\"></i> Judul Menu</th>
                    <th><i class=\"\"></i> Detail Deskripsi</th>
                    <th><i class=\"\"></i> Gambar</th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_aboutus = mysqli_query ($link, "SELECT * FROM tbl_aboutus ORDER BY id_aboutus DESC");
while ($data_aboutus = mysqli_fetch_assoc($tampil_aboutus)) {
$kalimat_aboutus  = $data_aboutus['detail_aboutus'];  
$cetak_aboutus    = substr($kalimat_aboutus, 0, 55) . "...";
echo"
                  <tr>
                    <td>$id_aboutus</td>
                    <td>$data_aboutus[description_aboutus]</td>
                    <td>$data_aboutus[title_aboutus]</td>
                    <td>$cetak_aboutus</td>
                    <td>
                    <a class=\"fancybox\" href=\"../../../img/$data_aboutus[pict_aboutus]\">$data_aboutus[pict_aboutus]</a>
                    </td>
                    <td>
                    ";
                    ?>
                    <?php
                      $language_aboutus = $data_aboutus['lang_aboutus'];
                      if ($language_aboutus=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data_aboutus[lang_aboutus]</span>
                    </td>
                    <td>
                      <a href=\"../../module/mod_aboutus/aksi.php?tentangkami=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_aboutus/aksi.php?tentangkami=edit&id_aboutus=$data_aboutus[id_aboutus]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_aboutus/aksi.php?tentangkami=hapus&id_aboutus=$data_aboutus[id_aboutus]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_aboutus++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_aboutus; $i++){
                    echo"
                      <a href=\"aboutus.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
