<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE INBOX \\
$module   = @$_GET['inbox'];

if ($module == "edit"){
    $id_inbox  = @$_GET['id_inbox'];

    $edit      = mysqli_query($link, "SELECT * FROM tbl_inbox WHERE id_inbox='$id_inbox'");
    $showinbox = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Detail Inbox</h4>
                  <hr>
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_inbox\" value=\"$showinbox[id_inbox]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Tanggal Diterima</label>
                          <div class=\"col-sm-10\">
                              <p><i><u>$showinbox[date_receive_inbox]</u></i></p>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Pengirim</label>
                          <div class=\"col-sm-10\">
                              <p><i>$showinbox[name_inbox]</i></p>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Alamat Email</label>
                          <div class=\"col-sm-10\">
                              <p><i>$showinbox[email_inbox]</i></p>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">NO.Hendphone</label>
                          <div class=\"col-sm-10\">
                              <p><b><i>$showinbox[subject_inbox]</i></b></p>
                          </div>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_inbox/inbox.php?tbl=inbox\"><button type=\"submit\" name=\"close\" class=\"btn btn-success\">Tutup</button></a>
                      </div>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
}

if ($module == "update"){
    $id_inbox          = @$_GET['id_inbox'];
    $name_inbox        = @$_POST['name_inbox'];
    $email_inbox       = @$_POST['email_inbox'];
    $subject_inbox     = @$_POST['subject_inbox'];
    $message_inbox     = @$_POST['message_inbox'];  

    $update       = "UPDATE tbl_inbox SET name_inbox='$name_inbox', email_inbox='$email_inbox', subject_inbox='$subject_inbox', message_inbox='$message_inbox' where id_inbox='$id_inbox'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"inbox.php?tbl=inbox\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_inbox/aksi.php?inbox=edit&id_inbox=$showinbox[id_inbox]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_inbox   = @$_GET['id_inbox'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_inbox WHERE id_inbox='$id_inbox'");
    $showinbox  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_inbox WHERE id_inbox='$id_inbox'";
    if (mysqli_query ($link, $hapus)) {
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"inbox.php?tbl=inbox\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_inbox/aksi.php?inbox=edit&id_inbox=$data_inbox[id_inbox]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


