<?php
require('conexion.php');

$id=$_GET['id'];
$query = "SELECT id,nombre, apellido, calle, n_ext, n_int,colonia,edad,ce  FROM alumnado WHERE id='$id'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guardar Datos del estudiante </title>
<link rel="stylesheet" type="text/css" href="main.css">
 </head>
 
<body>
<fieldset>
<legend> <Modificar datos</legend>

<form name"modu" method="post" action="mod_u.php">
<input type="hidden" name="id" value="<?php echo $row['id'];?>"/><br>

<table>
<tr>
<td>
Nombre:<input type="text" name="nombre" placeholder="Nombre(s)"  value="<?php echo $row['nombre'];?>"/><br>
Apellido:<input type="text" name="apellido" placeholder="Apellido(s)"  value="<?php echo $row['apellido'];?>"/><br>
</td>
</tr>
</table>
<table>
<tr>
<td><br>Direccion:<br>
Calle:<input type="text" name="calle" placeholder="Calle"  value="<?php echo $row['calle'];?>"/><br>
Numero Exterior:<input type="text" name="n_ext" placeholder="Número Exterior" value="<?php echo $row['n_ext'];?>"/><br>
Numero Interior:<input type="text" name="n_int" placeholder="Número Interior o s/n" value="<?php echo $row['n_int'];?>"/><br>
Colonia:<input type="text" name="colonia" placeholder="Colonia"  value="<?php echo $row['colonia'];?>"/><br>
</td>
</tr>
</table>

<tr>
<td><br>Informacion:<br></td>
<td>
Edad:<input type="number" name="edad" min="0" step="1" placeholder="Tu edad" value="<?php echo $row['edad'];?>"/><br>
Correo electronico:<input type="email" name="ce" placeholder="ejemplo@email.com" value="<?php echo $row['ce'];?>"/><br>
</td>
</tr>

<input type="submit" name="enviar" value="Guardar">
</table>
</form>
</fieldset>
<aside>
	<img src="untitled.png">
</aside>

</body>
</html>
