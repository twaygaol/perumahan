<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PROFIL \\
$module   = @$_GET['profilweb'];

if ($module == "add"){
    $titlewebsite     = @$_POST['titlewebsite'];
    $titleparagraf    = @$_POST['titleparagraf'];
    $welcomeparagraf  = @$_POST['welcomeparagraf'];
    $author           = @$_POST['author'];
    $copyright        = @$_POST['copyright'];
    $description      = @$_POST['description'];
    $keywords         = @$_POST['keywords'];
    $icon             = @$_FILES['icon']['name'];
    $location         = @$_FILES['icon']['tmp_name'];
    $lang_profile     = @$_POST['lang_profile'];      

    $tambah     = "INSERT INTO tbl_profile (titlewebsite, titleparagraf, welcomeparagraf, author, copyright, description, keywords, icon, lang_profile)
                  VALUES ('$titlewebsite', '$titleparagraf', '$welcomeparagraf', '$author', '$copyright', '$description', '$keywords', '$icon','$lang_profile')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Profil Halaman Website</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_profile/aksi.php?profilweb=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Website</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"titlewebsite\" oninvalid=\"alert('Nama website harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul Paragraf</label>
                          <div class=\"col-sm-10\">
                               <input type=\"text\" class=\"form-control\" name=\"titleparagraf\" oninvalid=\"alert('Judul paragraf harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi Paragraf</label>
                          <div class=\"col-sm-10\">
                             <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\"  name=\"welcomeparagraf\" oninvalid=\"alert('Informasi paragraf harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Author</label>
                          <div class=\"col-sm-10\">
                               <input type=\"text\" class=\"form-control\" name=\"author\" oninvalid=\"alert('Author harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Copyright</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"copyright\" oninvalid=\"alert('Copyright harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Deskripsi</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"description\" oninvalid=\"alert('Deskripsi harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Keywords</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"keywords\" oninvalid=\"alert('Keywords harus di isi !');\"required></textarea>
                          </div>

                          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\"> 
                          <input type=\"file\" class=\"\" name=\"icon\" oninvalid=\"alert('Gambar belum di upload !');\"required><p></p>
                          </div>
                         

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>
                          </div>

                          
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_profile/aksi.php?profilweb=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_profile/profile.php?tblconf=profilweb\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                if ($lang_profile=="in"){
                       $lang_profile = "in";
                   }elseif ($lang_profile=="en"){
                       $lang_profile ="en";
                   }else{
                       $lang_profile ="in";                      
                   }
                move_uploaded_file($location, '../../../img/'. $icon);
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"profile.php?tblconf=profilweb\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?profilweb=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_profile  = @$_GET['id_profile'];

    $edit        = mysqli_query($link, "SELECT * FROM tbl_profile WHERE id_profile='$id_profile'");
    $showprofile = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Profil Halaman Website</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_profile/aksi.php?profilweb=update&id_profile=$showprofile[id_profile]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_profile\" value=\"$showprofile[id_profile]\">

                         
                          

                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Website</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"titlewebsite\" value=\"$showprofile[titlewebsite]\" oninvalid=\"alert('Nama website harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul Paragraf</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"titleparagraf\" value=\"$showprofile[titleparagraf]\" oninvalid=\"alert('Judul paragraf harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi Paragraf</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"welcomeparagraf\" oninvalid=\"alert('Infomasi paragraf harus di isi !');\"required>$showprofile[welcomeparagraf]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Author</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"author\" value=\"$showprofile[author]\" oninvalid=\"alert('Author harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Copyright</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"copyright\" value=\"$showprofile[copyright]\" oninvalid=\"alert('Copyright harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Deskripsi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"description\" oninvalid=\"alert('Deskripsi harus di isi !');\"required>$showprofile[description]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Keywords</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"keywords\" oninvalid=\"alert('Keywords harus di isi !');\"required>$showprofile[keywords]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\">
                          <div class=\"project\">
                          <div class=\"photo-wrapper\">
                              <div class=\"photo\"> 
                                <a class=\"fancybox\" href=\"../../../img/$showprofile[icon]\">
                                <img id=\"output_image\" class=\"img-responsive\" src=\"../../../img/$showprofile[icon]\" alt=\"../../../img/$showprofile[icon]\"></a>
                              </div>
                            </div>
                          </div>

                          <input type=\"file\" accept=\"image/*\" onchange=\"preview_image(this,'preview')\" class=\"\" name=\"icon\" value=\"$showprofile[icon]\" oninvalid=\"alert('Gambar belum di upload !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>";
                              ?>
                              <?php
                              $language_profile = @$showprofile[lang_profile];
                              if ($language_profile == "en"){
                                echo"
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios1\" value=\"in\">
                                Indonesia
                              </label>";
                              }else{
                                echo"
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios2\" value=\"en\">
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_profile\" id=\"optionsRadios1\" value=\"in\" checked>
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
                          <a href=\"../../module/mod_profile/aksi.php?profilweb=edit&id_profile=$showprofile[id_profile]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_profile       = @$_GET['id_profile'];
    $titlewebsite     = @$_POST['titlewebsite'];
    $titleparagraf    = @$_POST['titleparagraf'];
    $welcomeparagraf  = @$_POST['welcomeparagraf'];
    $author           = @$_POST['author'];
    $copyright        = @$_POST['copyright'];
    $description      = @$_POST['description'];
    $keywords         = @$_POST['keywords'];
    $icon             = @$_FILES['icon']['name'];
    $location         = @$_FILES['icon']['tmp_name'];
    $lang_profile     = @$_POST['lang_profile']; 

    $update       = "UPDATE tbl_profile SET titlewebsite='$titlewebsite', titleparagraf='$titleparagraf', welcomeparagraf='$welcomeparagraf', author='$author', copyright='$copyright', description='$description', keywords='$keywords', icon='$icon', lang_profile='$lang_profile' where id_profile='$id_profile'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                if ($lang_profile=="in"){
                       $lang_profile = "in";
                   }elseif ($lang_profile=="en"){
                       $lang_profile ="en";
                   }else{
                       $lang_profile ="in";                      
                   }
                  move_uploaded_file($location, '../../../img/'. $icon);
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"profile.php?tblconf=profilweb\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_profile/aksi.php?profilweb=edit&id_profile=$showprofile[id_profile]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_profile   = @$_GET['id_profile'];
    $tampil       = mysqli_query($link, "SELECT * FROM tbl_profile WHERE id_profile='$id_profile'");
    $showprofile  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_profile WHERE id_profile='$id_profile'";
    if (mysqli_query ($link, $hapus)) {
        unlink("../../../img/$showprofile[icon]"); 
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"profile.php?tblconf=profilweb\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_profile/aksi.php?profilconf=edit&id_profile=$data_profile[id_profile]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


