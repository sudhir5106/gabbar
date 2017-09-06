		<div id="clearfix"></div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
        	Website Portfolio
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>

  </div>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/bootstrap.min.js"></script>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/custom.js"></script>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery.validate.js"></script>
  <script src="<?php echo PATH_JS_LIBRARIES ?>/additional-methods.min.js"></script>
  <!-- Time Picker Css , Js-->
 <link rel="stylesheet" href="<?php echo PATH_CSS_LIBRARIES ?>/timedropper.css">
  <script src="<?php echo PATH_JS_LIBRARIES ?>/timedropper.js"></script>
  <!-- Time Picker Closed-->
  <script type="text/javascript">
   <!--Datepicker Show here-->
	$(function () {
		
		
			<!---Date Picker Get HEre-->
	$(document).on('focusin','.datepicker',function(){
		$(this).datepicker({
				 orientation: "top auto",
				forceParse: false,
				autoclose: true,
				dateFormat:'dd-mm-yy'
				});
	});
		<!-- TimeDropper Time Picker -->
		$( ".timepicker" ).timeDropper({
			/* 
			// custom time format
 			 format: 'h:mm a',
			 // auto changes hour-minute or minute-hour on mouseup/touchend.
			  autoswitch: false,
			
			  // sets time in 12-hour clock in which the 24 hours of the day are divided into two periods. 
			  meridians: false,
			
			  // enable mouse wheel
			  mousewheel: false,
			
			  // auto set current time
			  setCurrentTime: true,
			
			  // fadeIn(default), dropDown
			  init_animation: "fadein",
			
			  // custom CSS styles
			  primaryColor: "#1977CC",
			  borderColor: "#1977CC",
			  backgroundColor: "#FFF",
			  textColor: '#555'*/
			  format: 'HH:mm ',
			  autoswitch: false,
			  setCurrentTime:false,
			
			});
	});
	
 </script>

</body>

</html>
