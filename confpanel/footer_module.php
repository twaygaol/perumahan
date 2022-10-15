<!-- js placed at the end of the document so the pages load faster -->
  <script src="../../assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>

    <!--script for this page-->
  
  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  <script type='text/javascript'>
      function preview_image(gambar,idpreview) {
        var gb = new gambar.files;
        for (var i = 0; i<gb.length; i++){
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementsById(idpreview);
            var reader =  new FileReader();

            if (gbPreview.type.match(imageType)){
              preview.file = gbPreview;
              reader.onload = (function(element){
                return function(e) {
                  element.src = e.target.result;
                };
              })preview);
                reader.readerAsDataURL(gbPreview);
              }else{
                alert("file tidak sesuai");
              }
      }
</script>  

  </body>
</html>