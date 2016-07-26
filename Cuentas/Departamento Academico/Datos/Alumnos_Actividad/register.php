<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
mysql_select_db("sistema",$conex) or die("ERROR con la base de datos");
 ?>
<?php

if(isset($_POST["register"])){

if(
!empty($_POST['actividad_idactividad']) && 
!empty($_POST['alumnos_idalumno'])  
) {
		
	$actividad_idactividad=$_POST['actividad_idactividad'];
	$alumnos_idalumno=$_POST['alumnos_idalumno'];
	
			
	$query=mysql_query("SELECT * FROM alumnos_has_actividad WHERE actividad_idactividad='".$actividad_idactividad."' and alumnos_idalumno='".$alumnos_idalumno."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO alumnos_has_actividad
(actividad_idactividad, alumnos_idalumno) 
VALUES
('$actividad_idactividad','$alumnos_idalumno')";

	$result=mysql_query($sql);


	if($result){
		
echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="../../../Alumnos/menu.php";
</script>';

	} else {
	
	 echo 
	 '<script> 
window.alert("ERROR AL INGRESAR DATOS DE LA INFORMACION!");
window.location="../../../Alumnos/menu.php";
</script>';
	 
	}

	} else {
	
	 echo '<script> 
window.alert("EL REGISTRO QUE INTENTA REALIZAR YA EXISTE");
window.location="../../../Alumnos/menu.php";
</script>';
	}

} else {
	
	echo '<script> 
window.alert("TODOS LOS CAMPOS NO DEBEN DE ESTAR VACIOS!");
window.location="../../../Alumnos/menu.php";
</script>';
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>