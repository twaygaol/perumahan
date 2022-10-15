<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    include 'timer_module.php';

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
        <link rel=\"shortcut icon\" href=\"../../../img/$showprofiladmin[icon]\" />";
    }
    ?>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lineicons/style.css">    
    <link href="../../assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/chart-master/Chart.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    