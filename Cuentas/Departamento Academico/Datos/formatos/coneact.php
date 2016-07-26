<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_actividad =$_SESSION['id_actividad'];
$consulta= "SELECT
alumnos.idalumno,
actividad.idactividad ,
alumnos.matricula ,
alumnos.nombre ,
alumnos.appaterno,
alumnos.apmaterno ,
carreras.carrera ,
actividad.horae ,
actividad.horas ,
actividad.ponente ,
actividad.nombact ,
actividad.fecha 

FROM alumnos INNER JOIN carreras JOIN actividad JOIN alumnos_has_actividad ON alumnos.idcarrera = carreras.idcarrera
            AND actividad.idactividad = alumnos_has_actividad.actividad_idactividad
            AND alumnos_has_actividad.alumnos_idalumno = alumnos.idalumno 
WHERE idactividad='$id_actividad'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$idalumno = $resultado_obtenido['idalumno'];
$idactividad = $resultado_obtenido['idactividad'];
$matricula = $resultado_obtenido['matricula'];
$appaterno = $resultado_obtenido['appaterno'];
$apmaterno = $resultado_obtenido['apmaterno'];
$carrera = $resultado_obtenido['carrera'];
$horae = $resultado_obtenido['horae'];
$horas = $resultado_obtenido['horas'];
$ponente = $resultado_obtenido['ponente'];
$nombact = $resultado_obtenido['nombact'];
$fecha = $resultado_obtenido['fecha'];
?>