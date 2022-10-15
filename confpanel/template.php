<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 

    require ('timer.php');
    require ('timer_module.php');
    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = 'index.php'</script>";
    }else{
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
        <link rel=\"shortcut icon\" href=\"../img/$showprofiladmin[icon]\" />
    
    <!-- Bootstrap core CSS -->
    <link href=\"assets/css/bootstrap.css\" rel=\"stylesheet\">
    <!--external css-->
    <link href=\"assets/font-awesome/css/font-awesome.css\" rel=\"stylesheet\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/zabuto_calendar.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/js/gritter/css/jquery.gritter.css\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/lineicons/style.css\">    
    <link href=\"assets/js/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" />
    <link href=\"chart/css/basic.css\" rel=\"stylesheet\" />
    <link href=\"chart/css/visualize.css\" rel=\"stylesheet\" />

    <!-- Custom styles for this template -->
    <link href=\"assets/css/style.css\" rel=\"stylesheet\">
    <link href=\"assets/css/style-responsive.css\" rel=\"stylesheet\">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
  <body onload=\"setInterval(jam,1000)\">";
    }
}

include 'menu.php';
include 'main.php';

echo "
 <!-- js placed at the end of the document so the pages load faster -->
    <script src=\"assets/js/jquery.js\"></script>
    <script src=\"assets/js/chart-master/Chart.js\"></script>
    <script src=\"assets/js/jquery-1.8.3.min.js\"></script>
    <script src=\"assets/js/bootstrap.min.js\"></script>
    <script class=\"include\" type=\"text/javascript\" src=\"assets/js/jquery.dcjqaccordion.2.7.js\"></script>
    <script src=\"assets/js/jquery.scrollTo.min.js\"></script>
    <script src=\"assets/js/jquery.nicescroll.js\" type=\"text/javascript\"></script>
    <script src=\"assets/js/jquery.sparkline.js\"></script>

    <!--common script for all pages-->
    <script src=\"assets/js/common-scripts.js\"></script>
    
    <script type=\"text/javascript\" src=\"assets/js/gritter/js/jquery.gritter.js\"></script>
    <script type=\"text/javascript\" src=\"assets/js/gritter-conf.js\"></script>

    <!--script for this page-->
    <script src=\"assets/js/sparkline-chart.js\"></script>    
	<script src=\"assets/js/zabuto_calendar.js\"></script>

	<script type=\"application/javascript\">
        $(document).ready(function () {
            $(\"#date-popover\").popover({html: true, trigger: \"manual\"});
            $(\"#date-popover\").hide();
            $(\"#date-popover\").click(function (e) {
                $(this).hide();
            });
        
            $(\"#my-calendar\").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: \"show_data.php?action=1\",
                    modal: true
                },
                legend: [
                    {type: \"text\", label: \"Special event\", badge: \"00\"},
                    {type: \"block\", label: \"Regular event\", }
                ]
            });
        });
        
        function myNavFunction(id) {
            $(\"#date-popover\").hide();
            var nav = $(\"#\" + id).data(\"navigation\");
            var to = $(\"#\" + id).data(\"to\");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>";

?>  

  </body>
</html>