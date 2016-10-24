$(document).ready(function(){
	   
	 
	 
	 $(window).load(function(){
		 inc = setInterval(function(){
			$('#arrow').effect('bounce',{direction:'left'},'slow');
			
			},1500);
	     $('#arrow').tooltip();
		 $('#imagewrapper img').tooltip({show:{effect:'fadeIn'}});
		 $('#text').show('slide',{direction:'left'},'slow'); 
	
	 });
	 
	$('#arrow').click(function(){
				clearInterval(inc);
				$('#arrow').tooltip({disabled:true});
				$('#bigwrapper').hide("slide",{direction:"left"},3000);
				$('#bigwrapper2').show("slide",{direction:"right"},3000);
				$('#catimg').tooltip({show:{effect:'bounce'}});
	});
	
	$('#bigwrapper2 #formforsignup #buttonsubmit').click(function(){
		 name = $('#name').val();
		 user_name = $('#user_name').val();  
		 email = $('#email').val();
		 password = $('#password').val();
		 conf = $('#con_password').val();
		 if(name == '' || user_name == '' || email == '' || password == '' || conf == '')
		 {
		    $('#feedback').css('color','red').css('font-weight','bold').text('Please Fill All The Fields');
			
       
		 }		 
		 else
		 {
			 if(password == conf)
			 {
					$('#feedback').text('').css('color','Green').css('font-weight','bold').text('Nice Work');
					
						$.post("http://localhost/website/php/Sign_upPage.php",{user_name:user_name,name:name,email:email,password:password},function(data){
							
								$("#feedback").text('').css('color','blue').html(data);
								
							
							}).error(function(){
								$("#feedback").text('').css('color','black').text("something went wrong");
						});
			}
            else
			{
				$('#feedback').text('').css('color','red').css('font-weight','bold').text("password do not match");
			}				
		}
		
	});
	
});

