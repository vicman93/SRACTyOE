<?php
$mysqli = new mysqli("localhost","root","","sistema");
if(mysqli_connect_errno()){
	echo 'Conexion Fallida:',mysqli_connect_error();
	exit();
	}

$alumno_actividad=$_GET['alumno_actividad'];
$query="DELETE FROM `alumnos_has_actividad` WHERE alumno_actividad='$alumno_actividad'";
$result=$mysqli->query($query);
?>

  <?php
if($result>0){ ?>
     <script> 
window.alert("LA ACTIVIDAD HA SIDO CANCELADA CORRECTAMENTE");
window.location="../../../Alumnos/menu.php";
</script>;
<?php }else{ ?>	
	 <script> 
window.alert("ERROR AL CANCELAR EVENTO!");
window.location="../../../Alumnos/menu.php";
</script>;
    <?php }?>
    
