$(document).ready(function(e) {

	//####################### search form start Here ######################################
	//Search Filter Write HEre
	$(document).on('click','#search',function()
	{
		
			var x;
			$.ajax({
				url:"filter_report.php",
				type: "POST",
				data: {type:"searchList",ip:$('#ip').val(),fromdate:$('#fromdate').val(),todate:$('#todate').val()},
				async:false,
				success: function(data){ 
				$('#add').html(data);
				//alert(data);
				}
			});
				
	
	});
	
	//###################################### Select Pin Transfer #############################
			
	$(document).on('click','#selectall',function(event) {  //on click 
        if(this.checked) { // check select status
            $('.select').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1" 
				             
            });
        }
		else { // check select status
            $('.select').each(function() { //loop through each checkbox
                this.checked = false;  //select all checkboxes with class "checkbox1"               
            });
        }
		
    });
	
	//On click Checked The All THE LIST	
	$(document).on('change',".select",function (event) {
		 
			  if($('#selectall').prop('checked') == true)	{	
	          $('#selectall').attr('checked',false); 	
		  }
        }); 
		//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click','#delete',function(){
			 var i=0;
			 var id = [];	
			 $('.select').each(function(){
		   
			  if($(this).prop('checked') == true)		 
			  {
				  id.push($(this).attr("value"));
				  i++;
			  }
			});
			if(i==0)
			{
				alert("Please Select Any One Option"); 
			 }
			
			if(i!=0)
			{
				 //alert("Are you sure? ")
				 var didConfirm = confirm("Are you sure?");
				 if(didConfirm==true)
				 {	
				 $('#delete').hide();
		 		$('.loading').show();	
			
			var formdata = new FormData();
			formdata.append('type', "delete");
			formdata.append('id',id);
				
			var x;
			$.ajax({
			   type: "POST",
			   url: "tracks_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //$('#submit').html(data);
			// alert(data);
				   x=data;
				   window.location.replace("");
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			/*if(x==1)
			{	
				$('.loading').hide();		
				$( "#dialog_success" ).dialog({
						dialogClass: "alert",
						buttons: {
						 'Ok': function() {
							window.location.replace("co_ordinator_list.php");
							}
						}
					  });
			 }
			 else
			 {	
				$('.loading').hide();
				$('#set').show();		
				$( "#dialog_error" ).dialog({
						dialogClass: "alert",
						open: function () {
									$(this).html(x);
								},
						buttons: {
						 'Ok': function() {
							 $( this ).dialog( "close" );
							}
						}
					  });
			 }*/
				 }
		}// eof if condition
	//}
		
	}); 
		
});