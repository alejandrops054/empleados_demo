<?php

class ControladorPuesto{

	/*=============================================
	REGISTRO DE Puesto
	=============================================*/

	static public function ctrCrearPuesto(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){
			   
				$tabla = "puestos";

				$datos = array("nombre" => $_POST["nuevoNombre"]);

				$respuesta = ModeloPuesto::mdlIngresarPuesto($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El puesto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "puestos";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El puesto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "puestos";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR Puesto
	=============================================*/

	static public function ctrMostrarPuesto($item, $valor){

		$tabla = "puestos";

		$respuesta = ModeloPuesto::MdlMostrarPuesto($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR Puesto
	=============================================*/

	static public function ctrEditarPuesto(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "puestos";

				$datos = array("nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloPuesto::mdlEditarPuesto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El puesto ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "puestos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "El puesto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "puestos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarPuesto(){

		if(isset($_GET["idPuesto"])){

			$tabla ="puestos";
			$datos = $_GET["idPuesto"];


			$respuesta = ModeloPuesto::mdlBorrarPuesto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El puesto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "puestos";

								}
							})

				</script>';

			}		

		}

	}


}
	


