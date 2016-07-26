<?php

$matricula=$_POST['matricula'];
$password=$_POST['password'];

if(isset($matricula)){
	
	@$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
	session_start();
	$consulta= "SELECT * FROM alumnos WHERE matricula='$matricula' AND 
	password='$password'";
$resultado = mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
	
	if (!$fila['idalumno']){
	header("location:login.php");
		}
	else{
	$_SESSION['id_alumnos'] = $fila['idalumno'];
	$_SESSION['nombre']= $fila['nombre'];
	
	header("Location: menu.php");	
	}
}else{
	header("location:login.php");
	}
?>