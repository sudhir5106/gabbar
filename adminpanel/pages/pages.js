// JavaScript Document
$(document).ready(function(){
	
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 
			
			menu_id: 
			{ 
				required: true,
				CheckPage:true,
			},
			details: 
			{ 
				required: true,
				
				
			}
			
		},
		messages:
		{
		}
	});// eof validation
	
	/////////////////////////////////////
	//Validate add method for Branch 
	/////////////////////////////////////
	$.validator.addMethod('CheckPage', function(val, element)
	{
		menu_id=$("#menu_id").val();
		id=$("#id").val();
		$.ajax({
				 url:"pages_curd.php",
				 type: "POST",
				 data: {type:"validate",menu_id:menu_id,id:id},
				 async:false,
				 success:function(data){
					// alert(data);
					 isSuccess=(data==1)?false:true;
					 }
		});//eof ajax
		return isSuccess ;				
	}, 'menu page is already exists.');
	
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#imagesave').click(function(){
     
		if ($('#imageupload').val()!='')
		{	
			//$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "image");
			formdata.append('imageupload', $("#imageupload").prop('files')[0]);
			formdata.append('id',$('#id').val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "pages_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
				   $('#dialog_image').html(data);
				   $('#imagepath').html('<strong>Image Path:'+data+'</strong>');
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			if(x!=0)
			{	
				$('#loading').hide();		
				$( "#dialog_image" ).dialog({
						title: "Copy Image Upload Path",
						height: 200,
        				width: 500,
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
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     	
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
			
			$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "addPages");
			formdata.append('menu_id', $("#menu_id").val());
			formdata.append('details', tinyMCE.get('details').getContent());
			/*formdata.append('filename', $("#filename").val());
			formdata.append('menushow', $("#menushow").val());
			formdata.append('h_title', $("#h_title").val());
			formdata.append('h_details', tinyMCE.get('h_details').getContent());
			formdata.append('position', $("#menuorder").val());*/
			var x;
			$.ajax({
			   type: "POST",
			   url: "pages_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
				   $('#loading').hide();
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			if(x==1)
			{	
				$('#loading').hide();		
				$( "#dialog" ).dialog({
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
				$('#submit').show();
				alert('Something is wrog please try again');
			
			}
		}// eof if condition
		
	});
	
    /////////////////////////////////
	// on click of edit button
	/////////////////////////////////		
	$('#update').click(function(){
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
		
			$('#update').hide();
		    $('#loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editPages");
			formdata.append('menu_id', $("#menu_id").val());
			formdata.append('details', tinyMCE.get('details').getContent());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "pages_curd.php",
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
				$( "#dialog" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("index.php");
							}
						}
					  });
			}else
			{
				$('#loading').hide();
				$('#update').show();
				$( "#dialog_error" ).dialog({
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
			var x;
			$.ajax({
				url:"pages_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){ alert(data);
				}
			});
			if(x==1)
			{
				 $('#loading').hide();	
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