<?php
$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_deptoacad =$_SESSION['id_deptoacad'];
$consulta= "SELECT iddeptoacad, nombrec,cargo, password FROM deptoacad WHERE iddeptoacad='$id_deptoacad'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$iddeptoacad = $resultado_obtenido['iddeptoacad'];
$nombrec = $resultado_obtenido['nombrec'];
$cargo = $resultado_obtenido['cargo'];
$password = $resultado_obtenido['password'];

?>
<!DOCTYPE>
 <html>
 <head>
 <meta charset="iso-8859-1">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
 </head>
<section>
  <fieldset style="border:2px solid #F60; width:550px">
<legend>Registro de Jefe(a) de Depto. de Servicios Escolares:</legend>
<form name="jse" method="POST" action="register.php" >
<table width="700" >
  <tr>
    <td width="192" >Nombre Completo:<br></td>
   <td width="216">  
   <input type="text" name="nombcompleto" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>
          
     <td width="192">
     Responsable del Registro:
     </td>
    <td width="216">
    <select name="iddeptoacad" size="0"> 
    
<option value="<?php echo $iddeptoacad ?>"><?php echo $nombrec?></option>
          </select>
    </td>
  </tr>
      
  <tr>
  <td></td>
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
</html>