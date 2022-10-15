<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
	$link     = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');
    $tampilprofiladmin = mysqli_query ($link, "SELECT * FROM tbl_profile ORDER BY id_profile ASC LIMIT 1");
    while ($showprofiladmin = mysqli_fetch_assoc($tampilprofiladmin)) { 
    echo "
        <title>$showprofiladmin[copyright] - Admin Panel</title>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"description\" content=\"$showprofiladmin[description]\">
        <meta name=\"keywords\" content=\"$showprofiladmin[keywords]\">
        <meta http-equiv=\"copyright\" content=\"$showprofiladmin[copyright]\">
        <meta name=\"author\" content=\"$showprofiladmin[author]\">
        <link rel=\"shortcut icon\" href=\"../../rsl/img/$showprofiladmin[icon]\" />";
    }
    ?>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background: #0f1422;">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container" >
	  	
		      <form class="form-login" action="" method="POST">
		        <h2 class="form-login-heading">ADMINISTRATOR</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
		            <label class="checkbox">
		                <!-- <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span> -->
		            </label>
		            <a data-toggle="modal" href="#myModal"><button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN IN</button></a>
		            <?php include 'execute_login.php'; ?>
		            <hr>
		            
		            <!-- <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div> -->
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">INFORMASI</h4>
		                      </div>
		                      <div class="modal-body">
		 					  <?php include 'execute_login.php'; ?>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">OK</button>
		                          <!-- <button class="btn btn-theme" type="button">Submit</button> -->
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
