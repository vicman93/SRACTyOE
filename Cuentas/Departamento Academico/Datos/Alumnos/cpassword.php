<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_alumnos =$_SESSION['id_alumnos'];
$consulta= "SELECT idalumno,  password FROM alumnos  WHERE idalumno='$id_alumnos'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$idalumno = $resultado_obtenido['idalumno'];
$password = $resultado_obtenido['password'];
?>

<?php
$ca=$_POST['ca'];
$cn=$_POST['cn'];
$cv=$_POST['cv'];

if($ca = $password){
		
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

	
?>
