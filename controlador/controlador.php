<?php 
ob_start();
class MvcControlador
{
	
 public function plantilla(){
	
	include "vista/plantilla.php";

	}

public function enlacesControlador(){
		if (isset($_GET["juimonos_a"])) {
		
		$modulo = $_GET["juimonos_a"];

	
	}




	else{
		$modulo ="index.php";
	}
$ruta = Modelo::enlacesModelo($modulo);
	include $ruta;
}



static public function upDatosControlador(){

			$nombreImagen = $_FILES["imagen"]["name"];
			$imagenTemporal = $_FILES["imagen"]["tmp_name"];
			$foto = fopen($imagenTemporal, 'rb');

			$last_id = Datos::lastIdModelo("profe");

			
			$id = $last_id["idProfe"];

           $encriptar = crypt($id, '$263¿¿$,.$');

			$datos = array('nombre' =>$_POST["nombre"] ,
									'carrera' => $_POST["carrera"],
									'descripcion' => $_POST["descripcion"],
									'foto' => $foto,
									'clave' => $encriptar);


	$respuesta = Datos::upDatosModelo($datos, "profe");


	if ($respuesta=="success") {
		echo  $encriptar;
	}

	else{
		echo  "error";
	}
}




static public function upImageGaleriaControlador(){

		
		$imagenTemporal = $_FILES["imagen"]["tmp_name"];
		$foto = fopen($imagenTemporal, 'rb');

		$id = $_POST["idProfe"];
		$respuesta = Datos::upImageGaleriaModelo($foto, $id, "galeria");

		if ($respuesta=="success") {
			echo"success";
		}
		else{
			echo "error";
		}
		
	}


	public function getCarreraControlador(){

		if (isset($_GET["perfil"])) {
				$id = $_GET["perfil"];

			$respuesta = Datos::getCarreraModelo($id,"profe");
			echo $respuesta["carrera"];
		}
	}



	public function getCardControlador(){
		if (isset($_GET["perfil"])) {
			$id = $_GET["perfil"];
			$respuesta = Datos::getCardModelo($id, "profe");

			echo '
      <img src="data:image/jpg;base64,'.base64_encode($respuesta["foto"]).'" class="card-img-top  w-10" alt="">
      <br>
            <article>
        <p class="h4">
          '.$respuesta["nombre"].'
        </p>
      </article>
      <p>
			'.$respuesta["descripcion"].'
      </p>
';
		}
	}


	public function getGaleriaControlador(){
		if (isset($_GET["perfil"])) {
			$id = $_GET["perfil"];

			$respuesta= Datos::getGaleriaModelo($id, "galeria");

			if ($respuesta==null) {
				echo '
				<div class="card">
  				<img class="card-img-top"  src="img/nada.jpg" alt="Card image cap">
				</div>
				<div class="card">
  				<img class="card-img-top"  src="img/nada.jpg" alt="Card image cap">
				</div>
				<div class="card">
  				<img class="card-img-top"  src="img/nada.jpg" alt="Card image cap">
				</div>
				';
			}

			else{
			foreach ($respuesta as $key => $value) {


if ($value["foto"]==null) {

	echo'
        <div class="card"> 
    <div class="view overlay">
<video src="'.$value["video"].'" class="card-img-top" width="200px" height="100%" controls></video>
                <a data-toggle="modal" data-target="#a'.$value["idFoto"].'">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>

<div class="modal  fade"  id="a' . $value["idFoto"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <video src="'.$value["video"].'" class="card-img-top" width="200px" height="100%"  controls  ></video>
      </div>
    </div>
  </div>
</div>';

	
}
else{
		echo'
        <div class="card"> 
            <div class="view overlay">
                <img src="data:image/jpg;base64,' . base64_encode($value["foto"]) . '" class="card-img-top" style="width=100px;"  alt=""
               >
                <a data-toggle="modal" data-target="#a'.$value["idFoto"].'">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>

<div class="modal  fade"  id="a' . $value["idFoto"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <img src="data:image/jpg;base64,' . base64_encode($value["foto"]) . '" class="card-img-top" width="200px" height="100%"  alt=""
      >

  </div>
</div>';
}

			}
			}


		}
	}


public function getTeacherControlador(){

	$teachers = Datos::getTeacherModelo("profe");
	foreach ($teachers as $key => $value) {
		echo '


   <div class="card">
  <img class="card-img-top" src="data:image/jpg;base64,'.base64_encode($value["foto"]).'" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><a>'.$value["nombre"].'</a></h4>
    <p class="card-text">'.$value["descripcion"].'</p>
      <div class="row">
        <div class="col-lg-6 col-md-12 mt-2"><a href="index.php?juimonos_a=profile&perfil='.$value["idProfe"].'" class="btn btn-primary btn-block"><i class="fa fa-eye"> </i> </a></div>

        <div class="col-lg-6 col-md-12 mt-2"> <a class="btn btn-block btn-danger" data-toggle="modal" data-target="#a'.$value["idProfe"].'"> <strong> <i class="fa fa-eraser"> </i> </strong> </a></div>
               </div>
            </div>
         </div>





    <div class="modal fade right" id="a'.$value["idProfe"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-left" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h4 class="modal-title w-100" id="myModalLabel">NECESITAMOS TU CLAVE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <input type="hidden" name="id" value="'.$value["idProfe"].'"  require>
        <input type="text"  name="clave" class="form-control form-control-lg" require>

      </div>
      <div class="modal-footer">
        <button type="submit" name="destroyer"  class="btn btn-danger btn-block " >Borrar perfil</button>
      </div>
      </form>
    </div>
  </div>
</div>
		';
	}
}


public function deleteTeacheControlador(){
	if (isset($_POST["destroyer"])) {
		$datos = array('id' =>$_POST["id"] ,
								"clave" => $_POST["clave"] );

		$id = $_POST["id"];
	     $res = Datos::getLlave($id, "profe");
	     if ($res["llave"]==$_POST["clave"]) {
		$respuesta = Datos::deleteTeacherModelo($datos, "profe");
		if ($respuesta=="success") {
			header("location:borrado");
		}
		else{
			header("location:index.php?juimonos_a=noBorrado");
		}
		}
	else{
		header("location:index.php?juimonos_a=noClave");
	}
  }
}




static public function searchTeacheControlador(){

		$query = $_POST["query"];

		$buscados= Datos::searchTeacheModelo($query,"profe");

		foreach ($buscados as $key => $value) {
		echo '
   <div class="card">
  <img class="card-img-top" src="data:image/jpg;base64,'.base64_encode($value["foto"]).'" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><a>'.$value["nombre"].'</a></h4>
    <p class="card-text">'.$value["descripcion"].'</p>
      <div class="row">
        <div class="col-lg-6 col-md-12 mt-2"><a href="index.php?juimonos_a=profile&perfil='.$value["idProfe"].'" class="btn btn-primary btn-block"><i class="fa fa-eye"> </i> </a></div>

        <div class="col-lg-6 col-md-12 mt-2"> <a class="btn btn-block btn-danger" data-toggle="modal" data-target="#a'.$value["idProfe"].'"> <strong> <i class="fa fa-eraser"> </i> </strong> </a></div>
               </div>
            </div>
         </div>


    <div class="modal fade right" id="a'.$value["idProfe"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-left" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h4 class="modal-title w-100" id="myModalLabel">NECESITAMOS TU CLAVE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <input type="hidden" name="id" value="'.$value["idProfe"].'"  require>
        <input type="text"  name="clave" class="form-control form-control-lg" require>

      </div>
      <div class="modal-footer">
        <button type="submit" name="destroyer"  class="btn btn-danger btn-block " >Borrar perfil</button>
      </div>
      </form>
    </div>
  </div>
</div>
		';
		}



	}




static public function subirVideoControlador(){

	//$videoName = $_FILES["video"]["name"];
	$videoFile=$_FILES["video"]["tmp_name"];


//Consulto el ultimo ID de la tabla GALERIA  para ponerlo como nombre al video subido y no haga conflicto con nombres parecidos
	$nombre = Datos::getNombreModelo("galeria");

//Uso los ../../ para que guarde, de lo contrario no sube el archivo
	$ruta = "../../img/uploadVideo/".$nombre["idFoto"].".mp4";

	if(move_uploaded_file($videoFile, $ruta)){

//Le quito los primeros 6 caracteres para poder limpiar la ruta
	$newRuta=	substr($ruta,  6 );

		$datos = array('id' => $_POST["id"],
								"ruta" => $newRuta );



	$respuesta = Datos::subirVideoModelo($datos, "galeria");

	if ($respuesta=="success") {
		
		echo "Subido";
	}
	else{
		echo "no subido :(";
	}



	}



	else{
		echo "error al subir el video";
	}

	
}




}


 ?>