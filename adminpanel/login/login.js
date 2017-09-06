// JavaScript Document
$(document).ready(function(){
		$('.loading').hide();
 //###############################################################################################################################################################
  //######################################################## Chnage Password here #################################################################################
  //###############################################################################################################################################################
  
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#chnagepassword").validate({
	 rules: 
		{ 
			oldpassword: 
			{ 
				required: true,
				minlength:6,
			},
			newpassword:
			{ 
				required:true,
				minlength:6,
			},
			retypepassword:
			{
				required:true,
				equalTo: "#newpassword",

			}
		},
		message :
		{}
								  });
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#changeSubmit').click(function(){
     
		 	
		flag=$("#chnagepassword").valid();
		
		if (flag==true)
		{	
		
			$('#changeSubmit').hide();
		 	$('.loading').show();			
			var formdata = new FormData();
			formdata.append('type', "chnagePasswd");
			formdata.append('oldpassword', $("#oldpassword").val());
			formdata.append('newpassword', $("#newpassword").val());
			formdata.append('retypepassword', $("#retypepassword").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "login_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //$('#submit').html(data);
			  // alert(data);
				   x=data;
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			if(x==1)
			{	
				$('.loading').hide();		
				$( "#dialog_success" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("../index.php");
							}
						}
					  });
			 }
			 else
			 {	
				
				$('.loading').hide();
				$('#changeSubmit').show();		
				$( "#dialog_error" ).dialog({
						dialogClass: "alert",
						open: function () {
									$(this).html(x);
								},
						buttons: {
						 'Ok': function() {
							 $( this ).dialog( "close" );
							}
						}
					  });
			 }
		}// eof if condition
		
	});
});