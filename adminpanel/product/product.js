// JavaScript Document
$(document).ready(function(){
	
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#addproduct").validate({
		rules: 
		{ 
			categoryId:
			{ 
				required:true
			},
			image: 
			{ 
				required: true,
				extension: "jpg|png|jpeg|gif",
				Size:true
			}
		},
		messages:
		{
			category:
			{
				required:"Please select any category",
			},
			image:
			{
				required:"File must be JPG, GIF or PNG",
			},
		}
	});// eof validation
	
	
//************ ******************* **********
//************* Validation Of Image Size ****
//******************************************** 
$.validator.addMethod('Size',function(val, element)
	{
		if (($("#image").val())!="")
		{
			var url = URL.createObjectURL($("#image").get(0).files[0]);
			var img = new Image;
			img.onload = function() {
			if(img.width>1024 && img.height>768)
			{
				isSuccess=false;				
			}
			else
			{
				isSuccess=true;
			}
		};
		img.src = url;	
		}
		else
		{
			isSuccess=true;
		}
		return isSuccess;
	},'Image Size is greater than 1024x768');
	
	//************ ******************* **********
	//************* Edit Image Validation Of Image Size ****
	//******************************************** 
$.validator.addMethod('Size2',function(val, element)
	{
		if (($("#newimage").val())!="")
		{
			var url = URL.createObjectURL($("#newimage").get(0).files[0]);
			var img = new Image;
			img.onload = function() {
			if(img.width>1024 && img.height>768)
			{
				isSuccess=false;				
			}
			else
			{
				isSuccess=true;
			}
		};
		img.src = url;	
		}
		else
		{
			isSuccess=true;
		}
		return isSuccess;
	},'Image Size is greater than 1024x768');
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
     
		flag=$("#addproduct").valid();
		
		if (flag==true)
		{	
		
			$("#loader").show();
			
			var totalFiles = document.getElementById("image").files.length;
			if(totalFiles<1)
			{
				$('#errmsg').show();
				$('#errmsg').append("image is required");;
				return false;
			}	
			var formdata = new FormData();
			formdata.append('type', "addNew");
			formdata.append('categoryId', $("#categoryId").val());
			
			<!--Multiple Image Get Here-->
			for (var i = 0; i < totalFiles; i++) {
				var file = document.getElementById("image").files[i];
				formdata.append("imageupload[]", file);  //Use [] to add multiple.
			}
			<!--Closed Multiple Image-->
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "product_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   
				   if(x==1)
					{	
						$("#loader").hide('slow');								
						window.location.replace("product-list.php");
					 }//eof if condition
					 else
					 {	
						$("#loader").hide();
								
						$( "#dialog_error" ).dialog({
								dialogClass: "alert",
								buttons: {
								 'Ok': function() {
									 $( this ).dialog( "close" );
									}
								}
							  });
					 }//eof else
				   
				   
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			
		}// eof if condition
		
	});
	
	
	
	/////////////////////////////////////////////
	// execute this function on click of 
	// "selecctall" class checkbox
	/////////////////////////////////////////////
	function selectallids(){
		$('.delete1').each(function() {			
			 this.checked = true;  //select all checkboxes with class "delete1"			
			// checked itms only pushed in array
			checkedCons.push($(this).attr("id"));//put the checked Consignment_Id's in the array
		});
		return checkedCons;
	}
	
	/////////////////////////////////////////////
	// check or uncheck each "delete1" class 
	// on click of "selecctall" class checkbox
	/////////////////////////////////////////////
	var checkedCons = [];
	
	$(document).on('click', '#selecctall', function(event) {//on click 
        if(this.checked) { // check select status
			selectallids();
        }
		else { // check select status
            $('.delete1').each(function() { //loop through each checkbox
                this.checked = false;  //select all checkboxes with class "delete1"
				// remove all values from array
				checkedCons = jQuery.grep(checkedCons, function( a ) {
				  return a == $(this).attr("id");
				});
				
            });
        }
		
    });
	
	////////////////////////////////////////////////////////
	// if uncheck any "delete1" class of checkbox
	// then uncheck the "selecctall" class of checkbox also
	////////////////////////////////////////////////////////
	$(document).on("change",".delete1", function(){		
	  	if($('#selecctall').prop('checked') == true)	{	
		  $('#selecctall').attr('checked',false); 	
	  	}
    });
    
	////////////////////////////////////
	// on click of productDelete button
	////////////////////////////////////
	$(document).on("click","#delete", function(){
		
		var i=0;
		var delete_id = [];	
		
		$('.delete1').each(function(){	       
			if($(this).prop('checked') == true)		 
			{
				delete_id.push($(this).attr("id"));//put the Consignment_Id's in the array
				i++; //to getting how many checkboxes are checked
			}//eof if condition
	    });//eof each function
		
		if(i==0){			
			alert("Please Select Any One Option"); 			 
		}//eof if condition
		
		if(i!=0){			 
			
			var didConfirm = confirm("Are you sure?");
			
	   		if (didConfirm == true) {
			
				var formdata = new FormData();
				formdata.append('type', "delete");
				formdata.append('delete_id', delete_id);				
				
				$.ajax({
					type:"POST",
					url:"product_curd.php",
					data:formdata,
					success: function(data){ //alert(data);
						x = data;
						if(x!=0){
							window.location.href='product-list.php';	
						}
					},			
					cache: false,
					contentType: false,
					processData: false
				});//eof ajax
			
			}//eof if condition
						
		}//eof if condition
		
	})//eof product delete function
	

	////////////////////////////////////
	//Code for Filter
	////////////////////////////////////
	
	$(document).on('click','#search',function()
	{
		
		var x;
		$.ajax({
			url:"product_curd.php",
			type: "POST",
			data: {type:"searchList", categoryId:$('#categoryId').val()},
			success: function(data){ //alert(data);
				$('#add').html(data);
			}
		});//eof ajax			
	
	});
	
});//eof ready function
	
