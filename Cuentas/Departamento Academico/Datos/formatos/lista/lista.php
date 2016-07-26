<?php
$mysqli = new mysqli("localhost","root","","sistema");
if(mysqli_connect_errno()){
	echo 'Conexion Fallida:',mysqli_connect_error();
	exit();
	}
    $mysqli->set_charset("utf8");
$idactividad = $_GET["idactividad"];
$query="select actividad.idactividad, actividad.area,  actividad.nombact, actividad.ponente, actividad.fecha, actividad.horae, actividad.horas, actividad.totalh, deptoacad.nombrec 
from actividad inner join deptoacad on actividad.iddeptoacad = deptoacad.iddeptoacad  where idactividad = '$idactividad' ";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Lista de asistencia</title>
</head>
  <style type="text/css">

    #palabra{
         background:#585858; color:#fff;  
            width:600px;
			height:30px;
        }
      #fb{padding:10px;background:gray;width:650px;border-radius:10px 10px 10px 10px;
           }
    </style>
<body bgcolor="#FFFFCC">
<br />
<center>

<table width="900" bgcolor="#FFFFCC" >
  <tr>
    
    <td align="center"><img src="../membrete.png" />
    </td>
  </tr>
  
</table>

<br />
<br />
<div>
<table width="900" border="1" align="center" cellpadding="1">
  <tr>
    <td colspan="2" >
    <b><center>
      <p>NOMBRE DE LA ACTIVIDAD:</p>
      <p><input name="nact" type="text" disabled value="<?php echo $row['nombact'];?>" size="40px" style="text-transform:uppercase; text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600"; onkeyup="javascript:this.value=this.value.toUpperCase()"/></p>
   </center></b></td>
    </tr>
   <tr>
    <td>
    <b><center>
      <p>COORDINACION RESPONSABLE:</p>
      <p><input name="ac2" type="text" disabled value="<?php echo $row['area'];?>" size="40px" style="text-transform:uppercase;text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600" onkeyup="javascript:this.value=this.value.toUpperCase()"/></p>
      </center>
    </b></td>
   <td><b><center>
      <p>NOMBRE DEL ENCARGADO DE COORDINACION:</p>
      <p><input name="nombrec" type="text" disabled value="<?php echo $row['nombrec']?> " size="40px" style="text-transform:uppercase; text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600"; onkeyup="javascript:this.value=this.value.toUpperCase()"/></p>
   </center></b></tr>
  <tr>
     <td><b><center><br>
     <p>RESPONSABLE DEL EVENTO O EXPOSITOR </p>
     <p><input name="ponente" type="text" disabled size="40px" value="<?php echo $row['ponente'];?>" border="1" style="text-transform:uppercase; text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600"; onkeyup="javascript:this.value=this.value.toUpperCase()" /></p>
     </center></b>
     </td>
   <td><b><center>
<table width="440">
  <tr><center>
<td width="190"><center><p>FECHA INICIO: </p>
   <input name="horae" type="text" size="13px" disabled value="<?php echo $row['horae'];?>" style="text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600"/></center></td>
<td width="190"><center><p>FECHA FIN: </p>
   <input name="horas" type="text" size="13px" disabled value="<?php echo $row['horas'];?>" style="text-align:center ; border:0px; background-color:transparent; font-size:16px ;font-weight:600"/></center></td>
<td width="190"><center><p>DURACIÓN: </p>
<input name="totalh" type="text" size="13px" disabled value="<?php echo $row['totalh'].' horas';?>" style="text-align:center; border:0px; background-color:transparent; font-size:16px ;font-weight:600"/></center></td>
 </center> </tr>
</table>
   </center></b></td></tr>
</table>


</div>
    <br />
  <div align="center">
<form method="POST" action="" id="fb" onSubmit="return validarForm(this)">
    <acronym title="Aqui puede ingresar matricula, nombre, apellido paterno o materno del estudiante "> <input type="text" placeholder="Ingresar para buscar" name="palabra" id="palabra" style="text-align:center"></acronym>
     <input type="submit" value="Buscar" name="buscar">
 </form><pre>
 <a href="lista.php" style="position:static">RECARGAR LISTA DE ASISTENCIA</a>
</pre>

</div><br>

<script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; 
     }   
</script>

<?php   
if(@$_POST['buscar']) 
{   
   ?>
<?php
    $buscar = $_POST["palabra"];
 $qu = "SELECT
carreras.carrera,
actividad.idactividad,
alumnos.idalumno,
alumnos.matricula,
alumnos.appaterno,
alumnos.apmaterno,
alumnos.nombre,
alumnos_has_actividad.alumno_actividad
FROM
carreras
INNER JOIN alumnos JOIN alumnos_has_actividad JOIN actividad 
ON alumnos.idcarrera = carreras.idcarrera
AND alumnos_has_actividad.alumnos_idalumno = alumnos.idalumno
AND alumnos_has_actividad.actividad_idactividad = actividad.idactividad
WHERE idactividad = '$idactividad' and matricula like'%$buscar%' or appaterno like '%$buscar%' or apmaterno like'%$buscar%' or nombre like'%$buscar%' or carrera like'%$buscar%'   ";
 $resulto=$mysqli->query($qu);
      while(@$registro=$resulto->fetch_assoc($qu)){?>
<tr>
          
<td class="estilo-tabla" align="center"><?php echo $registro['matricula']?></td>
<td class="estilo-tabla" align="center"><?php echo $registro['nombre']?></td>
 </tr> 
           <?php 
       } 
    ?>
    </table>
    <?php
}  
?>
<div>
<center>

<table width="900" border="4" bordercolor="#3399FF"  bgcolor="#0000FF">
<thead>
 <tr>
   
   <td width="28"><center><b style="font-size:20px">
   No.
   </b></center></td>
   <td width="78"><center>
     <b style="font-size:20px">Matricula</b>
   </center></td>
   <td width="150"><center>
     <b style="font-size:20px">Nombre (s) </b>
   </center></td>
      <td width="150"><center>
     <b style="font-size:20px">Apellido Paterno </b>
   </center></td>
   <td width="150"><center>
     <b style="font-size:20px">Apellido Materno </b>
   </center></td>
   <td width="222"><center>
   <b style="font-size:20px">Carrera</b>
   </center></td>
   <td width="46"><center>
   <b style="font-size:20px">Hora Entrada Registrada</b>
   </center></td>
   <td width="46"><center>
   <b style="font-size:20px"> Hora Salida Registrada</b>
   </center></td>
    <td><center><b style="font-size:20px">Eliminar por inasistencia</b></center></td>
 </tr>
 
<tbody bgcolor="#FF9900">
<?php

$nalumno = 0;
$consulta = "SELECT
carreras.carrera,
actividad.idactividad,
alumnos.idalumno,
alumnos.matricula,
alumnos.appaterno,
alumnos.apmaterno,
alumnos.nombre,
alumnos_has_actividad.alumno_actividad
FROM
carreras
INNER JOIN alumnos JOIN alumnos_has_actividad JOIN actividad 
ON alumnos.idcarrera = carreras.idcarrera
AND alumnos_has_actividad.alumnos_idalumno = alumnos.idalumno
AND alumnos_has_actividad.actividad_idactividad = actividad.idactividad
WHERE idactividad = '$idactividad' ";
$resultado=$mysqli->query($consulta);
while($lista=$resultado->fetch_assoc()){?>
<tr>
<td><center> <?php echo $nalumno = $nalumno + 1; ?> </center></td>
<td><center> <?php echo $lista['matricula'];?></center></td>
<td><center> <?php echo $lista['nombre'];?></center></td>
<td><center> <?php echo $lista['appaterno'];?></center></td>
<td><center> <?php echo $lista['apmaterno'];?></center></td>
<td><center> <?php echo $lista['carrera'];?></center></td>
<form>

<td><center><textarea style="max-height:20px; max-width:70px" name="horasami" id="horaer"></textarea>
<input type="button" name="horer" onclick="<?php echo 'miFuncion()'; ?>" value="Hr. Actual"> </center></td>

<td><center><textarea style="max-height:20px; max-width:70px" name="horasamigo" id="horasr"></textarea>
<input type="button" name="horer" onclick="<?php echo 'miFunc()'; ?>" value="Hr. Actual"> 
 </center></td>    
<script>
        function miFuncion(){
       document.getElementById('horaer').value = ('<?php echo date("h:i:A") ?>');
	}
	function miFunc(){
       document.getElementById('horasr').value = ('<?php echo date("h:i:A") ?>');
	}
   </script>

</form>
<td width="92"><center><button> <a href="elialum.php?alumno_actividad=<?php echo $lista['alumno_actividad'];?>">Eliminar</a></button></center></td>

</tr>
<?php }?>
</tbody>
</table>
</form>
</div>
<br />
<center>
<div>
<form>
<input type="submit" formaction="" value="Guardar">
<input type="submit" formaction="../asistencia_lista.php" value="Exportar a PDF">
<input type="submit" formaction="../../../menu.php" value="Volver al menu"/>
</form>
</div>
</center>
</body>
</html>