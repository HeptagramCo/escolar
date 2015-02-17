$("#submit-form").click(function(e){
		e.preventDefault();
		var puerto = ":8888", 
			ruta = "http://" + window.location.hostname + puerto,
			name = $(".user_data").val(),
			password = $(".password_data").val();
	
		$.ajax({
	        type: "POST",
	        url: ruta + "/accessstudents/user/",
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
					        url: ruta + "/passvalue/",
					        data: {
					        	password : password
					        },
					        async: true,
					        dataType: 'json',
					    })
					    .done(function(value){
						    for(var i in data){
						    	if(data[i].password_students === value.password){
				        			$.ajax({
								        type: "POST",
								        url: ruta + "/session/",
								        data: {
								        	id : 3,
								        	user : name,
								        	key : data[i].id_students,
								        	group : data[i].id_groups
								        },
								        async: true,
								        dataType: 'html',
								    }).done(function(){
								    	location = "adminstudents";
								    });
				        		}else{
				        			alert("Contraseña incorrecta");
				        		}
				        	}
					    });
		        }
		    });
		    
});