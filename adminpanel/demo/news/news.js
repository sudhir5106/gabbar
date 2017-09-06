// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#addform").validate({
	  rules: 
		{ 
			
			heading:
			{
				required:true,
			},
			date: 
			{ 
				required: true,
				//CheckGategory:true,
			},
			desc: 
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
     
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
		
			$('#submit').hide();
		 	$('#loading').show();			
		
			var formdata = new FormData();
			formdata.append('type', "addNews");
			formdata.append('heading', $("#heading").val());
			formdata.append('date', $("#published_date").val());
			formdata.append('desc', $("#desc").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "news_curd.php",
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
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
		
			$('#update').hide();
		    $('#loading').show();			
			var formdata = new FormData();
			formdata.append('type', "editNews");
			formdata.append('heading', $("#heading").val());
			formdata.append('date', $("#published_date").val());
			formdata.append('desc', $("#desc").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "news_curd.php",
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
				url:"news_curd.php",
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
	
	//OnChange Lange GEt Sub Category
	$(document).on('change','#langauge',function()
	{
			var id=$(this).val();
			var x;
			$.ajax({
				url:"subcategory_curd.php",
				type: "POST",
				data: {type:"getCategory",id:id},
				async:false,
				success: function(data){ 
				$('#category').html(data);
				//alert(data);
				}
			});
			
	
	})
});

//Search Filter Write HEre
$(document).on('click','#search',function()
{
	
		var x;
		$.ajax({
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",heading:$('#heading').val(),date:$('#date').val()},
			async:false,
			success: function(data){ 
			$('#add').html(data);
			//alert(data);
			}
		});
			

});
//Onclick Active And Unactive
$(document).on('click','.checkStatus',function()
	{
		
			var id=$(this).attr('value');
			var x;
			$.ajax({
				url:"news_curd.php",
				type: "POST",
				data: {type:"CheckStatus",id:id},
				async:false,
				success: function(data){// alert(data);
					location.reload();
				}
			});
			
	
	})


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