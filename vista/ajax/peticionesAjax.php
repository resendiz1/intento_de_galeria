<?php 
 require_once "../../controlador/controlador.php";
  require_once "../../modelo/operaciones.php";

class Ajax{






	public function recibiendoDatos(){
		if (isset($_POST["nombre"]) AND isset($_POST["carrera"]) AND isset($_POST["descripcion"])) {			
			
			$respuesta = MvcControlador::upDatosControlador();
		}
	}



	public function upImageGaleria(){
	if ( isset($_POST["idProfe"])) {
			$respuesta = MvcControlador::upImageGaleriaControlador();
	}				

		}


	public function serachTeacher(){
		if (isset($_POST["query"])) {
			$respuesta=MvcControlador::searchTeacheControlador();
		}
	}


	public function subirVideo(){
		if (isset($_FILES["video"]) && isset($_POST["id"])) {
			
			$respuesta=MvcControlador::subirVideoControlador();
		}
	}



	}














$res = new Ajax();
$res ->recibiendoDatos();
$res ->upImageGaleria();
$res->serachTeacher();
$res -> subirVideo();


 ?>