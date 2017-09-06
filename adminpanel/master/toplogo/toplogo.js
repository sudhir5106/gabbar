// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 
			website_name:
			{
				//required:true,
			},
			logo: 
			{ 
				//required:true,
				extension: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF",
				uploadFile:true,
			}
		},
		messages:
		{
		}
	});// eof validation
	
	//Image Size Validated HEre
	$.validator.addMethod("uploadFile", function (val, element) {
		 if($("#logo").val().length>0)
			{
			  var size = element.files[0].size;
			  //  console.log(size);
	
			   if (size > 1048588)// checks the file more than 1048576 kb =1 MB
			   {
				   //console.log("returning false");
					return false;
			   } else {
				  // console.log("returning true");
				   return true;
			   }
			} else {
				  // console.log("returning true");
				   return true;
			   }

      }, "Error: file size must be less than 1mb ");
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
		
			var imgval='';	
			if($("#logo").val().length == 0 && $("#website_name").val()=='')
			{
				alert('Please select atleast any one option');
				return false;
				
			}
			if($("#logo").val().length > 0)
			{
					var image=$("#logo").prop('files')[0];
					imgval=1;
			}	
			$('#submit').hide();
		 	$('.loading').show();
			
			var formdata = new FormData();
			formdata.append('type', "addCategory");
			formdata.append('logo',image);
			formdata.append('imgval',imgval);
			formdata.append('website_name',$("#website_name").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "toplogo_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //$('#submit').html(data);
			 // alert(data);
				   x=data;
				   //window.location.replace("index.php");
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
	// on click of Update
	//////////////////////////////////
	$('#update').click(function(){
     
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
			var imgval='';	
			if($("#logo").val().length == 0 && $("#website_name").val()=='')
			{
				alert('Please select atleast any one option');
				return false;
				
			}
			if($("#logo").val().length > 0)
			{
					var image=$("#logo").prop('files')[0];
					imgval=1;
			}	
				
			
			$('#update').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "editImageupload");
			formdata.append('logo',image);
			formdata.append('imgval',imgval);
			formdata.append('oldimage',$('#oldimage').val());
			formdata.append('website_name',$("#website_name").val());
			formdata.append("id", $('#id').val());  //Use [] to add multiple.
			var x;
			$.ajax({
			   type: "POST",
			   url: "toplogo_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			if(x==1)
			{	
				$('#loading').hide();		
				$( "#dialog1" ).dialog({
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
			 $('#update').show();
			 $('#loading').hide();		
				$( "#dialog2" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							$(this).dialog('close');
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
			//alert(id);
			var x;
			$.ajax({
				url:"toplogo_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			
			location.reload();
	    }
	});
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	
	$(document).on('click', '.status', function() {
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).val();
			var x;
			$.ajax({
				url:"toplogo_curd.php",
				type: "POST",
				data: {type:"status",id:id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
	});
	
	
	
	$('#search1').click(function(){
//		if($('#branch_id').valid())
		{
		var formdata = new FormData();
		formdata.append('type', "searchid");
				formdata.append('search_plantname', $("#search_plantname").val());

		formdata.append('branch_id', $("#branch_id").val());
		formdata.append('branch_code', $("#branch_code").val());
					
			var x;
			$.ajax({
			   type: "POST",
			   url: "branch_report.php",
			   data: formdata,
			   async: false,
			   success: function(data){  //alert(data);
				   x=data;
				   $('#add').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false,
			});//eof ajax
		
			if(x==0)
			{
				window.location.replace("index.php");
			}
			
		}
		
	});	
	
	
	
});

$(document).ready(function() {
    $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});