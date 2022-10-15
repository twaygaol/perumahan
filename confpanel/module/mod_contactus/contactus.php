<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE KONTAK KAMI \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Kontak Kami</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Informasi</th>
                    <th><i class=\"\"></i> Alamat Lengkap</th>
                    <th><i class=\"\"></i> Google Map Point</th>
                    <th><i class=\"\"></i> No. Telepon</th>
                    <th><i class=\"\"></i> Alamat Email</th>
                    <th><i class=\"\"></i> ID Facebook</th>
                    <th><i class=\"\"></i> ID Twitter</th>
                    <th><i class=\"\"></i> ID Instagram</th>
                    <th><i class=\"\"></i> ID Youtube</th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_contactus = mysqli_query ($link, "SELECT * FROM tbl_contactus ORDER BY id_contactus DESC");
while ($data_contactus = mysqli_fetch_assoc($tampil_contactus)) {
$kalimat_contactusdescription  = $data_contactus['description_contactus'];  
$cetak_contactusdescription    = substr($kalimat_contactusdescription, 0, 10) . "...";
$kalimat_contactusaddress  = $data_contactus['address'];  
$cetak_contactusaddress    = substr($kalimat_contactusaddress, 0, 10) . "...";
$kalimat_contactusmappingpoint  = $data_contactus['mappingpoint'];  
$cetak_contactusmappingpoint    = substr($kalimat_contactusmappingpoint, 0, 10) . "...";
$kalimat_contactusphone  = $data_contactus['phone'];  
$cetak_contactusphone    = substr($kalimat_contactusphone, 0, 5) . "...";
$kalimat_contactusemail  = $data_contactus['email'];  
$cetak_contactusemail    = substr($kalimat_contactusemail, 0, 5) . "...";
echo"
                  <tr>
                    <td>$id_contactus</td>
                    <td>$cetak_contactusdescription</td>
                    <td>$cetak_contactusaddress</td>
                    <td>$cetak_contactusmappingpoint</td>
                    <td>$cetak_contactusphone</td>
                    <td>$cetak_contactusemail</td>
                    <td>$data_contactus[id_facebook]</td>
                    <td>$data_contactus[id_twitter]</td>
                    <td>$data_contactus[id_instagram]</td>
                    <td>$data_contactus[id_youtube]</td>
                    <td>";
                    ?>
                    <?php
                      $language_contactus = $data_contactus['lang_contactus'];
                      if ($language_contactus=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data_contactus[lang_contactus]</span>
                    </td>
                    <td>
                      <a href=\"../../module/mod_contactus/aksi.php?kontak=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_contactus/aksi.php?kontak=edit&id_contactus=$data_contactus[id_contactus]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_contactus/aksi.php?kontak=hapus&id_contactus=$data_contactus[id_contactus]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_contactus++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_contactus; $i++){
                    echo"
                      <a href=\"contactus.php?pageconf=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
