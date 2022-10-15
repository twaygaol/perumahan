<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE GALERI \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Galeri</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Kategori</th>
                    <th><i class=\"\"></i> Gambar</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_gallery = mysqli_query ($link, "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC");
while ($data_gallery = mysqli_fetch_assoc($tampil_gallery)) {
echo"
                  <tr>
                    <td>$id_gallery</td>
                    <td>$data_gallery[category_gallery]</td>
                    <td><a class=\"fancybox\" href=\"../../../img/$data_gallery[pict_gallery]\">$data_gallery[pict_gallery]</a></td>
                    <td>
                      <a href=\"../../module/mod_gallery/aksi.php?galeri=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_gallery/aksi.php?galeri=edit&id_gallery=$data_gallery[id_gallery]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_gallery/aksi.php?galeri=hapus&id_gallery=$data_gallery[id_gallery]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                    </td>
                  </tr>";
                  $id_gallery++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_gallery; $i++){
                    echo"
                      <a href=\"gallery.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
