
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

	<!-- BootStrap -->
	<script src="<?php echo base_url('public/js/bootstrap.min.js');?>"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="<?php echo base_url('public/js/vendor/holder.min.js');?>"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="<?php echo base_url('public/js/ie10-viewport-bug-workaround.js');?>"></script>
	<!-- Datepicker -->
	<script src="<?php echo base_url('public/js/bootstrap-datepicker.js');?>"></script>

<script type="text/javascript">

      $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>

<script>
      $(document).ready(function () {
        $('#inicio_evento').datepicker({
            /*changeMonth: true,
            	changeYear: true,
                dateFormat: 'dd/mm/yy',
                showButtonPanel:true*/
            format: "yyyy-mm-dd",
            language: "pt-BR"    	
        });
        $('#fim_evento').datepicker({
        	format: "yyyy-mm-dd",
            language: "pt-BR"
        });
        $('#dia_up_mat_evento').datepicker({
        	format: "yyyy-mm-dd",
            language: "pt-BR"
        });
        $('#data_atividade').datepicker({
        	format: "yyyy-mm-dd",
            language: "pt-BR"
        });
        
      });
    </script>
<script type="text/javascript">
$(document).ready(function(){
		$("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
        $("input.real").mask("999.99");
        $("input.hora").mask("99:99:99");
});
</script>
</body>
</html>
