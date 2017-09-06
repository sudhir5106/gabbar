// JavaScript Document
$(document).ready(function(){
	
	//////////////////////////////////
	// Add Category form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 			
			catName: 
			{ 
				required: true,
				CatNameExist:true,
			}			
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	//////////////////////////////////
	// Edit Category form validation
	////////////////////////////////////
    $("#editcategoryform").validate({
	  rules: 
		{ 			
			catName: 
			{ 
				required: true,
				EditCatNameExist:true,
			}			
		},
		messages:
		{
			
		}
	});// eof validation
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('CatNameExist', function(val, element)
	{		
		$.ajax({
			 url:"category_curd.php",
			 type: "POST",
			 data: {type:"CatNameExist",catName: $('#catName').val()},
			 async:false,
			 success:function(data){//alert(data);
				 isSuccess=(data!=1)?true:false;
			 }
		});//eof ajax
		return isSuccess ;				
	}, 'Category Name Already Exist');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('EditCatNameExist', function(val, element)
	{		
		$.ajax({
			 url:"category_curd.php",
			 type: "POST",
			 data: {type:"EditCatNameExist",catId:$('#catId').val(), catName: $('#catName').val()},
			 async:false,
			 success:function(data){//alert(data);
				 isSuccess=(data!=1)?true:false;
			 }
		});//eof ajax
		return isSuccess ;				
	}, 'Category Name Already Exist');
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	

			var formdata = new FormData();
			formdata.append('type', "addCategory");
			formdata.append('catName', $("#catName").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "category_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   
				   if(x==1)
					{	
						$( "#dialog" ).dialog({
							dialogClass: "alert",
							buttons: {
							 'Ok': function() {
								window.location.replace("index.php");
								}
							}
						  });
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			
		}// eof if condition
		
	});
	
	
	/////////////////////////////////
	// on click of edit button
	/////////////////////////////////		
	$('#update').click(function(){
		flag=$("#editcategoryform").valid();
		
		if (flag==true)
		{	
		
			var formdata = new FormData();
			formdata.append('type', "editCategory");
			formdata.append('catName', $("#catName").val());
			formdata.append('catId', $('#catId').val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "category_curd.php",
			   data:formdata,
			   success: function(data){//alert(data);
			   
				   x=data;
				   				   
				   if(x==1)
					{
						$( "#dialog" ).dialog({
							dialogClass: "alert",
							buttons: {
							 'Ok': function() {
								window.location.replace("index.php");
								}
							}
						  });
					}
				   
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			
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
				success: function(data){ //alert(data);
				
					if(x==1)
					{
						$( "#deletemsg" ).dialog({
							dialogClass: "alert",
							buttons: {
							 'Ok': function() {
								window.location.replace("index.php");
								}
							}
						  });
					}
					location.reload();
				}
			});
			
	    }
	});// eof delete event
	
	
});// eof ready function    