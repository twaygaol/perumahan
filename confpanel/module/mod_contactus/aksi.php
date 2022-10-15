<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE KONTAK KAMI \\
$module   = @$_GET['kontak'];

if ($module == "add"){
    $description_contactus = @$_POST['description_contactus'];
    $address               = @$_POST['address'];
    $mappingpoint          = @$_POST['mappingpoint'];
    $phone                 = @$_POST['phone'];
    $email                 = @$_POST['email'];
    $id_facebook           = @$_POST['id_facebook'];
    $id_twitter            = @$_POST['id_twitter'];
    $id_instagram          = @$_POST['id_instagram'];
    $id_youtube            = @$_POST['id_youtube'];
    $lang_contactus        = @$_POST['lang_contactus'];      

    $tambah     = "INSERT INTO tbl_contactus (description_contactus, address, mappingpoint, phone, email, id_facebook, id_twitter, id_instagram, id_youtube, lang_contactus)
                  VALUES ('$description_contactus', '$address', '$mappingpoint', '$phone', '$email', '$id_facebook', '$id_twitter', '$id_instagram', '$id_youtube', '$lang_contactus')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Kontak Kami</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_contactus/aksi.php?kontak=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                         
                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"description_contactus\" oninvalid=\"alert('Informasi harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Alamat Lengkap</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"address\" oninvalid=\"alert('Alamat lengkap harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Google Map Point</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"mappingpoint\" oninvalid=\"alert('Google Map Point harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">No. Telepon</label>
                          <div class=\"col-sm-10\">
                              <input type=\"tel\" class=\"form-control\" name=\"phone\" oninvalid=\"alert('No. Telepon harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Alamat Email</label>
                          <div class=\"col-sm-10\">
                              <input type=\"email\" class=\"form-control\" name=\"email\" oninvalid=\"alert('Alamat email harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Facebook</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_facebook\" oninvalid=\"alert('ID facebook harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Twitter</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_twitter\" oninvalid=\"alert('ID Twitter harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Instagram</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_instagram\" oninvalid=\"alert('ID Instagram harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Youtube</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_youtube\" oninvalid=\"alert('ID Youtube harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_contactus/aksi.php?kontak=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_contactus/contactus.php?tblconf=kontak\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                if ($lang_contactus=="in"){
                       $lang_contactus = "in";
                   }elseif ($lang_contactus=="en"){
                       $lang_contactus ="en";
                   }else{
                       $lang_contactus ="in";                      
                   }
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"contactus.php?tblconf=contactus\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?kontak=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_contactus          = @$_GET['id_contactus'];

    $edit         = mysqli_query($link, "SELECT * FROM tbl_contactus WHERE id_contactus='$id_contactus'");
    $showcontactus = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Kontak Kami</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_contactus/aksi.php?kontak=update&id_contactus=$showcontactus[id_contactus]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_contactus\" value=\"$showcontactus[id_contactus]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"description_contactus\" value=\"\" oninvalid=\"alert('Informasi harus di isi !');\"required>$showcontactus[description_contactus]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Alamat Lengkap</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"address\" value=\"\" oninvalid=\"alert('Alamat lengkap harus di isi !');\"required>$showcontactus[address]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Google Map Point</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"2\" type=\"text\" class=\"form-control\" name=\"mappingpoint\" oninvalid=\"alert('Google Map Point harus di isi !');\"required>$showcontactus[mappingpoint]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">No. Telepon</label>
                          <div class=\"col-sm-10\">
                              <input type=\"tel\" class=\"form-control\" name=\"phone\" value=\"$showcontactus[phone]\" oninvalid=\"alert('No. Telepon harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Alamat Email</label>
                          <div class=\"col-sm-10\">
                              <input type=\"email\" class=\"form-control\" name=\"email\" value=\"$showcontactus[email]\" oninvalid=\"alert('Alamat email harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Facebook</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_facebook\" value=\"$showcontactus[id_facebook]\" oninvalid=\"alert('ID facebook harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Twitter</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_twitter\" value=\"$showcontactus[id_twitter]\" oninvalid=\"alert('ID twitter harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Instagram</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_instagram\" value=\"$showcontactus[id_instagram]\" oninvalid=\"alert('ID Instagram harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">ID Youtube</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"id_youtube\" value=\"$showcontactus[id_youtube]\" oninvalid=\"alert('ID Youtube harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>";
                              ?>
                              <?php
                              $language_contactus = @$showcontactus[lang_contactus];
                              if ($language_contactus == "en"){
                                echo"
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios1\" value=\"in\">
                                Indonesia
                              </label>";
                              }else{
                                echo"
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios2\" value=\"en\">
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_contactus\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>";
                              }
                              ?>
                              <?php
                              echo"
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_contactus/aksi.php?kontak=edit&id_contactus=$showcontactus[id_contactus]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_contactus          = @$_GET['id_contactus'];
    $description_contactus = @$_POST['description_contactus'];
    $address               = @$_POST['address'];
    $mappingpoint          = @$_POST['mappingpoint'];
    $phone                 = @$_POST['phone'];
    $email                 = @$_POST['email'];
    $id_facebook           = @$_POST['id_facebook'];
    $id_twitter            = @$_POST['id_twitter'];
    $id_instagram          = @$_POST['id_instagram'];
    $id_youtube            = @$_POST['id_youtube'];
    $lang_contactus        = @$_POST['lang_contactus'];    

    $update       = "UPDATE tbl_contactus SET description_contactus='$description_contactus', address='$address', mappingpoint='$mappingpoint', phone='$phone', email='$email', id_facebook='$id_facebook', id_twitter='$id_twitter', id_instagram='$id_instagram', id_youtube='$id_youtube', lang_contactus='$lang_contactus' where id_contactus='$id_contactus'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                if ($lang_contactus=="in"){
                       $lang_contactus = "in";
                   }elseif ($lang_contactus=="en"){
                       $lang_contactus ="en";
                   }else{
                       $lang_contactus ="in";                      
                   }
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"contactus.php?tblconf=kontak\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_contactus/aksi.php?kontak=edit&id_contactus=$showcontactus[id_contactus]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_contactus   = @$_GET['id_contactus'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_contactus WHERE id_contactus='$id_contactus'");
    $showcontactus  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_contactus WHERE id_contactus='$id_contactus'";
    if (mysqli_query ($link, $hapus)) {
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"contactus.php?tblconf=kontak\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_contactus/aksi.php?kontak=edit&id_contactus=$data_contactus[id_contactus]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


