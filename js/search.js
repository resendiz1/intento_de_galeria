$("#search").on("keyup", function(){

	var query = $("#search").val();
	var datos = new FormData();

	datos.append("query", query );

	$.ajax({
		url: "vista/ajax/peticionesAjax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend:function(){
			$("#resultado").before('<div class="row justify-content-center text-center"><img src="img/load.gif" width="300px" class="img-fluid" id="loading"></div>');

		},
		success:function(respuesta){
			$("#loading").remove();
			$("#resultado").html(respuesta);
			
		}


	})
})