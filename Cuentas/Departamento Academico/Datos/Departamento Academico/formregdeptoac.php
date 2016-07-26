<!DOCTYPE>
 <html>
 <head>
 <meta charset="utf-8">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
 </head>
<section>
<fieldset style="border:2px solid #F60; width:450px">

<legend>Registro de personal de Depto. de Desarrollo Academico</legend>
<form name="deptoacad" method="POST" action="register.php" >
<table width="600" >
 <tr>
    <td >Nombre Completo:</td>
    <td ><input type="text" name="nombrec" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td>Cargo:</td>
<td >
<select name="cargo" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
<option>------------------SIN ASIGNAR--------------------</option>
<option value="JEFE(A) DE DEPARTAMENTO DE DESARROLLO ACADEMICO "> JEFE(A) DE DEPARTAMENTO DE DESARROLLO ACADEMICO </option>
<option value="COORDINADOR INSTITUCIONAL DE TUTORIAS"> 
COORDINADOR INSTITUCIONAL DE TUTORIAS </option>
<option value="COORDINADOR INSTITUCIONAL DE ORIENTACIÓN EDUCATIVA"> COORDINADOR INSTITUCIONAL DE ORIENTACIÓN EDUCATIVA </option>
</select>

</td>
  </tr>
  <tr>
     <td>Nombre de usuario:</td>
    <td><input type="text" name="usuario" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px";></td>
    <td>Password:</td>
<td><input type="password" name="password"></td>
  </tr>
  <tr>
<td></td>
<td align="right"><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar" align="left"></td>

</tr>
</table>
</form>

</fieldset> 
</section>
</html>