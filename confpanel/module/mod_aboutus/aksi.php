<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE TENTANG KAMI\\
$module   = @$_GET['tentangkami'];

if ($module == "add"){
    $description_aboutus = @$_POST['description_aboutus'];
    $title_aboutus       = @$_POST['title_aboutus'];
    $detail_aboutus      = @$_POST['detail_aboutus'];
    $pict_aboutus        = @$_FILES['pict_aboutus']['name'];
    $location            = @$_FILES['pict_aboutus']['tmp_name'];
    $lang_aboutus        = @$_POST['lang_aboutus'];      

    $tambah     = "INSERT INTO tbl_aboutus (description_aboutus, title_aboutus, detail_aboutus, pict_aboutus, lang_aboutus)
                  VALUES ('$description_aboutus', '$title_aboutus', '$detail_aboutus', '$pict_aboutus', '$lang_aboutus')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Tentang Kami</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_aboutus/aksi.php?tentangkami=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_aboutus\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_aboutus\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Deskripsi</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_aboutus\" oninvalid=\"alert('Detail deskripsi harus di isi !');\"required></textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\"> 
                          <input type=\"file\" class=\"\" name=\"pict_aboutus\" oninvalid=\"alert('Gambar belum di upload !');\"required><p></p>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_aboutus/aksi.php?tentangkami=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_aboutus/aboutus.php?tbl=tentangkami\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                if ($lang_aboutus=="in"){
                       $lang_aboutus = "in";
                   }elseif ($lang_aboutus=="en"){
                       $lang_aboutus ="en";
                   }else{
                       $lang_aboutus ="in";                      
                   }
                move_uploaded_file($location, '../../../img/'. $pict_aboutus);
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"aboutus.php?tbl=tentangkami\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?tentangkami=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_aboutus          = @$_GET['id_aboutus'];

    $edit         = mysqli_query($link, "SELECT * FROM tbl_aboutus WHERE id_aboutus='$id_aboutus'");
    $showaboutus = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Tentang Kami</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_aboutus/aksi.php?tentangkami=update&id_aboutus=$showaboutus[id_aboutus]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_aboutus\" value=\"$showaboutus[id_aboutus]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_aboutus\" value=\"$showaboutus[description_aboutus]\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_aboutus\" value=\"$showaboutus[title_aboutus]\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Deskripsi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_aboutus\" oninvalid=\"alert('Detail deskripsi harus di isi !');\"required>$showaboutus[detail_aboutus]</textarea>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\">
                          <div class=\"project\">
                          <div class=\"photo-wrapper\">
                              <div class=\"photo\"> 
                                <a class=\"fancybox\" href=\"../../../img/$showaboutus[pict_aboutus]\">
                                <img id=\"output_image\" class=\"img-responsive\" src=\"../../../img/$showaboutus[pict_aboutus]\" alt=\"../../../img/$showaboutus[pict_aboutus]\"></a>
                              </div>
                            </div>
                          </div>

                          <input type=\"file\" accept=\"image/*\" onchange=\"preview_image(this,'preview')\" class=\"\" name=\"pict_aboutus\" value=\"$showaboutus[pict_aboutus]\" oninvalid=\"alert('Gambar belum di upload !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>";
                              ?>
                              <?php
                              $language_aboutus = @$showaboutus[lang_aboutus];
                              if ($language_aboutus == "en"){
                                echo"
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios1\" value=\"in\">
                                Indonesia
                              </label>";
                              }else{
                                echo"
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios2\" value=\"en\">
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_aboutus\" id=\"optionsRadios1\" value=\"in\" checked>
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
                          <a href=\"../../module/mod_aboutus/aksi.php?tentangkami=edit&id_aboutus=$showaboutus[id_aboutus]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_aboutus          = @$_GET['id_aboutus'];
    $description_aboutus = @$_POST['description_aboutus'];
    $title_aboutus       = @$_POST['title_aboutus'];
    $detail_aboutus      = @$_POST['detail_aboutus'];
    $pict_aboutus        = @$_FILES['pict_aboutus']['name'];
    $location            = @$_FILES['pict_aboutus']['tmp_name'];
    $lang_aboutus        = @$_POST['lang_aboutus'];      

    $update       = "UPDATE tbl_aboutus SET description_aboutus='$description_aboutus', title_aboutus='$title_aboutus',  detail_aboutus='$detail_aboutus', pict_aboutus='$pict_aboutus', lang_aboutus='$lang_aboutus' where id_aboutus='$id_aboutus'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                if ($lang_aboutus=="in"){
                       $lang_aboutus = "in";
                   }elseif ($lang_aboutus=="en"){
                       $lang_aboutus ="en";
                   }else{
                       $lang_aboutus ="in";                      
                   }
                  move_uploaded_file($location, '../../../img/'. $pict_aboutus);
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"aboutus.php?tbl=tentangkami\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_aboutus/aksi.php?tentangkami=edit&id_aboutus=$showaboutus[id_aboutus]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_aboutus   = @$_GET['id_aboutus'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_aboutus WHERE id_aboutus='$id_aboutus'");
    $showaboutus  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_aboutus WHERE id_aboutus='$id_aboutus'";
    if (mysqli_query ($link, $hapus)) {
        unlink("../../../img/$showaboutus[pict_aboutus]"); 
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"aboutus.php?tbl=tentangkami\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_aboutus/aksi.php?tentangkami=edit&id_aboutus=$data_aboutus[id_aboutus]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';

?>


