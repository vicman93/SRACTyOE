<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
mysql_select_db("sistema",$conex) or die("ERROR con la base de datos");
 ?>



	<?php

if(isset($_POST["register"])){

if(
!empty($_POST['mesi']) && 
!empty($_POST['mesf'])
) {
		
	$mesi=$_POST['mesi'];
	$mesf=$_POST['mesf'];
	
$query=mysql_query("SELECT * FROM periodo WHERE mesi='".$mesi."' AND mesf='".$mesf."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO periodo
( mesi, mesf) 
VALUES( '$mesi', '$mesf')";

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

