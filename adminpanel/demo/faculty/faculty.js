// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#addform").validate({
	  rules: 
		{ 
			fname: 
			{ 
				required: true,
			},
			mname:
			{
				required:true,
			},
			lname: 
			{ 
				required: true,
			},
			father: 
			{ 
				required: true,
			},
			dob: 
			{ 
				required: true,
				
				
			},
			gender:
			{
				required:true,
			},
			school: 
			{ 
				required: true,
			},
			qualification: 
			{ 
				required: true,
				
				
			},
			country: 
			{ 
				required: true,
				
				
			},
			state: 
			{ 
				required: true,
				
				
			},
			mobile: 
			{ 
				required: true,
				minlength:10,
				maxlength:10,
				
			},
			email: 
			{ 
				email: true,
				required:true,
				
			},
			faculty_name :
			{
				required:true,
			
			},
			course_type :
			{
				required:true,
			},
			subject_name :
			{
				required:true,
			
			},
			batch_name:
			{
				required:true,
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
			
			//Check Here Profile Image Uploaded or not
			var image='';
			var imageval='';			
			if($("#profile_image").val().length>0)
				{
					 image=$("#profile_image").prop('files')[0];
					 imageval=1;
				}
			var formdata = new FormData();
			formdata.append('type', "addNew");
			formdata.append('fname', $("#fname").val());
			formdata.append('mname', $("#mname").val());
			formdata.append('lname', $("#lname").val());
			formdata.append('father', $("#father").val());
			formdata.append('dob', $("#dob").val());
			formdata.append('gender', $("#gender").val());
			formdata.append('school', $("#school").val());
			formdata.append('qualification', $("#qualification").val());
			formdata.append('country', $("#country").val());
			formdata.append('state', $("#state").val());
			formdata.append('city', $("#city").val());
			formdata.append('address', $("#address").val());
			formdata.append('mobile', $("#mobile").val());
			formdata.append('telephone', $("#telephone").val());
			formdata.append('email', $("#email").val());
			formdata.append('joindate', $("#joindate").val());
			formdata.append('profile_image', image);
			formdata.append('imageval', imageval);
			var x;
			$.ajax({
			   type: "POST",
			   url: "faculty_curd.php",
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
				$( "#dialog_success" ).dialog({
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
	
    /////////////////////////////////
	// on click of edit button
	/////////////////////////////////		
	$('#update').click(function(){
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
		
			$('#update').hide();
		    $('#loading').show();
			//Check Here Profile Image Uploaded or not
			var image='';
			var imageval='';			
			if($("#profile_image").val().length>0)
				{
					 image=$("#profile_image").prop('files')[0];
					
				}else{
					 imageval=$('#profile_old').val();
					}	
					
			var formdata = new FormData();
			formdata.append('type', "editForm");
			formdata.append('fname', $("#fname").val());
			formdata.append('mname', $("#mname").val());
			formdata.append('lname', $("#lname").val());
			formdata.append('father', $("#father").val());
			formdata.append('dob', $("#dob").val());
			formdata.append('gender', $("#gender").val());
			formdata.append('school', $("#school").val());
			formdata.append('qualification', $("#qualification").val());
			formdata.append('country', $("#country").val());
			formdata.append('state', $("#state").val());
			formdata.append('city', $("#city").val());
			formdata.append('address', $("#address").val());
			formdata.append('mobile', $("#mobile").val());
			formdata.append('telephone', $("#telephone").val());
			formdata.append('email', $("#email").val());
			formdata.append('joindate', $("#joindate").val());
			formdata.append('profile_image', image);
			formdata.append('imageval', imageval);
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "faculty_curd.php",
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
			{	//alert('hii');
				$('#loading').hide();		
				$( "#dialog_success" ).dialog({
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
				$('#update').show();		
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
	// on click of delete button
	//////////////////////////////////
	
	$(document).on('click', '.delete', function() {
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).attr("id");
			var x;
			$.ajax({
				url:"faculty_curd.php",
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
	
		
//On Change Get Here Course Name
$('#course_type').click(function(){

		var formdata = new FormData();
		formdata.append('type', "courseType");
		formdata.append('id', $(this).val());
					
			var x;
			$.ajax({
			   type: "POST",
			   url: "faculty_curd.php",
			   data: formdata,
			   async: false,
			   success: function(data){  //alert(data);
				   x=data;
				   $('#course_name').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false,
			});//eof ajax
			
		
		
	});
});

//Search Filter Write HEre
$(document).on('click','#search',function()
{
	
		var x;
		$.ajax({
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",faculty_name:$('#faculty_name').val(),mobile:$('#mobile').val(),email:$('#email').val()},
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

//get here All State Name based on coutry
$(document).on('change','#country',function()
{
	$('#state').html('<option>please wait..</option>');
		var x;
		$.ajax({
			url:"faculty_curd.php",
			type: "POST",
			data: {type:"getState",id:$('#country').val()},
			async:false,
			success: function(data){ 
			$('#state').html(data);
			//alert(data);
			}
		});
			

});
//get here All City Name based on state
$(document).on('change','#state',function()
{
	
	$('#city').html('<option>please wait..</option>');
	
		var x;
		$.ajax({
			url:"faculty_curd.php",
			type: "POST",
			data: {type:"getCity",id:$('#state').val()},
			async:false,
			success: function(data){ 
			$('#city').html(data);
			//alert(data);
			}
		});
			

});

//***************************************************************************************
//				Faculty Subject Submit Here
//***************************************************************************************


//Get Here Subject Name
$(document).on('change','#course_type',function()
{
	
		var x;
		$.ajax({
			url:"faculty_curd.php",
			type: "POST",
			data: {type:"subjectList",id:$('#course_type').val()},
			async:false,
			success: function(data){ 
			$('#subject_name').html(data);
			//alert(data);
			}
		});
			

}); 

//Get Here Batches Name
$(document).on('change','#course_type',function()
{
	
		var x;
		$.ajax({
			url:"faculty_curd.php",
			type: "POST",
			data: {type:"batchList",id:$('#course_type').val()},
			async:false,
			success: function(data){ 
			$('#batch_name').html(data);
			//alert(data);
			}
		});
			

});

	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click','#subject_submit',function(){
    
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
			$('#subject_submit').hide();
		 	$('#loading').show();
			
			var formdata = new FormData();
			formdata.append('type', "addSubject");
			formdata.append('faculty_name', $("#faculty_name").val());
			formdata.append('course_type', $("#course_type").val());
			formdata.append('subject_name', $("#subject_name").val());
			formdata.append('batch_name', $("#batch_name").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "faculty_curd.php",
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
				$( "#dialog_success" ).dialog({
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
	// on click of submit button
	//////////////////////////////////
	$(document).on('click','#subject_update',function(){
    
		flag=$("#addform").valid();
		
		if (flag==true)
		{	
			$('#subject_update').hide();
		 	$('#loading').show();
			
			var formdata = new FormData();
			formdata.append('type', "editSubject");
			formdata.append('faculty_name', $("#faculty_name").val());
			formdata.append('course_type', $("#course_type").val());
			formdata.append('subject_name', $("#subject_name").val());
			formdata.append('batch_name', $("#batch_name").val());
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "faculty_curd.php",
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
				$( "#dialog_success" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("subject_list.php");
							}
						}
					  });
			 }
			 else
			 {	
				$('#loading').hide();
				$('#subject_update').show();		
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
	// on click of delete button
	//////////////////////////////////
	
	$(document).on('click', '.subject_delete', function() {
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).attr("id");
			var x;
			$.ajax({
				url:"faculty_curd.php",
				type: "POST",
				data: {type:"subjectDelete",id:id},
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
//Search Filter Write HEre
$(document).on('click','#subject_search',function()
{
	
		var x;
		$.ajax({
			url:"subject_filter_report.php",
			type: "POST",
			data: {type:"searchList",faculty_name:$('#faculty_name').val(),course_type:$('#course_type').val(),subject_name:$('#subject_name').val()},
			async:false,
			success: function(data){ 
			$('#add').html(data);
			//alert(data);
			}
		});
			

});
//VAlidation for only numeric data insert
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