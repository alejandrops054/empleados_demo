
/*=============================================
EDITAR Puestos
=============================================*/
$(".tablas").on("click", ".btnEditarPuesto", function(){

	var idPuesto = $(this).attr("idPuesto");
	
	var datos = new FormData();
	datos.append("idPuesto", idPuesto);

	$.ajax({

		url:"ajax/puestos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
		}

	});

})

/*=============================================
ELIMINAR Puestos
=============================================*/
$(".tablas").on("click", ".btnEliminarPuesto", function(){

  var idPuesto = $(this).attr("idPuesto");
  var nombre = $(this).attr("nombre");

  swal({
    title: '¿Está seguro de borrar el puesto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar la persona!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=puestos&idPuesto="+idPuesto;

    }

  })

})

