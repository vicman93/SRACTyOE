<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
mysql_select_db("sistema",$conex) or die("ERROR con la base de datos");
 ?>



	<?php

if(isset($_POST["register"])){

if(

!empty($_POST['nombres']) && 
!empty($_POST['apellido_paterno']) &&
!empty($_POST['apellido_materno']) &&  
!empty($_POST['semestre']) && 
!empty($_POST['grupo']) && 
!empty($_POST['matricula']) && 
!empty($_POST['password']) && 
!empty($_POST['idcarrera'])) {
		
	$nombres=$_POST['nombres'];
	$apellido_paterno=$_POST['apellido_paterno'];
	$apellido_materno=$_POST['apellido_materno'];
	$semestre=$_POST['semestre'];
	$grupo=$_POST['grupo'];
	$matricula=$_POST['matricula'];
	$password=$_POST['password'];
	$idcarrera=$_POST['idcarrera'];
	

		
	$query=mysql_query("SELECT * FROM alumnos WHERE matricula='".$matricula."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO alumnos
( nombres,apellido_paterno,apellido_materno,semestre,grupo, matricula,password,idcarrera) 
VALUES( '$nombres','$apellido_paterno', '$apellido_materno', '$semestre', '$grupo' , '$matricula' , '$password' , '$idcarrera')";

	$result=mysql_query($sql);


	if($result){
		
echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="../../menu.php";
</script>';

	} else {
	
	 echo 
	 '<script> 
window.alert("ERROR AL INGRESAR DATOS DE LA INFORMACION!");
window.location="../../menu.php";
</script>';
	 
	}

	} else {
	
	 echo '<script> 
window.alert("EL REGISTRO QUE INTENTA REALIZAR YA EXISTE");
window.location="../../menu.php";
</script>';
	}

} else {
	
	echo '<script> 
window.alert("TODOS LOS CAMPOS NO DEBEN DE ESTAR VACIOS!");
window.location="../../menu.php";
</script>';
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>