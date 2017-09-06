// JavaScript Document
$(document).ready(function(){
		$('.loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#regForm").validate({
	 rules: 
		{ 
			
			mobile:
			{
				//required:true,
				number:true,
				minlength: 10,
				maxlength: 10,
			},
			email:
			{
				//required:true,
				email: true,
				Exist:true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	////////////////////////////////////////////////////////////////
	// method to check email id already exist or not in the database
	////////////////////////////////////////////////////////////////
	var isSuccess ;
	$.validator.addMethod('Exist', function(val, element)
	{
		
		emailId=$("#email").val();
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"validate",email:emailId},
			 async:false,
			 success : function(data)
				 {
					 //alert(data);
					if(data==0){
						isSuccess = true ;
					}else
					{
						isSuccess = false;
					}
				 }
		});
		return isSuccess ;				
	}, 'Email Already exist. Please choose another email id');
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		 	
		flag=$("#regForm").valid();
		
		if (flag==true)
		{	
		
			$('#submit').hide();
		 	$('.loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editProfile");
			formdata.append('username', $("#username").val());
			formdata.append('email', $("#email").val());
			formdata.append('mobile', $("#mobile").val());
			formdata.append('job_title', $("#job_title").val());
			formdata.append('country', $('#country').val());
			formdata.append('city', $("#city").val());
			formdata.append('website', $("#website").val());
			//formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "profile_curd.php",
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
							window.location.replace("index.php");
							}
						}
					  });
			 }
			 else
			 {	
				$('.loading').hide();
				$('#submit').show();		
				$( "#dialog_error" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							 $( this ).dialog( "close" );
							}
						}
					  });
			 }
		}// eof if condition
		
	});
	
	//////////////////////////////////
	// Image Upload here
	////////////////////////////////////
    $("#myImage").validate({
	 rules: 
		{ 
			
			profileimage:
			{
				required:true,
				extension: "png|PNG|jpg|JPG|jpeg|JPEG",
				uploadFile:true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	//Image Size Validated HEre
	$.validator.addMethod("uploadFile", function (val, element) {

          var size = element.files[0].size;
            console.log(size);

           if (size > 524288)// checks the file more than 1048576 kb =1 MB
           {
               //console.log("returning false");
                return false;
           } else {
              // console.log("returning true");
               return true;
           }

      }, "Error: file size must be less than 500kb ");
	//////////////////////////////////
	// on click of submit button Image Update
	//////////////////////////////////
	$('#updateImage').click(function(){
		flag=$("#myImage").valid();
		if (flag==true)
		{	
		
			$('#updateImage').hide();
		 	$('.loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editImage");
			formdata.append('profile_image',$("#profileimage").prop('files')[0]);
			var x;
			$.ajax({
			   type: "POST",
			   url: "profile_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //$('#submit').html(data);
			  // alert(data);
				   x=data;
				   window.location.replace("index.php");
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
							window.location.replace("index.php");
							}
						}
					  });
			 }
			 else
			 {	
				$('.loading').hide();
				$('#updateImage').show();		
				$( "#dialog_error" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							 $( this ).dialog( "close" );
							}
						}
					  });
			 }
		}// eof if condition
		
	});
	////////////////////////////////
	// on change of country drop down
	////////////////////////////////
	$("#country").change(function(){
		
		country=$("#country").val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getStates",country:country},
			 async:false,
			 success: function(data){ 
				 $('#state').html(data);
			 }
		});
	});
	
	
	////////////////////////////////
	// on change of state drop down
	////////////////////////////////
	$("#state").change(function(){
		
		state=$("#state").val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getCity",state:state},
			 async:false,
			 success: function(data){ 
				 $('#city').html(data);
			 }
		});
	});
	//##########################################################################Shiipping address###############################################333
	////////////////////////////////
	// on change of country drop down
	////////////////////////////////
	$("#ShipCountry").change(function(){
		country=$(this).val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getStates",country:country},
			 async:false,
			 success: function(data){ 
				 $('#shipState').html(data);
			 }
		});
	});
	
	
	////////////////////////////////
	// on change of state drop down
	////////////////////////////////
	$("#shipState").change(function(){
		
		state=$(this).val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getCity",state:state},
			 async:false,
			 success: function(data){ 
				 $('#shipCity').html(data);
			 }
		});
	});
	
	
//######################################################################################
//############################### Get Here Same Shipping Address ############################
//////////////////////////////////////////////////////////
	$("#chkforSameAdd").click(function(){
		$('#shipAddress').val($("#address").val());
		$('#shipPostcode').val($("#postcode").val());			
		$('#ShipCountry').val($("#country").val());
		$('#shipAddiComnts').val($("#addiComnts").val());
		$('#shipMobileno').val($("#mobileno").val());
		$('#shipLandno').val($("#landno").val());
		$('#mcode1').val($("#mcode").val());
		$('#lcode1').val($("#lcode").val());
		var setcountry = $("#country").val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getStates",country:setcountry},
			 async:false,
			 success: function(data){ 
				 $('#shipState').html(data);
			 }
		});
		
		$('#shipState').val($("#state").val());
		if ($("#shipState option:selected").text()=="Other")
		{
			$("#other_state").show();
			$("#other_state").val($("#personal_other_state").val());
			$("#other_state").rules('add',{
				required:true,
				
			});
			
			}
		
		var setstate = $("#state").val();
		
		$.ajax({
			 url:"profile_curd.php",
			 type: "POST",
			 data: {type:"getCity",state:setstate},
			 async:false,
			 success: function(data){ 
				 $('#shipCity').html(data);
			 }
		});
		$('#shipCity').val($("#city").val());
		if($("#shipCity option:selected").text()=="Other")
		{
			
			$("#other_city").show();
			$("#other_city").val($("#personal_other_city").val());
			$("#other_city").rules('add',{
				required:true,
				
			});
		}
		
	});
	
	

//##########################################################################
//############################3 Get HEre pin type ##########################	
 $('#ptype').change(function() 
 {
	 
	var ptype=$('#ptype').val();
	if(ptype!=0)
	{
		$.ajax({
				 url:"profile_curd.php",
				 type: "POST",
				 data: {type:"getPin",ptype:ptype},
				 async:false,
				 success: function(data){ 
					 $('#PinNo').html(data);
				 }
			});
	}
});
	
	
	
	
	
	
    /////////////////////////////////
	// on click of edit button
	/////////////////////////////////		
	$('#update').click(function(){
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
		
			$('#update').hide();
		    $('.loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editForm");
			formdata.append('country', $("#country").val());
			formdata.append('state', $("#state").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "state_master_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){//alert(data);
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
							window.location.replace("list.php");
							}
						}
					  });
			 }
			 else
			 {	
				$('.loading').hide();
				$('#update').show();		
				$( "#dialog_error" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							 $( this ).dialog( "close" );
							}
						}
					  });
			 }
		}// eof if condition
		
	});
	
	
	
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	
	$(document).on('click', '.delete', function() {
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).attr("id");
			var x;
			$.ajax({
				url:"state_master_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){//alert(data);
				}
			});
			if(x==1)
			{
				$('.loading').hide();	
				$( "#deletemsg" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("list.php");
							}
						}
					  });
			}
			location.reload();
	    }
	});

//Search Filter Write HEre
$(document).on('click','#search',function()
{
	
		var x;
		$.ajax({
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",country:$('#country').val(),state:$('#state').val(),city:$('#city').val()},
			async:false,
			success: function(data){ 
			$('#add').html(data);
			//alert(data);
			}
		});
			

});

//on Click Get Here View Details
  $(document).on('click','.view-details',function() {
	  var id=$(this).attr('value');
     $( "#show"+id).dialog({
      modal: true,
      buttons: {
        Close: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
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
			   url: "profile_curd.php",
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
							window.location.replace("index.php");
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
	
	
});// JavaScript Document