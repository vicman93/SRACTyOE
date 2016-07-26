<?php
$servidor ="localhost";
$usuario="root";
$pw="";

$con = mysql_connect($servidor, $usuario,$pw) or die ("No hay conexion");
$db= mysql_select_db("agenda") or die ("No se encontro BD");
?>