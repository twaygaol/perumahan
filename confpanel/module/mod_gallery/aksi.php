<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE GALERI \\
$module   = @$_GET['galeri'];

if ($module == "add"){
    $pict_gallery        = @$_FILES['pict_gallery']['name'];
    $location            = @$_FILES['pict_gallery']['tmp_name'];
    $category_gallery    = @$_POST['category_gallery'];
   

    $tambah     = "INSERT INTO tbl_gallery (pict_gallery, category_gallery)
                  VALUES ('$pict_gallery', '$category_gallery')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Galeri</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_gallery/aksi.php?galeri=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\"> 
                          <input type=\"file\" class=\"\" name=\"pict_gallery\" oninvalid=\"alert('Gambar belum di Upload !');\"required><p></p>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Kategori Gambar</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"category_gallery\" oninvalid=\"alert('Kategori gambar harus di isi !');\"required>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_gallery/aksi.php?galeri=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_gallery/gallery.php?tbl=galeri\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                move_uploaded_file($location, '../../../img/'. $pict_gallery);
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"gallery.php?tbl=galeri\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?galeri=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_gallery          = @$_GET['id_gallery'];

    $edit         = mysqli_query($link, "SELECT * FROM tbl_gallery WHERE id_gallery='$id_gallery'");
    $showgallery = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Galeri</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_gallery/aksi.php?galeri=update&id_gallery=$showgallery[id_gallery]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_gallery\" value=\"$showgallery[id_gallery]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\">
                          <div class=\"project\">
                          <div class=\"photo-wrapper\">
                              <div class=\"photo\"> 
                                <a class=\"fancybox\" href=\"../../../img/$showgallery[pict_gallery]\">
                                <img id=\"output_image\" class=\"img-responsive\" src=\"../../../img/$showgallery[pict_gallery]\" alt=\"../../../img/$showgallery[pict_gallery]\"></a>
                              </div>
                            </div>
                          </div>

                          <input type=\"file\" accept=\"image/*\" onchange=\"preview_image(this,'preview')\" class=\"\" name=\"pict_gallery\" value=\"$showgallery[pict_gallery]\" oninvalid=\"alert('Gambar belum di upload !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"category_gallery\" value=\"$showgallery[category_gallery]\" oninvalid=\"alert('Kategori harus di isi !');\"required>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_gallery/aksi.php?galeri=edit&id_gallery=$showgallery[id_gallery]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_gallery          = @$_GET['id_gallery'];
    $pict_gallery        = @$_FILES['pict_gallery']['name'];
    $location             = @$_FILES['pict_gallery']['tmp_name'];
    $category_gallery       = @$_POST['category_gallery'];

    $update       = "UPDATE tbl_gallery SET pict_gallery='$pict_gallery', category_gallery='$category_gallery' where id_gallery='$id_gallery'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                  move_uploaded_file($location, '../../../img/'. $pict_gallery);
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"gallery.php?tbl=galeri\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_gallery/aksi.php?galeri=edit&id_gallery=$showgallery[id_gallery]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_gallery   = @$_GET['id_gallery'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_gallery WHERE id_gallery='$id_gallery'");
    $showgallery  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_gallery WHERE id_gallery='$id_gallery'";
    if (mysqli_query ($link, $hapus)) {
        unlink("../../../img/$showgallery[pict_gallery]"); 
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"gallery.php?tbl=galeri\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_gallery/aksi.php?galeri=edit&id_gallery=$data_gallery[id_gallery]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


