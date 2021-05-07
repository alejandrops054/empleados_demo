<?php

require_once "conexion.php";

class ModeloEmpleadopuesto{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlIngresarEmpleadopuesto($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	REGISTRO DE Puesto
	=============================================*/

	static public function MdlMostrarEmpleadopuesto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(puesto,persona ) VALUES (:puesto, :persona)");

		$stmt->bindParam(":puesto", $datos["puesto"], PDO::PARAM_INT);
        $stmt->bindParam(":persona", $datos["persona"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
}
