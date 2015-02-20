$("#submit-form").click(function(e){
		e.preventDefault();
		var puerto = ":8888", 
			ruta = "http://" + window.location.hostname + puerto,
			name = $(".user_data").val(),
			password = $(".password_data").val();
	
		$.ajax({
	        type: "POST",
	        url: ruta + "/login/user/",
	        data:{
	        	name : name
	        },
	        async: true,
	        dataType: 'json',
	    })
		    .done(function(data){
		    	if(data === null){
		    		alert("Usuario Incorrecto")
		    	}else{
		        	$.ajax({
					        type: "POST",
					        url: ruta + "/passValue/",
					        data: {
					        	password : password
					        },
					        async: true,
					        dataType: 'json',
					    })
					    .done(function(value){
						    for(var i in data){
						    	if(data[i].password_user === value.password){
				        			$.ajax({
								        type: "POST",
								        url: ruta + "/session/",
								        data: {
								        	id : data[i].type_user,
								        	user : name
								        },
								        async: true,
								        dataType: 'html',
								    }).done(function(){
								    	location = "admin";
								    });
				        		}else{
				        			alert("Contraseña incorrecta");
				        		}
				        	}
					    });
		        }
		    });
		    
});
