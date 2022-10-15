<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE TESTIMONI \\
$module   = @$_GET['testimoni'];

if ($module == "add"){
    $fullname_testimonial    = @$_POST['fullname_testimonial'];
    $description_testimonial = @$_POST['description_testimonial'];
    $detail_testimonial      = @$_POST['detail_testimonial'];

    $tambah     = "INSERT INTO tbl_testimonial (fullname_testimonial, description_testimonial, detail_testimonial)
                  VALUES ('$fullname_testimonial', '$description_testimonial', '$detail_testimonial')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Testimoni</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_testimoni/aksi.php?testimoni=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Lengkap</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"fullname_testimonial\" oninvalid=\"alert('Nama Lengkap harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_testimonial\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Testimoni</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_testimonial\" oninvalid=\"alert('Detail Testimoni harus di isi !');\"required></textarea>
                          </div>

                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_testimoni/aksi.php?testimoni=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_testimoni/testimoni.php?tbl=testimoni\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
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
                         document.location=\"testimoni.php?tbl=testimoni\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?testimoni=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_testimonial = @$_GET['id_testimonial'];
    $edit           = mysqli_query($link, "SELECT * FROM tbl_testimonial WHERE id_testimonial='$id_testimonial'");
    $showtestimoni  = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Testimoni</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_testimoni/aksi.php?testimoni=update&id_testimonial=$showtestimoni[id_testimonial]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_testimonial\" value=\"$showtestimoni[id_testimonial]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Lengkap</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"fullname_testimonial\" value=\"$showtestimoni[fullname_testimonial]\" oninvalid=\"alert('Nama Lengkap harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_testimonial\" value=\"$showtestimoni[description_testimonial]\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Detail Testimoni</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"detail_testimonial\" oninvalid=\"alert('Detail Testimoni harus di isi !');\"required>$showtestimoni[detail_testimonial]</textarea>
                          </div>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_testimoni/aksi.php?testimoni=edit&id_testimonial=$showtestimoni[id_testimonial]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
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
    $id_testimonial          = @$_GET['id_testimonial'];
    $fullname_testimonial    = @$_POST['fullname_testimonial'];
    $description_testimonial = @$_POST['description_testimonial'];
    $detail_testimonial      = @$_POST['detail_testimonial'];

    $update       = "UPDATE tbl_testimonial SET fullname_testimonial='$fullname_testimonial', description_testimonial='$description_testimonial', detail_testimonial='$detail_testimonial' where id_testimonial='$id_testimonial'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"testimoni.php?tbl=testimoni\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_testimoni/aksi.php?testimoni=edit&id_testimonial=$showtestimoni[id_testimonial]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_testimonial   = @$_GET['id_testimonial'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_testimonial WHERE id_testimonial='$id_testimonial'");
    $showtestimoni  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_testimonial WHERE id_testimonial='$id_testimonial'";
    if (mysqli_query ($link, $hapus)) {
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"testimoni.php?tbl=testimoni\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_testimoni/aksi.php?testimoni=edit&id_testimonial=$data_testimoni[id_testimonial]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


