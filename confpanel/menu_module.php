
 <section id="container" >
      <!-- TOP BAR CONTENT & NOTIFICATIONS -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="../../template.php" class="logo"><b>Indahnya Berbagi | Admin Panel</b></a>
            <!--logo end-->
            
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" target="_blank" href="../../../index.php">Lihat Website</a></li>
                    <li><a name="logoutbutton" class="logout" href="../../execute_login.php?logout=y">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->

      <!-- MAIN SIDEBAR MENU -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="../../profile.html"><img src="../../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php  echo ucwords(@$_SESSION['fullname']);?></h5>
                  <div class="centered" id="jam" style="color:white;">
                        Session Timeout : <?php include 'jam.php'; ?>
                  </div>  
                  <li class="mt">
                      <a class="" href="../../template.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                    <?php 
                    if (@$_GET['tbl']){
                        echo "<a class=\"active\" href=\"javascript:;\">";
                    }elseif (@$_GET['page'] OR @$_GET['pelayanandanproduk'] OR @$_GET['galeri'] OR @$_GET['tentangkami'] OR @$_GET['testimoni'] OR @$_GET['inbox']){
                        echo "<a class=\"active\" href=\"javascript:;\">";
                    }else{
                        echo "<a href=\"javascript:;\">";
                    }
                    
                    ?>
                          <i class="fa fa-desktop"></i>
                          <span>Input Data</span>
                      </a>
                      <ul class="sub">
                      <?php
                      $module = @$_GET['tbl'];

                      if ($module=="pelayanandanproduk"){
                           echo "<li class=\"active\"><a  href=\"../../module/mod_services/services.php?tbl=pelayanandanproduk\">Tabel Pelayanan & Produk</a></li>";
                      }else{
                           echo"<li  class=\"\"><a href=\"../../module/mod_services/services.php?tbl=pelayanandanproduk\">Tabel Pelayanan & Produk</a></li>";
                      }

                      if ($module=="galeri"){
                           echo "<li class=\"active\"><a  href=\"../../module/mod_gallery/gallery.php?tbl=galeri\">Tabel Galeri</a></li>";
                      }else{
                           echo"<li><a href=\"../../module/mod_gallery/gallery.php?tbl=galeri\">Tabel Galeri</a></li>";
                      }

                      if ($module=="tentangkami"){
                          echo " <li class=\"active\"><a  href=\"../../module/mod_aboutus/aboutus.php?tbl=tentangkami\">Tabel Tentang Kami</a></li>";
                         }else{
                          echo" <li><a  href=\"../../module/mod_aboutus/aboutus.php?tbl=tentangkami\">Tabel Tentang Kami</a></li>";
                      }

                      if ($module=="testimoni"){
                          echo " <li class=\"active\"><a  href=\"../../module/mod_testimoni/testimoni.php?tbl=testimoni\">Tabel Testimoni</a></li>";
                         }else{
                          echo" <li><a  href=\"../../module/mod_testimoni/testimoni.php?tbl=testimoni\">Tabel Testimoni</a></li>";
                      }

                      if ($module=="inbox"){
                          echo "<li class=\"active\"><a  href=\"../../module/mod_inbox/inbox.php?tbl=inbox\">Tabel Inbox</a></li>";
                         }else{
                          echo"<li><a  href=\"../../module/mod_inbox/inbox.php?tbl=inbox\">Tabel Inbox</a></li>";
                      }

                      ?>
                      </ul>
                  </li>

                  <li class="sub-menu">
                    <?php
                    if (@$_GET['tblconf']){
                        echo "
                        <a class=\"active\" href=\"javascript:;\">";
                    }elseif (@$_GET['pageconf'] OR @$_GET['profilweb'] OR @$_GET['kontak'] OR @$_GET['user']){
                        echo "<a class=\"active\" href=\"javascript:;\">";
                      
                    }else{
                        echo "<a href=\"javascript:;\">";
                    }
                    ?>
                          <i class="fa fa-cogs"></i>
                          <span>Konfigurasi</span>
                      </a>
                      <ul class="sub">
                        <?php
                        $moduleconf = @$_GET['tblconf'];
                        
                        if ($moduleconf=="profilweb"){
                          echo "<li class=\"active\"><a  href=\"../../module/mod_profile/profile.php?tblconf=profilweb\">Tabel Profil Halaman Web</a></li>";
                         }else{
                          echo" <li><a  href=\"../../module/mod_profile/profile.php?tblconf=profilweb\">Tabel Profil Halaman Web</a></li>";
                        }

                        if ($moduleconf=="kontak"){
                            echo "<li class=\"active\"><a  href=\"../../module/mod_contactus/contactus.php?tblconf=kontak\">Tabel Kontak Kami</a></li>";
                           }else{
                            echo"<li><a  href=\"../../module/mod_contactus/contactus.php?tblconf=kontak\">Tabel Kontak Kami</a></li>";
                        }
                        
                        if ($moduleconf=="user"){
                            echo "<li class=\"active\"><a  href=\"../../module/mod_user/user.php?tblconf=user\">Tabel User</a></li>";
                           }else{
                            echo"<li><a  href=\"../../module/mod_user/user.php?tblconf=user\">Tabel User</a></li>";
                        }
                        
                        ?>
                      </ul>
                  </li>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->



      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="gallery.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

 </section>

  

  