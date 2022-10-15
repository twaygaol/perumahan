<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PELAYANAN DAN PRODUK \\
$module   = @$_GET['pelayanandanproduk'];

if ($module == "add"){
    $pict_services        = @$_FILES['pict_services']['name'];
    $location             = @$_FILES['pict_services']['tmp_name'];
    $title_services       = @$_POST['title_services'];
    $description_services = @$_POST['description_services'];
    $detail_services      = @$_POST['detail_services'];
    $lang_services        = @$_POST['lang_services'];      

    $tambah     = "INSERT INTO tbl_services (pict_services, title_services, description_services, detail_services, lang_services)
                  VALUES ('$pict_services', '$title_services', '$description_services', '$detail_services', '$lang_services')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Pelayanan dan Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_services/aksi.php?pelayanandanproduk=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\"> 
                          <input type=\"file\" class=\"\" name=\"pict_services\" oninvalid=\"alert('Gambar belum di upload !');\"required><p></p>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_services\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_services\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Deskripsi</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_services\" oninvalid=\"alert('Detail deskripsi harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_services/aksi.php?pelayanandanproduk=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_services/services.php?tbl=pelayanandanproduk\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                if ($lang_services=="in"){
                       $lang_services = "in";
                   }elseif ($lang_services=="en"){
                       $lang_services ="en";
                   }else{
                       $lang_services ="in";                      
                   }
                move_uploaded_file($location, '../../../img/'. $pict_services);
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"services.php?tbl=pelayanandanproduk\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?pelayanandanproduk=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_services          = @$_GET['id_services'];

    $edit         = mysqli_query($link, "SELECT * FROM tbl_services WHERE id_services='$id_services'");
    $showservices = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Pelayanan dan Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_services/aksi.php?pelayanandanproduk=update&id_services=$showservices[id_services]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_services\" value=\"$showservices[id_services]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\">
                          <div class=\"project\">
                          <div class=\"photo-wrapper\">
                              <div class=\"photo\"> 
                                <a class=\"fancybox\" href=\"../../../img/$showservices[pict_services]\">
                                <img id=\"output_image\" class=\"img-responsive\" src=\"../../../img/$showservices[pict_services]\" alt=\"../../../img/$showservices[pict_services]\"></a>
                              </div>
                            </div>
                          </div>

                          <input type=\"file\" accept=\"image/*\" onchange=\"preview_image(this,'preview')\" class=\"\" name=\"pict_services\" value=\"$showservices[pict_services]\" oninvalid=\"alert('Gambar belum di upload !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_services\" value=\"$showservices[title_services]\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_services\" value=\"$showservices[description_services]\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Deskripsi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_services\" oninvalid=\"alert('Detail deskripsi harus di isi !');\"required>$showservices[detail_services]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>";
                              ?>
                              <?php
                              $language_services = @$showservices[lang_services];
                              if ($language_services == "en"){
                                echo"
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios1\" value=\"in\">
                                Indonesia
                              </label>";
                              }else{
                                echo"
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios2\" value=\"en\">
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_services\" id=\"optionsRadios1\" value=\"in\" checked>
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
                          <a href=\"../../module/mod_services/aksi.php?pelayanandanproduk=edit&id_services=$showservices[id_services]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_services          = @$_GET['id_services'];
    $pict_services        = @$_FILES['pict_services']['name'];
    $location             = @$_FILES['pict_services']['tmp_name'];
    $title_services       = @$_POST['title_services'];
    $description_services = @$_POST['description_services'];
    $detail_services      = @$_POST['detail_services'];
    $lang_services        = @$_POST['lang_services'];

    $update       = "UPDATE tbl_services SET pict_services='$pict_services', title_services='$title_services', description_services='$description_services', detail_services='$detail_services', lang_services='$lang_services' where id_services='$id_services'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                if ($lang_services=="in"){
                       $lang_services = "in";
                   }elseif ($lang_services=="en"){
                       $lang_services ="en";
                   }else{
                       $lang_services ="in";                      
                   }
                  move_uploaded_file($location, '../../../img/'. $pict_services);
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"services.php?tbl=pelayanandanproduk\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_services/aksi.php?pelayanandanproduk=edit&id_services=$showservices[id_services]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_services   = @$_GET['id_services'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_services WHERE id_services='$id_services'");
    $showservices  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_services WHERE id_services='$id_services'";
    if (mysqli_query ($link, $hapus)) {
        unlink("../../../img/$showservices[pict_services]"); 
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"services.php?tbl=pelayanandanproduk\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_services/aksi.php?pelayanandanproduk=edit&id_services=$data_services[id_services]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


