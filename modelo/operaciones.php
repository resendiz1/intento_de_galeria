<?php 
require_once "conexion.php";

class Datos extends Conexion{


	static public function upImageGaleriaModelo($foto, $id, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (foto, idProfesor) VALUES (:foto, :id)");

		$stmt->bindParam(":foto", $foto, PDO::PARAM_LOB);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

	}


	static public function getCarreraModelo($id_profesor, $tabla){

		$stmt=Conexion::conectar()->prepare("SELECT carrera FROM $tabla WHERE idProfe LIKE :id");
		$stmt->bindParam(":id", $id_profesor, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();

	}

	static public function getCardModelo($id, $tabla){

		$stmt=Conexion::conectar()->prepare("SELECT nombre, descripcion, foto FROM $tabla WHERE idProfe LIKE :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}


	static public function getGaleriaModelo($id, $tabla){

			$stmt=Conexion::conectar()->prepare("SELECT idFoto, foto, video FROM $tabla WHERE idProfesor LIKE :id");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
	}





	static public function getTeacherModelo($tabla){

			$stmt=Conexion::conectar()->prepare("SELECT*FROM $tabla ORDER BY idProfe DESC ");
			$stmt->execute();
			return $stmt->fetchAll();
	}



	static public function lastIdModelo($tabla){

		$stmt=Conexion::conectar()->prepare("SELECT idProfe FROM $tabla ORDER BY idProfe DESC LIMIT 1  ");
		$stmt->execute();
		return $stmt->fetch();
	}




	static public function deleteTeacherModelo($datos, $tabla){

		$stmt=Conexion::conectar()->prepare("DELETE FROM  $tabla WHERE llave LIKE :llave");
		$stmt->bindParam(":llave", $datos["clave"], PDO::PARAM_STR);

		if ($stmt->execute()) {
		 return "success";
		}
		else{
			return "error";
		}

	}


	static public function getLlave($id, $tabla){

			$stmt=Conexion::conectar()->prepare("SELECT  llave FROM $tabla WHERE idProfe LIKE :id ");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();

	}



	static public function searchTeacheModelo($query,$tabla){

		$stmt=Conexion::conectar()->prepare("SELECT *FROM  $tabla where nombre LIKE '%$query%' OR carrera LIKE '%$query%'  ");
		$stmt->execute();
		return $stmt->fetchAll();

	}



	static public function upDatosModelo($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( nombre, carrera, descripcion, llave, foto) VALUES (:nombre,:carrera,:descripcion, :llave, :foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":llave", $datos["clave"], PDO::PARAM_STR);
		$stmt->bindParam(":foto",$datos["foto"], PDO::PARAM_LOB);

		if ($stmt->execute()) {
			
			return "success";
		}
		else{
			return "error";
		}


	}




	static public function subirVideoModelo($datos, $tabla){

		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla  (video, idProfesor) VALUES (:ruta, :id) ");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

	}


	static public function getNombreModelo($tabla){

		$stmt=Conexion::conectar()->prepare("SELECT idFoto FROM $tabla ORDER BY idFoto DESC LIMIT 1");

		$stmt->execute();

		return $stmt->fetch();

	}

}

 ?>