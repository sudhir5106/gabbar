// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#addform").validate({
	  rules: 
		{ 
			
			title:
			{
				required:true,
			},
			imageupload: 
			{ 
				required: true,
				//CheckGategory:true,
			},
			start_date:
			{
				required:true,
			},
			end_date:
			{
				required:true,
			},
			desc:
			{
				required:true,
			
			}
			
			
		},
		messages:
		{
		}
	});// eof validation
	
	/*/////////////////////////////////////
	//Validate add method for Branch 
	/////////////////////////////////////
	$.validator.addMethod('CheckGategory', function(val, element)
	{
		cate_name=$("#name").val();
		id=$("#id").val();
		$.ajax({
				 url:"subcategory_curd.php",
				 type: "POST",
				 data: {type:"validate",cate_name:cate_name,id:id},
				 async:false,
				 success:function(data){
					// alert(data);
					 isSuccess=(data==1)?false:true;
					 }
		});//eof ajax
		return isSuccess ;				
	}, 'sub-category is already exists.');
	*/
	
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
			
			
			var totalFiles = document.getElementById("imageupload").files.length;
			if(totalFiles<1)
			{
				$('#errmsg').show();
				$('#errmsg').append("image is required");;
				return false;
			}
		
		
			$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "addNew");
			formdata.append('title', $("#title").val());
			<!--Multiple image get here-->
			for (var i = 0; i < totalFiles; i++) {
				var file = document.getElementById("imageupload").files[i];
				formdata.append("imageupload[]", file);  //Use [] to add multiple.
			}
			<!--Closed Image -->
			formdata.append('desc', tinyMCE.get('desc').getContent());
			formdata.append('start_date', $("#start_date").val());
			formdata.append('end_date', $("#end_date").val());
			formdata.append('end_time', $("#end_time").val());
			formdata.append('start_time', $("#start_time").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "event_curd.php",
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
			 $('#submit').show();
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
		flag=$("#addform").valid();
		if (flag==true)
		{	
			var newimage='';
			
			$('#update').hide();
		    $('#loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editForm");
			formdata.append('title', $("#title").val());
			<!--Multiple image get here-->
			if($("#imageupload2").val().length>0)
			{
				var totalFiles = document.getElementById("imageupload2").files.length;
			
				for (var i = 0; i < totalFiles; i++) 
				{
					var file = document.getElementById("imageupload2").files[i];
					formdata.append("imageupload[]", file);  //Use [] to add multiple.
				}
				
				formdata.append('image', 1);
			}
			else
			{
				formdata.append('image', newimage);
			
			}
			<!--Closed Image -->
			formdata.append('desc', tinyMCE.get('desc').getContent());
			formdata.append('start_date', $("#start_date").val());
			formdata.append('end_date', $("#end_date").val());
			formdata.append('end_time', $("#end_time").val());
			formdata.append('start_time', $("#start_time").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "event_curd.php",
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
			}else{
				
				$('#loading').hide();	
				$( "#dialog2" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("list.php");
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
				url:"event_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){alert(data);
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
			data: {type:"searchList",title:$('#title').val(),start_date:$('#start_date').val(),end_date:$('#end_date').val()},
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
  
//Onclick Active And Unactive
$(document).on('click','.checkStatus',function()
	{
		
			var id=$(this).attr('value');
			var x;
			$.ajax({
				url:"event_curd.php",
				type: "POST",
				data: {type:"CheckStatus",id:id},
				async:false,
				success: function(data){// alert(data);
					location.reload();
				}
			});
			
	
	})

	//////////////////////////////////
	// Image Delete on click of delete button
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
			// alert(delete_id);
			if(i!=0){
				 //alert("Are you sure? ")
				 var didConfirm = confirm("Are you sure?");
				 if(didConfirm==true)
				 {
				// alert(delete_id);
				$("#loding").show();
		
				
			$.ajax({
				url:"event_curd.php",
				type: "POST",
				data: {type:"deletegallerymultiimg",id:delete_id},
				async:false,
				success: function(data){// alert(data);
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
			var event_id=$('#id').val();
			
			$("#loding").show();
			$.ajax({
				url:"event_curd.php",
				type: "POST",
				data: {type:"makemainimage",id:id,event_id:event_id},
				async:false,
				success: function(data){//alert(data);
				$("#loding").hide();
				
				}
			});
			location.reload();
	    }
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