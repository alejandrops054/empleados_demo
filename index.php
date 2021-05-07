<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/puestos.controlador.php";
require_once "controladores/empleadopuesto.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/puestos.modelo.php";
require_once "modelos/empleadopuesto.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();