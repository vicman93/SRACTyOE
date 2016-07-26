<?php

$usuario=$_POST['usuario'];
$password=$_POST['password'];

if(isset($usuario)){
	
	$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
	session_start();
	$consulta= "SELECT * FROM deptoacad WHERE usuario='$usuario' AND 
	password='$password'";
$resultado = mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
	
	if (!$fila['iddeptoacad']){
	header("location:login.php");
		}
	else{
	$_SESSION['id_deptoacad'] = $fila['iddeptoacad'];
	$_SESSION['usuario']= $fila['usuario'];
	
	header("Location: menu.php");	
	}
}else{
	header("location:login.php");
	}
?>