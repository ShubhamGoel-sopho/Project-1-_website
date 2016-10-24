$(document).ready(function(){
	    
		
		$(".i").click(function(){
			
			$("#navbarhead").toggle('slide','slow');
		});
		
		
		
	    $('#progressbar').progressbar({max:100,value:0});
		Value = 0;
		$.post("http://localhost/website/php/getprogress.php",{Value:Value},function(data){
			
			$("#progressshow").text(data+" "+"%");
			x = parseInt(data);
			
			$('#progressbar').progressbar({max:100,value:x});
		});

	   $("#articlesection").tabs({disabled:[1,2],active:'0'});
	   $('#button1').button();
	   $("#button2").button({disabled:true});
	   clickcount = 0;
	   $('#button1').click(function(){
		   clickcount++;
		   if(clickcount<3){
			   if(clickcount == 1){
					$("#articlesection").tabs({disabled:[0,2],active:'1'});
					$.post("http://localhost/website/php/getprogress.php",{Value:Value},function(data){
						x = parseInt(data);	
						$("#progressshow").text(data+" "+"%");
						$('#progressbar').progressbar({max:100,value:x});
						x = x+2;
						Value = x;
						$.post("http://localhost/website/php/putprogress.php",{Value:Value},function(data1){
							
							$("#feedback").text(data1);
							
						});
				});
					
			   }
				else if(clickcount == 2)
				{
						$("#articlesection").tabs({disabled:[0,1],active:'2'});
						$.post("http://localhost/website/php/getprogress.php",{Value:Value},function(data){
							x = parseInt(data);	
							$("#progressshow").text(data+" "+"%");
							$('#progressbar').progressbar({max:100,value:x});
							x = x+2;
							Value = x;
							$.post("http://localhost/website/php/putprogress.php",{Value:Value},function(data1){
								
								$("#feedback").text(data1);
								$("#button2").button({disabled:false});
								$("#button1").button({disabled:true});
							});
					});
				}
			}
	   
	   });
	   
	   $("#button2").click(function(){
		  window.location = "http://localhost/website/html/buildingwebsite3.php/" 
		   
	   });
	   
	   
     
		
		
			
	
});
