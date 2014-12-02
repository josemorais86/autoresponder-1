    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
    
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <!-- fancybox -->
    <script type="text/javascript" src="<?php echo base_url();?>js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript">       
        $(window).load(function () {
        // Una vez se cargue al completo la página desaparecerá el div "cargando"
        $('#cargando').fadeOut( "slow", function() {
          // Animation complete.
            });
        });
    </script>    