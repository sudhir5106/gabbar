
	//####################### search form start Here ######################################
	//Search Filter Write HEre
	$(document).on('click','#search',function()
	{
		
			var x;
			$.ajax({
				url:"view_report.php",
				type: "POST",
				data: {type:"searchList",member:$('#member').val()},
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
		
});