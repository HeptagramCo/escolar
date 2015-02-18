$(function(){
	var consulta;
	puerto = window.location.port;
	ruta = "http://" + window.location.hostname + ":" + puerto;
	var filtro = $("#by").val();
	$("#search").focus();
	$("#search").keyup(function(){

		if($("#search").val().length<1){
			$(".table-primary-teachers").show();
		}
		else{
			$(".table-primary-teachers").hide();	
		}
		
		consulta = $("#search").val();
		$.ajax({
			 type: "POST",
	        url: ruta + "/teachers/search/",
	        data:{
	        	consulta: consulta,
	        	by: filtro
	        },
	        async: true,
	        dataType: 'json',
		})
		.done(function(data){
			for(val in data){
				console.log(data[val].name_teachers);
			}
		});

		
	});

	

});