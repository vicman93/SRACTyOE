<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_alumnos =$_SESSION['id_alumnos'];
$consulta= "SELECT idalumno,nombre, matricula, appaterno,apmaterno, carreras.carrera, password FROM alumnos inner join carreras on alumnos.idcarrera = carreras.idcarrera WHERE idalumno='$id_alumnos'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$idalumno = $resultado_obtenido['idalumno'];
$nombre = $resultado_obtenido['nombre'];
$matricula = $resultado_obtenido['matricula'];
$appaterno = $resultado_obtenido['appaterno'];
$apmaterno = $resultado_obtenido['apmaterno'];
$carrera = $resultado_obtenido['carrera'];

?>