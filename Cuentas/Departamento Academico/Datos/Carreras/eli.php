<?php
require('conexion.php');
$id=$_GET['id'];
$query="DELETE FROM `alumnado` WHERE id='$id'";
$result=$mysqli->query($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar usuario</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<center>
  <?php
if($result>0){ ?>
    <h1>Ha eliminado los datos del alumno</h1>
<?php }else{ ?>	
	<h1> Error al eliminar alumno</h1>
    <?php }?>
    
    <p> </p>
    <a href="main.php">Volver</a>
</center>
</body>
</html>