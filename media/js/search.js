$(function(){
	var consulta;
	
	ruta = window.location.href;
	var filtro = $("#by").val();
	
	$('select#by').change(function(){
    	filtro = $(this).val();
    	
	});
	console.log(filtro);
	lugar = window.location.pathname;
	$("#search").focus();
	$("#search").keyup(function(){
		$(".search_values").show();	
		consulta = $("#search").val();
		if(consulta != ""){
			console.log(consulta);
			$.ajax({
				 type: "POST",
		        url: ruta + "/search/",
		        data:{
		        	consulta: consulta,
		        	by: filtro
		        },
		        async: true,
		        dataType: 'json',
			})
			.done(function(data){
				$(".search_values").html("");
					for(val in data){
						if(lugar === "/teachers"){
							teachers(val,data);	
						}
						if(lugar ==="/matter"){
							subjects(val,data);
						}
						if(lugar ==="/groups"){
							groups(val,data);
						}

					}
			}).fail(function(){
				$(".search_values").css("height","auto")
				$(".search_values").html("<h1 class='err_no'>Registro no encontrado</h1>")
			});
		}else{
			$(".search_values").css("height","auto")
			$(".search_values").html("<h1 class='err_no'>Vacio</h1>")
		}
		
	});

$("#search").focusout(function(){
	$(".search_values").hide();
});

});


function teachers(val,data){
	$(".search_values").append(
		"<div class='cont'><div class='data'>"+
		"<h2 class='name'>"+data[val].name_teachers+"</h2>"+
		"<p class='phone'>"+data[val].phone_teachers+"</p>"+
		"</div>"+
		"<div class='action'>"+
		"<a href='/teachers/edit/?id="+data[val].id_teachers+"' class='edit'>Editar</a>"+
		"<a href='/teachers/delete/?id="+data[val].id_teachers+"' class='delete'>Eliminar</a>"+
		"</div></div>"
	);
}

function students(val,data){

}

function tutor(val,data){

}

function groups(val,data){
	$(".search_values").append(
		"<div class='cont'><div class='data'>"+
		"<h2 class='name'>"+data[val].year_section_groups+"</h2>"+
		"<p class='phone'></p>"+
		"</div>"+
		"<div class='action'>"+
		"<a href='/matter/edit/?id="+data[val].id_groups+"' class='edit'>Editar</a>"+
		"<a href='/matter/delete/?id="+data[val].id_groups+"' class='delete'>Eliminar</a>"+
		"</div></div>"
	);
}

function subjects(val,data){
	$(".search_values").append(
		"<div class='cont'><div class='data'>"+
		"<h2 class='name'>"+data[val].name_subject_matter+"</h2>"+
		"<p class='phone'></p>"+
		"</div>"+
		"<div class='action'>"+
		"<a href='/matter/edit/?id="+data[val].id_subject_matter+"' class='edit'>Editar</a>"+
		"<a href='/matter/delete/?id="+data[val].id_subject_matter+"' class='delete'>Eliminar</a>"+
		"</div></div>"
	);
}

function ratings(val,data){

}