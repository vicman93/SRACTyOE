<?php
$host = "localhost";
$usuario = "root";
$contraseña= "";

@$con = mysql_connect($host,$usuario,$contraseña);
$db = mysql_select_db("sistema");

?>