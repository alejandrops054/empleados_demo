<?php

require_once "../controladores/puestos.controlador.php";
require_once "../modelos/puestos.modelo.php";

class AjaxPuesto{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idPuesto;

	public function ajaxEditarPuesto(){

		$item = "id";
		$valor = $this->idPuesto;

		$respuesta = ControladorPuesto::ctrMostrarPuesto($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPuesto"])){

	$editar = new AjaxPuesto();
	$editar -> idPuesto = $_POST["idPuesto"];
	$editar -> ajaxEditarPuesto();

}