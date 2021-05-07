<?php

class ControladorEmpleadopuesto{

	/*=============================================
	REGISTRO DE Puesto
	=============================================*/

	static public function ctrCrearEmpleadopuesto(){

		if(isset($_POST["nuevapuestompleadopuesto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevapuestompleadopuesto"])){
			   
				$tabla = "empleadopuesto";

				$datos = array("puesto" => $_POST["nuevapuestompleadopuesto"],
                               "persona"=> $_POST["nuevausuariompleadopuesto"]);

				$respuesta = ModeloEmpleadopuesto::mdlIngresarEmpleadopuesto($tabla,$datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El empleado puesto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empleadopuesto";

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
						
							window.location = "empleadopuesto";

						}

					});
				

				</script>';

			}


		}


	}

    static public function ctrMostrarEmpleadopuesto($item, $valor){

		$tabla = "empleadopuesto";

		$respuesta = ModeloEmpleadopuesto::MdlMostrarEmpleadopuesto($tabla, $item, $valor);

		return $respuesta;
	}


}
	


