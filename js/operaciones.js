 

  $("#quit_instructions").click(function(){
  
    $(".jumbotron").remove();
  })


/*=====  Controlando el alto del recuadro  ======*/

if ($("#recibeImagen").html()==0) {

	$("#recibeImagen").css({ 
			"height":"200px"
	})
}
else{

	$("#recibeImagen").css({

		"height":"auto"
	})
}	



/*=====  Empezando a lee los datos  ======*/

$("#recibeImagen").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();


	$("#recibeImagen").css({
		"background":"url(img/snoopy.png)"
	})
})

/*==========================================
=            Soltando la imagen            =
==========================================*/

$("#recibeImagen").on("drop", function(e){


	e.preventDefault();
	e.stopPropagation();


		$("#recibeImagen").css({
		"background":"green"
	})

	var archivo = e.originalEvent.dataTransfer.files;
	var imagen = archivo[0];
	var imagenSize = imagen.size;
	var tipo = imagen.type;



if (tipo=="image/jpeg"  || tipo=="image/png" || tipo =="image/bmp" ) {
  $("#alert_image").remove();
}
else{
	$("#recibeImagen").before('<div class="alert  alert-danger text-center" id="alert_image">Solo se admiten imagenes</div>  ');
		$("#recibeImagen").css({
		"background":"red"
	})
}



if (Number(imagenSize)>1000000) {
	$("#recibeImagen").before('<div class="alert  alert-danger text-center" id="alert_size"> Solo se admiten imagenes de 1 mb o menos</div>  ');
	$("#recibeImagen").css({
		"background":"red"
	})
}
else{
	$("#alert_size").remove();
}



/*======================================================
=            subiendo la imagen al servidor            =
======================================================*/
if (Number(imagenSize)<1000000 &&   tipo=="image/jpeg" || tipo=="image/png" || tipo =="image/bmp"  ) {


	$("#share").click(function()    {


		var nombre = $("#nombre").val();
		var carrera = $("#carrera").val();
		var descripcion = $("#descripcion").val();

		var datos = new FormData();

		datos.append("imagen", imagen);
		datos.append("nombre", nombre);
		datos.append("carrera", carrera);
		datos.append("descripcion", descripcion);


		$.ajax({

			url: "vista/ajax/peticionesAjax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			beforeSend: function(){

				$("#recibeImagen").before('<img src="img/load.gif" id="status" width="100px">');
			},
			success: function(respuesta){
					

					$("#status").remove();
					$("#recibeImagen").before('<div class="alert  alert-success btn-block text-center">Felicidades creaste el perfil de: '+nombre +' actualiza la página para visualizarlo en la galeria <br> <strong>¡DALE AL F5 <br> NO OLVIDES TU VLAVE!</strong></div> ');
					$("#recibeImagen").before('<input type="text"  class="form-control" value="'+respuesta+'" > ');

					/* Limpiando las cajas de texto */
					$("#nombre").remove(); 
					$("#carrera").remove();
					$("#descripcion").remove();
					$("#recibeImagen").remove();
					$(".remove").remove();
					$("#alert_image").remove();
					$("#alert_size").remove();
			}




		});


	})

}


/*=====  End of subiendo la imagen al servidor  ======*/


})



/*=====  End of Soltando la imagen  ======*/
