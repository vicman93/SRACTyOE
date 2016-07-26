<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
mysql_select_db("sistema",$conex) or die("ERROR con la base de datos");
 ?>
<?php

if(isset($_POST["register"])){

if(
!empty($_POST['institucion']) && 
!empty($_POST['area']) &&
!empty($_POST['tipoact']) &&
!empty($_POST['nombact']) &&  
!empty($_POST['ponente']) && 
!empty($_POST['totalh']) && 
!empty($_POST['fecha']) &&
!empty($_POST['horae']) && 
!empty($_POST['horas']) &&
!empty($_POST['periodo']) &&
!empty($_POST['iddeptoacad'])  
) {
		
	$institucion=$_POST['institucion'];
	$area=$_POST['area'];
	$tipoact=$_POST['tipoact'];
	$nombact=$_POST['nombact'];
	$ponente=$_POST['ponente'];
	$totalh=$_POST['totalh'];
	$fecha=$_POST['fecha'];
	$horae=$_POST['horae'];
	$horas=$_POST['horas'];
	$periodo=$_POST['periodo'];
	$iddeptoacad=$_POST['iddeptoacad'];
			
	$query=mysql_query("SELECT * FROM actividad WHERE nombact='".$nombact."' and fecha='".$fecha."' " );
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO actividad
(institucion,area, tipoact, nombact, ponente, totalh, fecha, horae, horas, periodo, iddeptoacad) 

VALUES( '$institucion', '$area', '$tipoact', '$nombact', '$ponente' , '$totalh', '$fecha' , '$horae' , '$horas' , '$periodo', '$iddeptoacad')";

	$result=mysql_query($sql);


	if($result){
echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="javascript:history.back();"
</script>';

	} else {
	
	 echo 
	 '<script> 
window.alert("ERROR AL INGRESAR DATOS DE LA INFORMACION!");
window.location="javascript:history.back();"
</script>';
	 
	}

	} else {
	
	 echo '<script> 
window.alert("EL REGISTRO QUE INTENTA REALIZAR YA EXISTE");
window.location="javascript:history.back();"
</script>';
	}

} else {
	
	echo '<script> 
window.alert("TODOS LOS CAMPOS NO DEBEN DE ESTAR VACIOS!");
window.location="javascript:history.back();"
</script>';
}
}
?>
