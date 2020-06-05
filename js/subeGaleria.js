/*=========================================================
=         Validando el tamaño del contenedor            =
=========================================================*/
if ($("#recibeImagen2").html()==0) {
	$("#recibeImagen2").css({
		"height": "200px"
	})
}
else{
	$("#recibeImagen2").css({
		"height":"auto"
	})
}
/*=====  End Validando el tamaño del contenedor  ======*
/*=====================================================
=            recibe imagen y traba eventos            =
=====================================================*/
$("#recibeImagen2").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#recibeImagen2").css({
		"background":"url(img/flags.png)"
	})
})
/*=====  End of recibe imagen y traba eventos  ======*/
/*============================================
=            Recibiendo la imagen            =
============================================*/
$("#recibeImagen2").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#recibeImagen2").css({
		"background":"green"
	})


var archivo = e.originalEvent.dataTransfer.files;
var imagen = archivo[0];
var imagenSize= imagen.size;
var tipo = imagen.type;


/* VALIDAR LA IMAGEN RECIEN CACHADA */

if (tipo=="image/jpeg"  || tipo=="image/png" || tipo =="image/bmp" || tipo=="image/gif" ) {
  $("#alert_image").remove();

if (Number(imagenSize)>10000000) {

		$("#recibeImagen2").before('<div class="alert  alert-danger text-center" id="alert_size"> Solo se admiten imagenes de 1 mb o menos</div>');
		$("#recibeImagen2").css({
		"background":"red"})
}

else{
	$("#alert_size").remove();
}


if (Number(imagenSize)< 10000000 && tipo=="image/jpeg" || tipo=="image/gif" || tipo=="image/png" || tipo=="image/bmp" ) {
$(".alert").remove();
	$("#shareImg").click(function(){

		var id = $("#idProfe").val();
		var datos = new FormData();

		datos.append("imagen", imagen);
		datos.append("idProfe", id);

		$.ajax({
			url: "vista/ajax/peticionesAjax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData:false,
			beforeSend: function(){
				$("#shareImg").remove();
				$("#recibeImagen2").before('<img src="img/load.gif" id="status"  width="80px">');
			},
			success:function(respuesta){

				$("#recibeImagen2").before('<div class="alert  alert-success text-center">'+respuesta+'</div>');
				$("#shareImg").remove();
				$("#status").remove();
				$("#recibeImagen2").remove();
			}

		});
	})


}


}


//Subiendo el video a la carpeta
else if (tipo == "video/mp4" || tipo=="video/avi" || tipo =="video/mpeg" || tipo =="video/mkv" ){


if (imagenSize>50000000) {
	$("#recibeImagen2").before('<div class="alert alert-danger text-center"  id="alert_size_video">Solo videos de menos de 50MB</div>  ');
		$("#recibeImagen2").css({
		"background":"red"
	})
}

else{

$("#alert_image").remove();
$("#alert_size").remove();
$("#alert_size_video").remove();

$("#shareImg").click(function(){

var id = $("#idProfe").val();
var datos = new FormData();

datos.append("video", imagen);
datos.append("id", id);

$.ajax({
	url:"vista/ajax/peticionesAjax.php",
	data:datos,
	method:"POST",
	processData:false,
	cache:false,
	contentType:false,
	beforeSend:function(){
		$("#shareImg").remove();
		$("#recibeImagen2").before('<img src="img/load.gif" id="load" width="200px" class="card-top-img"> ');
	},

	success:function(respuesta){
		$("#recibeImagen2").before('<div class="alert alert-success text-center">'+respuesta+'</div>   ');
		$("#load").remove();
		$("#recibeImagen2").remove();
		$("#shareImg").remove();
	}
})




})

}

	



}
else{
	$("#recibeImagen2").before('<div class="alert  alert-danger text-center" id="alert_image">Solo se admiten imagenes o videos</div> ');
	$("#recibeImagen2").css({
		"background":"red"
	})
}

})
/*=====  End of Recibiendo la imagen  ======*/



/*=====  Subiendo imagen al servidor  ======*/

