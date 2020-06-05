<?php 
class Modelo{


	static public function enlacesModelo($ruta){

		if ($ruta=="init" || $ruta=="profile") {
			$modulo  = "vista/modulos/".$ruta.".php";
		}


		else{
			$modulo = "vista/modulos/init.php";
		}


		return $modulo;


	}
}

 ?>