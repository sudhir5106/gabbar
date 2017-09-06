// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#categoryform").validate({
	  rules: 
		{ 
			
			title:
			{
				required:true,
			},
			url:
			{
				required:true,
				url:true,
			},
			imageupload: 
			{ 
				required: true,
					
			}
			
		},
		messages:
		{
		}
	});// eof validation
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
		
			
			var totalFiles = document.getElementById("imageupload").files.length;
			if(totalFiles<1)
			{
				$('#errmsg').show();
				$('#errmsg').append("image is required");;
				return false;
			}
			
			//$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "addImageupload");
			formdata.append('title', $("#title").val());
			formdata.append('position', $("#position").val());
			formdata.append('url', $("#url").val());
			
			for (var i = 0; i < totalFiles; i++) {
				var file = document.getElementById("imageupload").files[i];
				formdata.append("imageupload[]", file);  //Use [] to add multiple.
			}
			var x;
			$.ajax({
			   type: "POST",
			   url: "imageuplaod_curd.php",
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
	// on click of Update
	//////////////////////////////////
	$('#update').click(function(){
     
		flag=$("#categoryform").valid();
		
		if (flag==true)
		{	
		
			
			
			
			var totalFiles = $("#imageupload2").val().length;
			var imgval='';
			var image='';
			if(totalFiles > 0)
			{
					var image=$("#imageupload2").prop('files')[0];
					imgval=1;
			}	
			
			//$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "editImageupload");
			formdata.append('title', $("#title").val());
			formdata.append('position', $("#position").val());
			formdata.append('url', $("#url").val());
			formdata.append("imageupload2", image);  //Use [] to add multiple.
			formdata.append("imgval", imgval);  //Use [] to add multiple.
			formdata.append("oldimage", $('#oldimage').val());  //Use [] to add multiple.
			formdata.append("id", $('#id').val());  //Use [] to add multiple.
			var x;
			$.ajax({
			   type: "POST",
			   url: "imageuplaod_curd.php",
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
				url:"imageuplaod_curd.php",
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
	
	//OnChange Lange GEt Sub Category
	$(document).on('change','#langauge',function()
	{
			var id=$(this).val();
			var x;
			$.ajax({
				url:"imageuplaod_curd.php",
				type: "POST",
				data: {type:"getCategory",id:id},
				async:false,
				success: function(data){ 
				$('#category').html(data);
				//alert(data);
				}
			});
			
	
	})
	
	//OnChange Lange GEt Sub Category
	$(document).on('change','#category',function()
	{
			var id=$(this).val();
			var x;
			$.ajax({
				url:"imageuplaod_curd.php",
				type: "POST",
				data: {type:"getSubcategory",id:id},
				async:false,
				success: function(data){ 
				$('#subcategory').html(data);
				//alert(data);
				}
			});
			
	
	})
	
	
	//OnChange Lange GEt Sub Category
	$(document).on('change','#subcategory',function()
	{
			var formdata = new FormData();
			formdata.append('type', "imageShow");
			formdata.append('subcategory', $(this).val());
			$("#loding").show();
			var x;
			$.ajax({
			   type: "POST",
			   url: "imageuplaod_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){//alert(data);
				   $('#imageShow').html(data);
				   $("#loding").hide();
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	})
});
//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	
	
	$(document).on('click',"#deletegalleryimage",function(){
		
		var i=0;
			 var delete_id = [];	
		     $('.deletegallery').each(function(){
	       
		      if($(this).prop('checked') == true)		 
		      {
			  delete_id.push($(this).attr("id"));
			  i++;
		      }
	     });
		 if(i==0){
			
			alert("Please Select Any One Option"); 
			 
			 }
			 alert(delete_id);
			if(i!=0){
				 //alert("Are you sure? ")
				 var didConfirm = confirm("Are you sure?");
				 if(didConfirm==true)
				 {
				// alert(delete_id);
				$("#loding").show();
		
				
			$.ajax({
				url:"imageuplaod_curd.php",
				type: "POST",
				data: {type:"deletegallerymultiimg",id:delete_id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
			}
	});		
	
//On click Checked The All THE LIST	
$(document).on('change',".deletegallery",function (event) { 
          if($('#selecctallgallery').prop('checked') == true)	{	
	          $('#selecctallgallery').attr('checked',false); 	
		  }
        }); 
		
	$(document).on('click','#selecctallgallery',function(event) {  //on click 
        if(this.checked) { // check select status
            $('.deletegallery').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }
		else { // check select status
            $('.deletegallery').each(function() { //loop through each checkbox
                this.checked = false;  //select all checkboxes with class "checkbox1"               
            });
        }
		
    });
	//////////////////////////////////
	// on click of radio btn
	//////////////////////////////////
	

	$(document).on('click',".mainimage",function(){
		
		var didConfirm = confirm("Are you sure ?");
	    if (didConfirm == true) {
			var id=$(this).val();
			var book_id=$('#subcategory').val();
			
			$("#loding").show();
			$.ajax({
				url:"imageuplaod_curd.php",
				type: "POST",
				data: {type:"makemainimage",id:id,book_id:book_id},
				async:false,
				success: function(data){///alert(data);
				$("#loding").hide();
				}
			});
			//location.reload();
	    }
	});		
	
//Search Filter Write HEre
$(document).on('click','#search',function()
{
	
		var x;
		$.ajax({
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",langauge:$('#langauge').val(),category:$('#category').val(),subcategory:$('#subcategory').val(),imagename:$('#imagename').val()},
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