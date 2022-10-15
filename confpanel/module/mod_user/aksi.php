<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE USER \\
$module   = @$_GET['user'];

if ($module == "add"){
    $username = @$_POST['username'];
    $password = @$_POST['password'];

    $tambah     = "INSERT INTO tbl_user (username, password)
                  VALUES ('$username', '$password')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel User</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_user/aksi.php?user=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">User Name</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"username\" oninvalid=\"alert('User Name harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Password</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"password\" oninvalid=\"alert('Password harus di isi !');\"required>
                          </div>

                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_user/aksi.php?user=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_user/user.php?tbl=user\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"user.php?tbl=user\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?user=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_user = @$_GET['id_user'];
    $edit           = mysqli_query($link, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
    $showuser  = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel user</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_user/aksi.php?user=update&id_user=$showuser[id_user]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_user\" value=\"$showuser[id_user]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">User Name</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"username\" value=\"$showuser[username]\" oninvalid=\"alert('User name Lengkap harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Password</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"password\" value=\"$showuser[password]\" oninvalid=\"alert('Password harus di isi !');\"required>
                          </div>

                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_user/aksi.php?user=edit&id_user=$showuser[id_user]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
                          <a href=\"#\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Reset</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
}

if ($module == "update"){
    $id_user  = @$_GET['id_user'];
    $username = @$_POST['username'];
    $password = @$_POST['password'];

    $update       = "UPDATE tbl_user SET username='$username', password='$password' where id_user='$id_user'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"user.php?tblconf=user\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_user/aksi.php?user=edit&id_user=$showuser[id_user]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_user   = @$_GET['id_user'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
    $showuser  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_user WHERE id_user='$id_user'";
    if (mysqli_query ($link, $hapus)) {
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"user.php?tblconf=user\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_user/aksi.php?user=edit&id_user=$data_user[id_user]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


