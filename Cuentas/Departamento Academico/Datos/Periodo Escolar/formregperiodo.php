 <!DOCTYPE>
 <html>
 <head>
 <meta charset="iso-8859-1">
   <link type="text/css" rel="stylesheet" href="../../css/estilo.css" />
 </head>
 <section>
  <fieldset style="border:2px solid #F60; width:550px ">
<legend>Registro del periodo escolar:</legend>
<form name="periodo" method="POST" action="register.php" >
<table width="700"  >
  <tr>
    <td >Periodo Escolar:<br></td>
   <td >  
   <select name="mesi" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
 onkeyup="javascript:this.value=this.value.toUpperCase();">
 <option>Seleccione.. </option>
 <option value="ENERO _">ENERO</option>
 <option value="FEBRERO -">FEBRERO</option>
 <option value="MARZO -">MARZO</option>
 <option value="ABRIL -">ABRIL</option>
 <option value="MAYO -">MAYO</option>
 <option value="JUNIO -">JUNIO</option>
 <option value="JULIO -">JULIO</option>
 <option value="AGOSTO -">AGOSTO</option>
 <option value="SEPTIEMBRE -">SEPTIEMBRE</option>
 <option value="OCTUBRE -">OCTUBRE</option>
 <option value="NOVIEMBRE -">NOVIEMBRE</option>
 <option value="DICIEMBRE -">DICIEMBRE</option>
 </select>
   </td>
     <td  align="center"> a: <br></td>
   <td >  
   <input type="month" name="mesf" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>  
    
    </tr>
   <tr>
    
  <tr>
  <td></td>
<td align="center"><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td align="center"><br><input type="reset" name="borrar" class="button" value="Borrar"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section> 
</html>