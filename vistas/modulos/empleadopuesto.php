<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Empleado puesto
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Empleado puesto</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarempleadopuesto">
          
           Agregar Empleado puesto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th style="width:10px">#</th>
           <th>Puesto</th>
           <th>persona</th>
         </tr> 

        </thead>
        <tbody>

        <?php

        $item = null;
        $valor = null;

        $empleadopuesto = ControladorEmpleadopuesto::ctrMostrarEmpleadopuesto($item, $valor);

       foreach ($empleadopuesto as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>';
            
            $item1 = "id";
            $valor1 = $value["idPuesto"];
           
            $puestos = ControladorPuesto::ctrMostrarPuesto($item1, $valor1);

            echo'<td>'.$puestos["nombre"].'</td>';

            $item2 = "id";
            $valor2 = $value["idUsuario"];
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item2, $valor2);
   
            echo '
                <td>'.$usuarios["nombre"].'</td>
                <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarempleadopuesto" idempleadopuesto="'.$value["id"].'" data-toggle="modal" data-target="#modalempleadopuesto"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarempleadopuesto" idempleadopuesto="'.$value["id"].'"nombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

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

<div id="modalAgregarempleadopuesto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Empleado</h4>
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
                    <select class="form-control input-lg" id="nuevapuestompleadopuesto" name="nuevapuestompleadopuesto" required>
                        <?php 
                            $item = null;
                            $valor = null;
                             
                            $puestos = ControladorPuesto::ctrMostrarPuesto($item, $valor);

                            foreach($puestos as $key => $value){
                                echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                        ?>
                    </select>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <select class="form-control input-lg" id="nuevausuariompleadopuesto" name="nuevausuariompleadopuesto" required>
                        <?php 
                            $item = null;
                            $valor = null;
                             
                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                            foreach($usuarios as $key => $value){
                                echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                        ?>
                    </select>
              </div>
            </div>

          </div>
        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar empleado puesto</button>
        </div>

        <?php

          $crearEmpleadopuesto = new ControladorEmpleadopuesto();
          $crearEmpleadopuesto -> ctrCrearEmpleadopuesto();

        ?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR PUESTO
======================================-->

<div id="modalEditarempleadopuesto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Empleado puesto</h4>
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
                    <select class="form-control input-lg" id="nuevapuesto" name="nuevapuesto" required>
                        <option id="editarCategoria"></option>
                        <?php 
                            $item = null;
                            $valor = null;
                             
                            $puestos = ControladorPuesto::ctrMostrarPuesto($item, $valor);

                            foreach($puestos as $key => $value){
                                echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                        ?>
                    </select>
              </div>
            </div>

          </div>
        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar empleado puesto</button>
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

