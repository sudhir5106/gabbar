// JavaScript Document
$(document).ready(function(){
 
	//////////////////////////////////
	// Package form validation
	////////////////////////////////////
    $("#packageform").validate({
	  rules: 
		{ 			
			packageName: 
			{ 
				required: true,
				Exist: true,
			},
			'catId[]': 
			{ 
				required: true,
			},
			oldprice:
			{
				required: true,
				number: true,
			},
			newprice:
			{
				required: true,
				number: true,
			},
			sku:
			{
				required: true,
			},
			pimage:
			{
				required: true,
				extension: "jpg|png|jpeg|gif",
				uploadFile:true
			}
		},
		messages:
		{
		}
	});// eof validation
	
	//////////////////////////////////
	// Package form validation
	////////////////////////////////////
    $("#editpackageform").validate({
	  rules: 
		{ 			
			packageName: 
			{ 
				required: true,
				EditExist: true,
			},
			'catId[]': 
			{ 
				required: true,
			},
			oldprice:
			{
				required: true,
				number: true,
			},
			newprice:
			{
				required: true,
				number: true,
			},
			sku:
			{
				required: true,
			},
			pimage:
			{
				//required: true,
				extension: "jpg|png|jpeg|gif",
				uploadFile:true
			}
		},
		messages:
		{
		}
	});// eof validation
	
	// custom method to check data already exist or not
	$.validator.addMethod('Exist', function(val, element)
	{
		packageName=$("#packageName").val();

		$.ajax({
			url:"package_curd.php",
			type: "POST",
			data: {type:"packageExist",packageName:packageName},
			async:false,
			success:function(data){

				isSuccess=(data==0)?false:true;
			}
		});//eof AJAX
		return isSuccess ;				
	}, 'Package Name Already Exists.');
	
	
	// custom method to check data already exist or not
	$.validator.addMethod('EditExist', function(val, element)
	{
		packageName=$("#packageName").val();
		packageId=$("#packageId").val();

		$.ajax({
			url:"package_curd.php",
			type: "POST",
			data: {type:"EditExist",packageName:packageName, packageId:packageId},
			async:false,
			success:function(data){ //alert(data);

				isSuccess=(data==0)?false:true;
			}
		});//eof AJAX
		return isSuccess ;				
	}, 'Package Name Already Exists.');
	
	
	//Image Size Validated HEre
	$.validator.addMethod("uploadFile", function (val, element) {
		 if($("#pimage").val().length>0)
			{
			  var size = element.files[0].size;
			  //  console.log(size);
	
			   if (size >= 300000)// checks the file more than 1048576 kb =1 MB
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

      }, "Error: Image size must be less than 300kb ");
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click', '#submit', function() {
		
		flag=$("#packageform").valid();
		
		if (flag==true)
		{	
			
			var checkedCat=[];
			$('.categoryId').each(function() { //loop through each checkbox
                
				if($(this).prop('checked') == true)
				{
					checkedCat.push($(this).attr("id"));//put the checked Category Id's in the array
				}
				
            });
			
			
			var formdata = new FormData();
			formdata.append('type', "addPackage");
			formdata.append('packageName', $("#packageName").val());
			formdata.append('oldprice', $("#oldprice").val());
			formdata.append('newprice', $("#newprice").val());
			formdata.append('sku', $("#sku").val());
			formdata.append('pimage', $('#pimage')[0].files[0]);
			
			formdata.append('checkedCatId',checkedCat);
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "package_curd.php",
			   data:formdata,
			   success: function(data){// alert(data);
				   x=data;
				   
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
	$(document).on('click', '#update', function() {
		
		flag=$("#editpackageform").valid();
				
		if (flag==true)
		{	
		
			var checkedCat=[];
			$('.categoryId').each(function() { //loop through each checkbox
                
				if($(this).prop('checked') == true)
				{
					checkedCat.push($(this).attr("id"));//put the checked Category Id's in the array
				}
				
            });			
			
			var formdata = new FormData();
			formdata.append('type', "update");
			formdata.append('packageId', $("#packageId").val());
			formdata.append('packageName', $("#packageName").val());
			formdata.append('oldprice', $("#oldprice").val());
			formdata.append('newprice', $("#newprice").val());
			formdata.append('sku', $("#sku").val());
			formdata.append('pimage', $('input[id=pimage]')[0].files[0]);
			formdata.append('pic', $("#pic").val());
			formdata.append('checkedCatId',checkedCat);
						
			var x;
			$.ajax({
			   type: "POST",
			   url: "package_curd.php",
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
		
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////	
	$(document).on('click', '.delete', function() {
		
		//event.preventDefault();
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).attr("id");
			var x;
			$.ajax({
				url:"package_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				success: function(data){ //alert(data);
					
					x=data;
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
					}//eof if condition
				
				}
			});//eof ajax
			
	    }//eof if condition
	});//eof delete function
	
	
});//eof ready function

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