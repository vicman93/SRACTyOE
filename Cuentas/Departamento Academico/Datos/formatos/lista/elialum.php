<?php
$mysqli = new mysqli("localhost","root","","sistema");
if(mysqli_connect_errno()){
	echo 'Conexion Fallida:',mysqli_connect_error();
	exit();
	}
$alumno_actividad=$_GET['alumno_actividad'];
$query="DELETE FROM alumnos_has_actividad WHERE alumno_actividad='$alumno_actividad'";
$result=$mysqli->query($query);
?>

  <?php
if($result>0){ ?>
     <script> 
window.alert("El ESTUDIANTE A SIDO ELIMINADO DE LA LISTA CORRECTAMENTE");
window.location="lista.php";
</script>;
<?php }else{ ?>	
	 <script> 
window.alert("ERROR AL ELIMINAR ESTUDIANTE DE LA LISTA!");
window.location="lista.php";
</script>;
    <?php }?>
