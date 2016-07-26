  <!DOCTYPE>
 <html>
 <head>
   <meta charset="iso-8859-1">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
   
 </head>
 <section>
<fieldset style="border:2px solid #F60; width:550px">

<legend>Registro de Carrera</legend>
<form name="carr" method="POST" action="register.php" >
<table width="700">
  <tr>
   
    <td width="117">Nombre de la Carrera:</td>
<td width="289"><input type="text" name="carrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>

 <td width="162">Clave Carrera:</td>
    <td width="212"><input type="text" name="siglascarrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
  <tr>
     <td>Departamento al que pertenece:</td>
    <td><?php include('../../select/departamento.php') ?>
    
      <select name="iddepartamento" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:12px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()"> 
     <option >-------------SIN ASIGNAR------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['iddepartamento']?>"><?php echo $pe['departamento']?></option>
     <?php } ?>
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