
$(document).ready(function(){
//validation purposes
 $('#Buttonsubmit').click(function(){
	 
		  Email = $('#Email').val();
		  Password = $('#Password').val();
		 if(Email == '' || Password == '')
		 {
			$('#feedback').css('color','red').css('font-weight','bold').html('Please Fill All The Fields');
		
		 }		 
		 else
		 {
			//main work for the ajax part
			$.post('http://localhost/website/php/index.php',{Email:Email,Password:Password},function(data){
				$('#Feedback').text('').css('color','green').html(data);
			});
			
			
		}
    
	}); 

});
	

	

