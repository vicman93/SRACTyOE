<?php
require('conexion.php');

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$calle=$_POST['calle'];
$n_ext=$_POST['n_ext'];
$n_int=$_POST['n_int'];
$colonia=$_POST['colonia'];
$edad=$_POST['edad'];
$ce=$_POST['ce'];

$query = "UPDATE alumnado SET id='$id', 
nombre='$nombre',
apellido='$apellido',
calle='$calle',
n_ext='$n_ext', 
n_int='$n_int',
colonia='$colonia', 
edad='$edad',
 ce='$ce'
 WHERE id='$id'";

$result = $mysqli->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar usuarios</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<center>

<?php
if($result > 0){ ?>
    <h1>Datos del alumno han sido modificados</h1>
<?php }else{ ?>	
	<h1> Error al modificar informacion</h1>
    <?php }?>
    
    <p> </p>
    <a href="main.php">Volver</a>

</center>
</body>
</html>