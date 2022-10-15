<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PROFIL \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Profile Halaman Website</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Nama Website</th>
                    <th><i class=\"\"></i> Judul Paragraf</th>
                    <th><i class=\"\"></i> Informasi Paragraf</th>
                    <th><i class=\"\"></i> Author</th>
                    <th><i class=\"\"></i> Copyright</th>
                    <th><i class=\"\"></i> Deskripsi</th>
                    <th><i class=\"\"></i> Keywords</th>
                    <th><i class=\"\"></i> Icon</th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_profile = mysqli_query ($link, "SELECT * FROM tbl_profile ORDER BY id_profile DESC");
while ($data_profile = mysqli_fetch_assoc($tampil_profile)) {
$kalimat_welcomeparagraf  = $data_profile['welcomeparagraf'];  
$cetak_welcomeparagraf    = substr($kalimat_welcomeparagraf, 0, 10) . "...";
$kalimat_titleparagraf  = $data_profile['titleparagraf'];  
$cetak_titleparagraf    = substr($kalimat_titleparagraf, 0, 10) . "...";
$kalimat_description  = $data_profile['description'];  
$cetak_description    = substr($kalimat_description, 0, 10) . "...";
$kalimat_keyword  = $data_profile['keywords'];  
$cetak_keyword    = substr($kalimat_keyword, 0, 10) . "...";
echo"
                  <tr>
                    <td>$id_profile</td>
                    <td>$data_profile[titlewebsite]</td>
                    <td>$cetak_titleparagraf</td>
                    <td>$cetak_welcomeparagraf</td>
                    <td>$data_profile[author]</td>
                    <td>$data_profile[copyright]</td>
                    <td>$cetak_description</td>
                    <td>$cetak_keyword</td>
                    <td><a class=\"fancybox\" href=\"../../../img/$data_profile[icon]\">$data_profile[icon]</a></td>
                    <td>";
                    ?>
                    <?php
                      $language_profile = $data_profile['lang_profile'];
                      if ($language_profile=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data_profile[lang_profile]</span>
                    </td>
                    <td>
                      <a href=\"../../module/mod_profile/aksi.php?profilweb=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_profile/aksi.php?profilweb=edit&id_profile=$data_profile[id_profile]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_profile/aksi.php?profilweb=hapus&id_profile=$data_profile[id_profile]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_profile++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_profile; $i++){
                    echo"
                      <a href=\"profile.php?pageconf=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
