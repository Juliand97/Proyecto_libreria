<?php
/*Trae permisos*/
require_once '../Modelo/permisos/Permisos.php';
$log= new  Permisos;
$permisos=$log->permisos();
 ?>