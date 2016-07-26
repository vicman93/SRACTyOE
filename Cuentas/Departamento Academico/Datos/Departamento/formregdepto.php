  <!DOCTYPE>
 <html>
 <head>
   <meta charset="iso-8859-1">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
   </head>
  <section>
<fieldset style="border:2px solid #F60; width:550px">

<legend>Registro de Departamento</legend>
<form name="depto" method="POST" action="register.php" >
<table width="700" >
  <tr>
    <td width="350" >Nombre del Departamento:</td>
    <td ><input type="text" name="departamento" size="60" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
 
 </tr>
 
 <tr>
 
<td align="right"><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>

<td align="center"><br><input type="reset" name="borrar" class="button" value="Borrar"></td>

</tr>
</table>
</form>

</fieldset> 
</section> 
</html>