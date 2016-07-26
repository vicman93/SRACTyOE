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
   <meta charset="utf-8">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
   </head>
 <section>
<fieldset style="border:2px solid #F60; width:550px">

<legend>Registro de Actividades </legend>
<form name="actividad" method="POST" action="register.php" >
<table width="750" >
    <tr>
     <td width="192">Institución:</td>
    <td width="216"><input type="text" name="institucion" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td>Areá que imparte la actividad: </td>
<td >
<select name="area" style="inline-box-align:initial inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
<option> ------SIN ASIGNAR------</option>
<option value="TUTORIAS"> TUTORIAS </option>
<option value="ORIENTACION EDUCATIVA"> ORIENTACIÓN EDUCATIVA </option>

</select>

</td>
  </tr>
  <tr>
      <td width="192">Tipo de Actividad:</td>
    <td width="216"><select name="tipoact" style="inline-box-align:initial inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
<option> ----SIN ASIGNAR-----</option>
<option value="TUTORIA"> TUTORIA </option>
<option value="CONFERENCIA"> CONFERENCIA </option>
<option value="TALLER"> TALLER </option>
<option value="ASESORIA ACADEMICA"> ASESORIA ACADEMICA </option>
</select></td>
    <td>Nombre de la actividad:</td>
<td><input type="text" name="nombact" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
  </tr>
   <tr>
      <td>Ponente:</td>
    <td><input type="text" name="ponente" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"> </td>
 <td>Fecha:</td>
    <td><input type="date" name="fecha"></td>
  </tr>
  <tr>
      
    <td>Hora de Entrada:</td>
<td><input type="time" id="inicio" name="horae" value="" /></td>
<td>Hora de Salida:</td>
    <td><input type="time" id="fin" name="
    horas" value="" />
    </td>
  </tr>
  <tr>
    <td>Duracion del evento:</td>
<td>
<input type="button" onClick="restarHoras();" value="Restar horas" />
<input type="text" id="resta" value="" disabled size="9px"/>

</td>
<script> 
 
function restarHoras() { 
 
  inicio = document.getElementById("inicio").value; 
  fin = document.getElementById("fin").value; 
   
  inicioMinutos = parseInt(inicio.substr(3,2)); 
  inicioHoras = parseInt(inicio.substr(0,2)); 
   
  finMinutos = parseInt(fin.substr(3,2)); 
  finHoras = parseInt(fin.substr(0,2)); 
 
  transcurridoMinutos = finMinutos - inicioMinutos; 
  transcurridoHoras = finHoras - inicioHoras; 
   
  if (transcurridoMinutos < 0) { 
    transcurridoHoras--; 
    transcurridoMinutos = 60 + transcurridoMinutos; 
  } 
   
  horas = transcurridoHoras.toString(); 
  minutos = transcurridoMinutos.toString(); 
   
  if (horas.length < 2) { 
    horas = "0"+horas; 
  } 
   
  if (horas.length < 2) { 
    horas = "0"+horas; 
  } 
   
  document.getElementById("resta").value = horas+":"+minutos; 
 
} 
    </script>
 <td>Periodo de Realización:</td>
    <td>
    <input type="text" name="periodo" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onKeyUp="javascript:this.value=this.value.toUpperCase()" >
    </td>
 
  </tr>
    <tr>
      <td>Responsable del Registro de Actividad:</td>
    <td>
     <select name="iddeptoacad" size="0"> 
 <option value=" <?php echo utf8_decode($iddeptoacad) ?>"><?php echo $nombrec?></option>
</select>
    </td>
 <td></td>
    <td> </td>
 
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