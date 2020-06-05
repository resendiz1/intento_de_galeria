if (document.getElementById("uploadImage")!=null) {

//imagen con vista previa en tiempo real desde input file
document.getElementById("uploadImage").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
      let preview = document.getElementById('previa'),
      image = document.createElement('img');
  
      image.src = reader.result;
      image.className="card-img-top";
      preview.innerHTML = '';
      preview.append(image);

    };




	if($("#nombre").val()=="" || $("#carrera").val()=="" || $("#descripcion").val()==""){
		alert("Faltan datos");
	}
	else{
		var nombre = $("#nombre").val();
		var carrera = $("#carrera").val();
		var descripcion = $("#descripcion").val();
		//var imagen = $("#uploadImage").files[0];
		var imagen = document.getElementById("uploadImage").files[0];
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


if (Number(imagenSize)<1000000 &&   tipo=="image/jpeg" || tipo=="image/png" || tipo =="image/bmp"  ) {




		var datos = new FormData();
		datos.append("nombre", nombre);
		datos.append("carrera", carrera);
		datos.append("descripcion", descripcion);
		datos.append("imagen", imagen);

$("#share2").click(function(){

		$.ajax({
			url:"vista/ajax/peticionesAjax.php",
			data:datos,
			method:"POST",
			cache:false,
			processData:false,
			contentType:false,
			beforeSend:function(){
				$("#share2").remove();
				$("#previa").html('<img class"card-img-top" id="status" src="img/load.gif" width="200px">  ');
			},
			success:function(respuesta){
				if(respuesta==""){
					alert("putos todos");
				}
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
					$("#uploadImage").remove();
					$("#share2").remove();
			}

		})
})
	}
}











  }

}

else{
	console.log("Todo bien marica? o que quiere aqui?");

}







