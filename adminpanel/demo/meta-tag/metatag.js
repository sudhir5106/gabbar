// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 
			page_url: 
			{ 
				required: true,
				CheckGategory:true,
				url:true,
				
			},
			page_title: 
			{ 
				required: true,
				
				
			},
			page_heading:
			{
				required:true,
			},
			meta_keyword: 
			{ 
				required: true,
				CheckGategory:true,
			},
			meta_desc: 
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
	$.validator.addMethod('CheckGategory', function(val, element)
	{
		cate_name=$("#page_url").val();
		id=$("#id").val();
		$.ajax({
				 url:"metatag_curd.php",
				 type: "POST",
				 data: {type:"validate",cate_name:cate_name,id:id},
				 async:false,
				 success:function(data){
					// alert(data);
					 isSuccess=(data==1)?false:true;
					 }
		});//eof ajax
		return isSuccess ;				
	}, 'This Url Is Allready Exists.');
	
	
	
	
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
			formdata.append('type', "addDetail");
			formdata.append('page_url', $("#page_url").val());
			formdata.append('page_title', $("#page_title").val());
			formdata.append('page_heading', $("#page_heading").val());
			formdata.append('meta_keyword', $("#meta_keyword").val());
			formdata.append('meta_desc', $("#meta_desc").val());
			
			formdata.append('h_page_title', $("#h_page_title").val());
			formdata.append('h_page_heading', $("#h_page_heading").val());
			formdata.append('h_meta_keyword', $("#h_meta_keyword").val());
			formdata.append('h_meta_desc', $("#h_meta_desc").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "metatag_curd.php",
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
				$('#loading').hide();		
				$( "#dialog1" ).dialog({
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
			 $('#loading').hide();		
				$( "#dialog2" ).dialog({
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
			formdata.append('type', "editDetail");
			formdata.append('page_url', $("#page_url").val());
			formdata.append('page_title', $("#page_title").val());
			formdata.append('page_heading', $("#page_heading").val());
			formdata.append('meta_keyword', $("#meta_keyword").val());
			formdata.append('meta_desc', $("#meta_desc").val());
			
			formdata.append('h_page_title', $("#h_page_title").val());
			formdata.append('h_page_heading', $("#h_page_heading").val());
			formdata.append('h_meta_keyword', $("#h_meta_keyword").val());
			formdata.append('h_meta_desc', $("#h_meta_desc").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "metatag_curd.php",
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
				$('#loading').hide();	
				$( "#dialog" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("list.php");
							}
						}
					  });
			}else
			{
				$('#update').show();
				
			 $('#loading').hide();		
				$( "#dialog2" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("edit.php");
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
				url:"metatag_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){//alert(data);
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
	
	
});

//Search Filter Write HEre
$(document).on('click','#search',function()
{
	
		var x;
		$.ajax({
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",page_title:$('#page_title').val()},
			async:false,
			success: function(data){ 
			$('#add').html(data);
			//alert(data);
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