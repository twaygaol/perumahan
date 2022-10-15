<?php
include 'control.php';
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                  <span class="li_mail"></span>
                  <h3>+<?php echo"$total_inbox"; ?></h3>
                        </div>
                  <p><?php echo "$total_inbox Pesan terkirim ke inbox anda !"; ?></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_camera"></span>
                  <h3>+<?php echo"$total_gallery"; ?></h3>
                        </div>
                  <p><?php echo"$total_gallery Gambar tersimpan dalam galeri album anda !"; ?></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_star"></span>
                  <h3>+<?php echo"$total_services"; ?></h3>
                        </div>
                  <p><?php echo"$total_services Jenis pelayanan dan produk sudah terekam di database !"; ?></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                  <h3>+<?php echo"$total_aboutus"; ?></h3>
                        </div>
                  <p><?php echo"Ada $total_aboutus artikel terkait profil perusahaan anda sudah terekam di database !"; ?></p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3>
                    <?php
                    // Menampilkan Jumlah Tabel Pada Database
                    $servername = "sql208.epizy.com";
                    $username = "epiz_32794488";
                    $password = "5SQu2CZ204D";
                    $dbname = "epiz_32794488_db_companyprofile";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "SELECT table_schema \"db_companyprofile\",
                            ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) \"DB Size in MB\" 
                            FROM information_schema.tables WHERE table_schema = 'db_companyprofile' GROUP BY table_schema";
                    $result = $conn->query($sql);

                    if ($result=mysqli_query($conn,$sql)){
  
                      //fetch one and one row
                      while($row=mysqli_fetch_row($result)){
                        printf("%s MB <br />\n",$row[1]);

                      }
                        //free result set
                        mysqli_free_result($result);
                    }

                    $conn->close();

                    ?>
                  </h3>
                        </div><p>Kapasitas storage database saat ini !</p>                     
                      </div>
                    
                    </div><!-- /row mt -->  
                  
          <div class="row mt">
            <!--CUSTOM CHART START -->
            <div class="custom-bar-chart">
              <?php 
              include 'chart\statistikbar.php';

              $konek = mysqli_connect("localhost","root","","db_companyprofile");

              //$tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
              $tgl_skrg = date("20130918"); // untuk simulasi saja sesuai dengan di database

              // dapatkan 6 hari sblm tgl sekarang 
              $seminggu = strtotime("-1 week +1 day",strtotime($tgl_skrg));
              $hasilnya = date("Y-m-d", $seminggu);

              //lakukan looping sebanyak 6 kali   
              for ($i=0; $i<=6; $i++){
                $urutan_tgl   = strtotime("+$i day",strtotime($hasilnya));
                $hasil_urutan = date("d-M-Y", $urutan_tgl);
                  
                $tgl_pengujung   = strtotime("+$i day",strtotime($hasilnya));
                $hasil_pengujung = date("Y-m-d", $tgl_pengujung);
                $query_pengujung = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$hasil_pengujung' GROUP BY ip"));
                 
                $tgl_hits   = strtotime("+$i day",strtotime($hasilnya));
                $hasil_hits = date("Y-m-d", $tgl_hits);
                $query_hits = mysqli_fetch_array(mysqli_query($konek, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$hasil_hits' GROUP BY tanggal"));
                  
                $hits_today = $query_hits['hitstoday'];
                  
                if ($hits_today==""){ $hits_today="0"; }
                    
                //echo "<tr><td>$hasil_urutan</td><td>$query_pengujung</td><td>$hits_today</td></tr>";    
                echo "
                <ul class=\"y-axis\">
                    <li><span></span></li>
                </ul>
                <div class=\"bar\">
                    <div class=\"title\">$hasil_urutan</div>
                    <div class=\"value tooltips\" data-original-title=\"$query_pengujung Pengunjung\" data-toggle=\"tooltip\" data-placement=\"top\">$query_pengujung</div>
                </div>";
              }
              ?> 
            </div>
            <!--custom chart end-->
          </div><!-- /row --> 
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                  <h3>Pesan Terbaru</h3>
                                        
                  <!-- First Action -->
                      <?php
                      $show_pesanterbaru = mysqli_query ($link, "SELECT * FROM tbl_inbox ORDER BY date_receive_inbox DESC ");
                      while ($data_pesanterbaru = mysqli_fetch_assoc($tampil_pesanterbaru)) {
                      $kalimat_pesanterbaru  = $data_pesanterbaru['message_inbox'];  
                      $cetak_pesanterbaru    = substr($kalimat_pesanterbaru, 0, 30) . "...";
                      echo "
                      <div class=\"desc\">
                      <div class=\"thumb\">
                      <span class=\"badge bg-theme\"><i class=\"fa fa-clock-o\"></i></span>
                      </div>
                      <div class=\"details\">
                        <p><muted>$data_pesanterbaru[date_receive_inbox]</muted><br/>
                           <a href=\"module/mod_inbox/aksi.php?inbox=edit&id_inbox=$data_pesanterbaru[id_inbox]\">$data_pesanterbaru[name_inbox]</a> - $data_pesanterbaru[subject_inbox]<br/>
                           $cetak_pesanterbaru
                        </p>
                      </div>
                      </div>";
                      }
                      ?>
                        
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar-->
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo date ("Y"); ?>  - Theme by Alvarez.is
              <a href="template.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
