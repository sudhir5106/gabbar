// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 
			
			name: 
			{ 
				required: true,
				CheckGategory:true,
			},
			file_name: 
			{ 
				required: true,
				//CheckGategory:true,
			},
			position: 
			{ 
				required: true,
				min:1,
			}
			
		},
		messages:
		{
		}
	});// eof validation
	
	/////////////////////////////////////
	//Validate add method for Branch 
	/////////////////////////////////////
	$.validator.addMethod('CheckGategory', function(val, element)
	{
		cate_name=$("#name").val();
		id=$("#id").val();
		$.ajax({
				 url:"category_curd.php",
				 type: "POST",
				 data: {type:"validate",cate_name:cate_name,id:id},
				 async:false,
				 success:function(data){
					// alert(data);
					 isSuccess=(data==1)?false:true;
					 }
		});//eof ajax
		return isSuccess ;				
	}, 'menu is already exists.');
	
	
	
	
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
			formdata.append('type', "addMenu");
			formdata.append('cate_name', $("#name").val());
			formdata.append('file_name', $("#file_name").val());
			formdata.append('position', $("#position").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "category_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;//
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
			formdata.append('type', "editMenu");
			formdata.append('cate_name', $("#name").val());
			formdata.append('position', $("#position").val());
			formdata.append('file_name', $("#file_name").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "category_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){
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
			}
			else
			{
				$('#update').show();
				alert(x);
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
				url:"category_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){ //alert(data);
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