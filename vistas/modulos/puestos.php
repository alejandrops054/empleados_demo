<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Puesto
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Puesto</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPuestos">
          
          Agregar Puesto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
         </tr> 

        </thead>
        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorPuesto::ctrMostrarPuesto($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarPuesto" idPuesto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPuesto"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarPuesto" idPuesto="'.$value["id"].'"nombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>
                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PUESTO
======================================-->

<div id="modalAgregarPuestos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Personal</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

          </div>
        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Puesto</button>
        </div>

        <?php

          $crearUsuario = new ControladorPuesto();
          $crearUsuario -> ctrCrearPuesto();

        ?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR PUESTO
======================================-->

<div id="modalEditarPuesto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Personal</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="">
              </div>
            </div>

          </div>
        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Puesto</button>
        </div>

        <?php

          $editarPuesto = new ControladorPuesto();
          $editarPuesto -> ctrEditarPuesto();

        ?> 

      </form>
    </div>
  </div>
</div>

<?php

  $borrarPuesto = new ControladorPuesto();
  $borrarPuesto -> ctrBorrarPuesto();

?> 

