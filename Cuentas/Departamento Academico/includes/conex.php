
<?php
//Conexion a la base de datos MYSQL
@$con = mysql_connect('localhost','root','');
mysql_select_db("sistema",$con) or die("No se pudo conectar a la base de datos");
?>
