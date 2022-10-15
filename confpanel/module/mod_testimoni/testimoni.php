<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE TESTIMONI \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Testimoni</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Nama Lengkap</th>
                    <th><i class=\"\"></i> Informasi</th>
                    <th><i class=\"\"></i> Detail Testimoni</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_testimoni = mysqli_query ($link, "SELECT * FROM tbl_testimonial ORDER BY id_testimonial DESC");
while ($data_testimoni = mysqli_fetch_assoc($tampil_testimoni)) {
$kalimat_testimoni  = $data_testimoni['detail_testimonial'];  
$cetak_testimoni    = substr($kalimat_testimoni, 0, 55) . "...";
echo"
                  <tr>
                    <td>$id_testimoni</td>
                    <td>$data_testimoni[fullname_testimonial]</td>
                    <td>$data_testimoni[description_testimonial]</td>
                    <td>$cetak_testimoni</td>
                    <td>
                       <a href=\"../../module/mod_testimoni/aksi.php?testimoni=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_testimoni/aksi.php?testimoni=edit&id_testimonial=$data_testimoni[id_testimonial]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_testimoni/aksi.php?testimoni=hapus&id_testimonial=$data_testimoni[id_testimonial]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_testimoni++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_testimoni; $i++){
                    echo"
                      <a href=\"testimoni.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
