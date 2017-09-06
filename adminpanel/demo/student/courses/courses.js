// JavaScript Document
$(document).ready(function(){
		$('#loading').hide();
 
	//////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
    $("#addform").validate({
	  rules: 
		{ 
			student_name:
			{
				required: true,
			},
			enrolled_for: 
			{ 
				required: true,
			},
			course_name:
			{
				required:true,
			}
			
		},
		messages:
		{
		}
	});// eof validation
	
//***************************************************************************************
//				Student Subject Submit Here
//***************************************************************************************


//Get Here Subject Name
$(document).on('change','.course_name',function()
{
		var id=$(this).closest('tr').find('.subject_name');
		var x;
		$.ajax({
			url:"courses_curd.php",
			type: "POST",
			data: {type:"subjectList",id:$(this).val()},
			async:false,
			success: function(data){ 
			id.html(data);
			//alert(x);
			}
		});
			

}); 

//Get Here Batches Name
$(document).on('change','.course_name',function()
{
		var id=$(this).closest('tr').find('.batch_name');
		var x;
		$.ajax({
			url:"courses_curd.php",
			type: "POST",
			data: {type:"batchList",id:$(this).val()},
			async:false,
			success: function(data){ 
			id.html(data);
			//$('.batch_name').html(data);
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
		
			
			var i=0;
			//For enrolled_for
			var enrolled = [];
			$('.enrolled_for').each(function(index, element) {
              
				  enrolled.push($(this).val());
				  i++;
				 
            });
			
			//For Course Name
			var j=0;
			var course = [];
			$('.course_name').each(function(index, element) {
               
				  course.push($(this).val());
				  j++;
				 
            });
			//For Subject Name
			var k=0;
			var subject = [];
			$('.subject_name').each(function(index, element) {
             
				  subject.push($(this).val());
				  k++;
				  
            });
			//For Batches Name
			var l=0;
			var batch = [];
			$('.batch_name').each(function(index, element) {
               
				  batch.push($(this).val());
				  l++;
				  
            });
			//For Start Date
			var m=0;
			var sdate = [];
			$('.start_date').each(function(index, element) {
               if($(this).val()!= '')		 
				  {
				  sdate.push($(this).val());
				  m++;
				  }
            });
			
		
		
			$('#subject_submit').hide();
		 	$('#loading').show();
			
			var formdata = new FormData();
			formdata.append('type', "addSubject");
			formdata.append('student_name', $('#student_name').val());
			formdata.append('course_name', course);
			formdata.append('enrolled_for', enrolled);
			formdata.append('subject_name', subject);
			formdata.append('batch_name',batch);
			formdata.append('start_date', sdate); 
			var x;
			$.ajax({
			   type: "POST",
			   url: "courses_curd.php",
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
				$('#subject_submit').show();		
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
			formdata.append('student_name', $('#student_name').val());
			formdata.append('course_name', $(".course_name").val());
			formdata.append('enrolled_for', $(".enrolled_for").val());
			formdata.append('subject_name', $(".subject_name").val());
			formdata.append('batch_name',$(".batch_name").val());
			formdata.append('start_date', $(".start_date").val()); 
			formdata.append('id', $("#id").val());
			var x;
			$.ajax({
			   type: "POST",
			   url: "courses_curd.php",
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
	
	$(document).on('click', '.delete', function() {
		
		var didConfirm = confirm("Are you sure?");
	   	if (didConfirm == true) {
			var id=$(this).attr("id");
			var x;
			$.ajax({
				url:"courses_curd.php",
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
			url:"filter_report.php",
			type: "POST",
			data: {type:"searchList",enrolled_for:$('#enrolled_for').val(),student_name:$('#student_name').val()},
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
});