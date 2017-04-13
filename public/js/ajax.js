function getMessage(id){
	
            $.ajax({
               type:'GET',
               url:'/leido',
               data: "id="+id,
               success:function(data){
               	  if(data.success)		
                  	console.log("Leido con Éxito");
                  else
                  	console.log("ERROR");
               }
            });
            console.log("Leido con Éxito");
         }
