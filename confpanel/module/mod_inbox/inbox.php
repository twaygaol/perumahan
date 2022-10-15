<?php 
require ('../../timer_module.php');

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE INBOX \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Inbox</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Tanggal Diterima</th>
                    <th><i class=\"\"></i> Nama Pengirim</th>
                    <th><i class=\"\"></i> Alamat Email</th>
                    <th><i class=\"\"></i> NO.Hendphone</th>
                    <th><i class=\"\"></i></th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_inbox = mysqli_query ($link, "SELECT * FROM tbl_inbox ORDER BY id_inbox DESC");
while ($data_inbox = mysqli_fetch_assoc($tampil_inbox)) {
$kalimat_inbox  = $data_inbox['message_inbox'];  
$cetak_inbox    = substr($kalimat_inbox, 0, 55) . "...";
echo"
                  <tr>
                    <td>$id_inbox</td>
                    <td><i><u>$data_inbox[date_receive_inbox]</u></i></td>
                    <td>$data_inbox[name_inbox]</td>
                    <td>$data_inbox[email_inbox]</td>
                    <td>$data_inbox[subject_inbox]</td>
                    <td>$cetak_inbox</td>
                    <td>
                      <a href=\"../../module/mod_inbox/aksi.php?inbox=edit&id_inbox=$data_inbox[id_inbox]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-search\"></i></button></a>
                      <a href=\"../../module/mod_inbox/aksi.php?inbox=hapus&id_inbox=$data_inbox[id_inbox]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_inbox++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_inbox; $i++){
                    echo"
                      <a href=\"inbox.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
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

 
