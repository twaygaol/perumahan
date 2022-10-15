<?php
    $link = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');
    include "control.php"; 
    
    $mysqli = new databases();  
    if (@$_GET['lang']!=''){
        language($_GET['lang']);
    }else {
        language("in");
    }

//fungsi fitur kirim email
        if (isset($_POST['submitemail'])){
        $date_receive_inbox    = $_POST['date_receive_inbox'];
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $to      = $email;
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

        // More headers
        $headers .= 'From: <info@indahnyaberbagionline.com>' . "\r\n";
        $headers .= 'Cc: admin@indahnyaberbagionline.com' . "\r\n";
        @mail($to,$subject,$message,$headers);

        // Input data ke tbl_inbox                     
        $tambah = "INSERT INTO tbl_inbox (date_receive_inbox, name_inbox, email_inbox, subject_inbox,)
                  VALUES ('$date_receive_inbox', '$name', '$email', '$subject')";        
        if (mysqli_query($link,$tambah)) {
            echo "<script language=\"javascript\">
                  alert (\"Sent Email Success !!\")
                  document.location=\"index.php\";
                  </script>";                          
        }else{
            echo "<script language=\"javascript\">
                  alert (\"Send Email Failed !!\")
                  document.location=\"index.php\";
                  </script>";
                         }
     mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html>
    <head>

<!-- // PROFILE \\ -->
        <?php
          foreach ($mysqli->get_show_profile() as $showprofile) {
              
        echo " 
            <title>$showprofile[copyright]</title>
            <meta charset=\"utf-8\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
            <meta name=\"robots\" content=\"index, follow\">
            <meta name=\"description\" content=\"$showprofile[description]\">
            <meta name=\"keywords\" content=\"$showprofile[keywords]\">
            <meta http-equiv=\"copyright\" content=\"$showprofile[copyright]\">
            <meta name=\"author\" content=\"$showprofile[author]\">
            <link rel=\"shortcut icon\" href=\"img/$showprofile[icon]\" />";
        
    }
    
        ?>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>

<!-- // HEADER \\ -->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <p class="language"><?=language?> : <a href="index.php?lang=in"> Indonesia</a> | <a href="index.php?lang=en"> English</a></p>
                    <a href="#" class="navbar-brand scroll-top"><?php echo "$showprofile[titlewebsite]"; ?></a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="scroll-top"><?=home?></a></li>
                        <li><a href="#" class="scroll-link" data-id="about"><?=services?></a></li>
                        <li><a href="#" class="scroll-link" data-id="portfolio"><?=gallery?></a></li>
                        <li><a href="#" class="scroll-link" data-id="blog"><?=aboutus?></a></li>
                        <li><a href="https://drive.google.com/file/d/1Ga7mkj2XH7QPnLvfcwbTVL8N3gWK8VIj/view?usp=sharing"  style=";"><em style="background-color:orange; border-radius:2px; padding:10px;"><?=contactus?></em></a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


<!-- // WELCOME SCREEN \\ -->

    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="text-content">
                <div style="background-color:blueviolet;opacity:0.8;">
                    <h1 style="background-color:rgba(0,0,0, 0.0); padding:15px;">PERUMAHAN PT.GRAHA SEKIP MENCIRIM</h1>
                </div>
                <!-- <div class="primary-white-button">
                    <a href="#" class="scroll-link" data-id="about"><?=moredetail?></a>
                </div> -->

                <!-- // DATA  \\ -->
    <div id="contact-us" style="margin-top:-90px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="pop-button">
                            <h4 style="color: black;"><?=buttonsendemail?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <div class="pop">
                        <span>✖</span>
                        <form id="contact" action="index.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="date_receive_inbox" id="date" value="<?php echo date('Y-m-d h:i:sa' ); ?>">  
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="<?=placename?>" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="<?=placeemail?>" required="">
                                  </fieldset>
                                </div>                                
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="<?=placesubject?>" required="">
                                  </fieldset>
                                </div>
                                
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit"  name="submitemail"  id="form-submit" class="btn"><?=buttonsendmail?></button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div>
    </div>

<!-- // SERVICES \\ -->
    <section id="about" class="page-section">
        <div class="container">
            <div class="row">
                <?php 
                    foreach ($mysqli->get_show_services() as $showservices) {
                    echo "
                    <div class=\"col-md-3 col-sm-6 col-xs-12\">
                        <div class=\"service-item\">
                            <div class=\"icon\">
                                <img src=\"img/$showservices[pict_services]\" alt=\"\">
                            </div>                         
                            <h4>$showservices[title_services]</h4>
                            <div class=\"line-dec\"></div>
                            <p>$showservices[description_services]</p>
                            <p>$showservices[detail_services].</p>";
             
                ?>
                    </div>
                </div>
                <?php                 
                    }
                ?>
            </div>
        </div>
        <div class="primary-white-button" align="center">
            <br><a href="#" class="scroll-link" data-id="portfolio"><?=buttoncontinue?></a>
        </div>
    </section>



<!-- // GALLERY \\ -->
    <section id="portfolio">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="section-heading">
                            <h4><?=labelgallery?></h4>
                            <div class="line-dec"></div>
                            <p><?=labelgallerydescription?></p>
                            <div class="filter-categories">
                                <ul class="project-filter">
                                    <?php 
                                    foreach ($mysqli->get_show_gallery() as $showgallery) {
                                    echo "
                                    <li class=\"filter\" data-filter=\"$showgallery[category_gallery]\"><span>$showgallery[category_gallery]</span></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="projects-holder-3">
                            <div class="projects-holder">
                                <div class="row">
                                    <?php 
                                    foreach ($mysqli->get_show_gallery_detail() as $showgallerydetail) {
                                    echo "
                                    <div class=\"col-sm-3 col-sm-12 project-item mix $showgallerydetail[category_gallery]\">
                                      <div class=\"thumb\">
                                            <div class=\"image\">
                                                <a href=\"img/$showgallerydetail[pict_gallery]\" data-lightbox=\"image-1\"><img src=\"img/$showgallerydetail[pict_gallery]\"></a>
                                            </div>
                                      </div>
                                    </div>";
                                    }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>


<!-- // TESTIMONIALS \\ -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="owl-testimonials" class="owl-carousel owl-theme">
                        <?php 
                        foreach ($mysqli->get_show_testimonial() as $showtestimonial) {
                        echo "
                        <div class=\"item\">                            
                            <div class=\"testimonials-item\">                                
                                <p>$showtestimonial[detail_testimonial]</p>
                                <h4>$showtestimonial[fullname_testimonial]</h4>
                                <span>$showtestimonial[description_testimonial]</span>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- // ABOUT US \\ -->
    <div class="tabs-content" id="blog">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-4">
                        <div class="section-heading">
                            <h4><?=labelaboutus?></h4>
                            <div class="line-dec"></div>
                            <?php
                                foreach ($mysqli->get_show_aboutus_description() as $showaboutusdesc) {
                                echo "<p>$showaboutusdesc[description_aboutus]</p>";
                                }
                            ?>
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                <?php
                                 foreach ($mysqli->get_show_aboutus() as $showaboutus) {
                                    echo "                        
                                    <li><a href=\"#tab$showaboutus[id_aboutus]\" class=\"active\">$showaboutus[title_aboutus]</a></li>";
                                 }
                                ?>
                             </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
          
                    <section id="first-tab-group" class="tabgroup">
                        <?php
                        foreach ($mysqli->get_show_aboutus_detail() as $showaboutusdetail) {
                        echo "  
                            <div id=\"tab$showaboutusdetail[id_aboutus]\">
                                <img src=\"img/$showaboutusdetail[pict_aboutus]\" alt=\"\">
                                <div class=\"text-content\">
                                    <h4>$showaboutusdetail[title_aboutus]</h4>
                                    <hr>
                                    <p>$showaboutusdetail[detail_aboutus]</p>
                                </div>
                            </div>";
                        }
                        ?>                        
                    </section>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>




<!-- // MAPPING \\ -->
    <div id="map">
    	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->
         <?php
            foreach ($mysqli->get_show_contactus() as $showcontactus) {
            echo "         
                <iframe src=\"$showcontactus[mappingpoint]\" width=\"100%\" height=\"500\" frameborder=\"0\" 
                style=\"border:0\" allowfullscreen></iframe>";
            }
        ?>
    </div>


<!-- // FOOTER \\ -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="logo">
                        <a href="#" class="scroll-top"><?php echo"$showprofile[titlewebsite]"; ?></a>
                       
                        <p>Copyright &copy; <?php echo date("Y"); ?> 
                      | Theme by : <span>PT.graha sekip mencirim</span></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="location">
                        <h4><?=labellocation?></h4>
                        <ul>
                            <li><?=labelheadoffice?> : 
                                 <?php 
                                    foreach ($mysqli->get_show_contactus() as $showcontactus) {
                                    echo "<br>$showcontactus[address]</li>                                
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-12\">
                    <div class=\"contact-info\">";
                }
                ?>
                        <h4><?=labelinfo?></h4>
                        <ul>
                            <li><em><?=labelphone?></em> : <?php echo" $showcontactus[phone]";?></li>
                            <li><em><?=labelemail?></em> : <?php echo" $showcontactus[email]";?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="connect-us">
                        <h4><?=labelsosmed?></h4>
                        <?php 
                        foreach ($mysqli->get_show_contactus() as $showcontactus) {
                        echo "
                        <ul>                            
                            <li><a href=\"../www.facebook.com/$showcontactus[id_facebook]\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a></li>
                            <li><a href=\"../www.twitter.com/$showcontactus[id_twitter]\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a></li>
                            <li><a href=\"../www.instagram.com/$showcontactus[id_instagram]\" target=\"_blank\"><i class=\"fa fa-instagram\"></i></a></li>
                            <li><a href=\"../www.youtube.com/$showcontactus[id_youtube]\" target=\"_blank\"><i class=\"fa fa-youtube\"></i></a></li>
                        </ul>";
                            }
                        ?>
                        <?php 
                          include 'statistik.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }



function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}


    </script>
</body>
</html>