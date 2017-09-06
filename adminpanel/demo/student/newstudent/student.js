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
			mother: 
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
			city:
			{
				required:true,
			
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
			formdata.append('mother', $("#mother").val());
			formdata.append('guardian_name', $("#guardian_name").val());
			formdata.append('dob', $("#dob").val());
			formdata.append('gender', $("#gender").val());
			formdata.append('roll_no', $("#roll_no").val());
			formdata.append('school', $("#school").val());
			formdata.append('qualification', $("#qualification").val());
			formdata.append('country', $("#country").val());
			formdata.append('state', $("#state").val());
			formdata.append('city', $("#city").val());
			formdata.append('address', $("#address").val());
			formdata.append('mobile', $("#mobile").val());
			formdata.append('telephone', $("#telephone").val());
			formdata.append('email', $("#email").val());
			/*formdata.append('joindate', $("#joindate").val());*/
			formdata.append('profile_image', image);
			formdata.append('imageval', imageval);
			var x;
			$.ajax({
			   type: "POST",
			   url: "student_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){  //alert(data);
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
			formdata.append('mother', $("#mother").val());
			formdata.append('guardian_name', $("#guardian_name").val());
			formdata.append('dob', $("#dob").val());
			formdata.append('gender', $("#gender").val());
			formdata.append('roll_no', $("#roll_no").val());
			formdata.append('school', $("#school").val());
			formdata.append('qualification', $("#qualification").val());
			formdata.append('country', $("#country").val());
			formdata.append('state', $("#state").val());
			formdata.append('city', $("#city").val());
			formdata.append('address', $("#address").val());
			formdata.append('mobile', $("#mobile").val());
			formdata.append('telephone', $("#telephone").val());
			formdata.append('email', $("#email").val());
			/*formdata.append('joindate', $("#joindate").val());*/
			formdata.append('profile_image', image);
			formdata.append('imageval', imageval);
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "student_curd.php",
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
				url:"student_curd.php",
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
			   url: "student_curd.php",
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
			data: {type:"searchList",student_name:$('#student_name').val(),mobile:$('#mobile').val(),email:$('#email').val()},
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
			url:"student_curd.php",
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
			url:"student_curd.php",
			type: "POST",
			data: {type:"getCity",id:$('#state').val()},
			async:false,
			success: function(data){ 
			$('#city').html(data);
			//alert(data);
			}
		});
			

});
