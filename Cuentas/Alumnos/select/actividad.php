<?php
@$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
 $sentencia = "select * from actividad order by nombact asc ";
	$query = mysql_query($sentencia);
?>