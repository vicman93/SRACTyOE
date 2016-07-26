
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro de Jefes de Departamento:</legend>
<form name="j_depto" method="POST" action="Datos/Jefes Academicos/register.php" >
<table width="800" >
  <tr>
    <td width="192" >RFC:<br></td>
   <td width="216">   <input type="text" name="rfc" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
     <td width="192">Nombre Completo:</td>
    <td width="216"><input type="text" name="ncompleto" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
   <tr>
    <td width="192" >Responsable del Registro:<br></td>
   <td width="216">  
        <select name="iddeptoacad" size="0"> 
    
<option value="<?php echo utf8_decode($iddeptoacad) ?>"><?php echo $nombrec?></option>
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
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Actividades </legend>
<form name="actividad" method="POST" action="Datos/Actividades/register.php" >
<table width="800" >
    <tr>
     <td width="192">Institución:</td>
    <td width="216"><input type="text" name="institucion" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="192">Tipo de Actividad:</td>
<td width="216">

<select name="tipoact" style="inline-box-align:initial inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" >
<option> ---------SIN ASIGNAR----------</option>
<option value="TUTORIA"> TUTORIA </option>
<option value="CONFERENCIA"> CONFERENCIA </option>
<option value="TALLER"> TALLER </option>
<option value="ASESORIA ACADEMICA"> ASESORIA ACADEMICA </option>
</select>
</td>
  </tr>
  <tr>
      <td >Nombre de la actividad:</td>
    <td><input type="text" name="nombact" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" ></td>
    <td>Ponente:</td>
<td><input type="text" name="ponente" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
   <tr>
      <td>Duracion del evento:</td>
    <td><input type="number"  min="0" name="totalh"  placeholder="Total de horas"> </td>
 <td>Fecha:</td>
<td><input type="date" name="fecha"></td>
  </tr>
  <tr>
      <td>Hora de Entrada:</td>
    <td><input type="time" name="horae" ></td>
    <td>Hora de Salida:</td>
<td><input type="time" name="horas"></td>
  </tr>
  <tr>
      <td>Periodo de Realización:</td>
    <td><input type="text" name="periodo" placeholder="AÑO INICIO- AÑO FIN" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()" ></td>
 <td>Responsable del Registro de Actividad:</td>
    <td>
    <select name="iddeptoacad" size="0"> 
    
<option value=" <?php echo utf8_decode($iddeptoacad) ?>"><?php echo $nombrec?></option>
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
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Departamento</legend>
<form name="depto" method="POST" action="Datos/Departamento/register.php" >
<table width="800" >
  <tr>
    <td width="192">Nombre del Departamento:</td>
    <td width="216"><input type="text" name="departamento" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="163">Jefe a Cargo:</td>
<td width="198">
  <?php include('select/jefeacad.php') ?>
    
      <select name="idjefeacad" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
     <option >-----------------SIN ASIGNAR--------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['idjefeacad']?>"><?php echo   utf8_decode($pe['ncompleto']) ?></option>
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
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de Carrera</legend>
<form name="carr" method="POST" action="Datos/Carreras/register.php" >
<table width="800">
  <tr>
   
    <td width="167">Nombre de la Carrera:</td>
<td width="192"><input type="text" name="carrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>

 <td width="199">Clave Carrera:</td>
    <td width="222"><input type="text" name="siglascarrera" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
  </tr>
  <tr>
     <td>Departamento al que pertenece:</td>
    <td><?php include('select/departamento.php') ?>
    
      <select name="iddepartamento" size="0" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()"> 
     <option >--------------------SIN ASIGNAR-----------------</option> 
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
<br>
   <section>
<fieldset style="border:2px solid #F60; width:950px">

<legend>Registro de personal de Depto. de Desarrollo Academico</legend>
<form name="deptoacad" method="POST" action="Datos/Departamento Academico/register.php" >
<table width="800" >
 <tr>
    <td width="202">Nombre Completo:</td>
    <td width="219"><input type="text" name="nombrec" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
    <td width="169">Cargo:</td>
<td width="190">
<select name="cargo" style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase"; onkeyup="javascript:this.value=this.value.toUpperCase()">
<option>---------------------SIN ASIGNAR---------------------</option>
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
<td><br><input type="submit" name="register" id="register" class="button" value="Guardar"></td>
<td><br><input type="reset" name="borrar" class="button" value="Borrar" align="left"></td>
<td></td>
</tr>
</table>
</form>

</fieldset> 
</section>
<br>
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro de Jefe(a) de Depto. de Servicios Escolares:</legend>
<form name="j_usuario" method="POST" action="Datos/DeptoServEsc/register.php" >
<table width="800" >
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
<br>
                <section>
  <fieldset style="border:2px solid #F60; width:950px">
<legend>Registro del periodo escolar:</legend>
<form name="periodo" method="POST" action="Datos/Periodo Escolar/register.php" >
<table width="800" >
  <tr>
    <td width="192" >Periodo Escolar:<br></td>
   <td width="216">  
   <select  name="periodo" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>
          <td width="192" >a:<br></td>
   <td width="216">  
   <input type="month" name="periodo" style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();">
   </td>  
     <td width="192">
    
     </td>
    <td width="216">
 
    </td>
  </tr>
   <tr>
    
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
                </div>
                
                <div id="cpestana4">
   ESPACIO PARA MODIFICAR
	              </div>
                  
                   <div id="cpestana5">
        <form>
   ESPACIO PARA ELIMINAR
         </form>        
	              </div>
                  
                <div id="cpestana6">
  <form action="" method="post" >
<center>
        <table width="600" >
  <tr>
    <td>Proporcione su contraseña antigua:</td>
    <td><input type="password" name="passactual" placeholder="<?php echo $password;?>"></td>
  </tr>
  <tr>
    <td>Agregue su contraseña nueva:</td>
    <td><input type="password" name="passnuevo" ></td>
  </tr>
  <tr>
    <td>Verifique nuevamente su contraseña:</td>
    <td><input type="password" name="passconf" ></td>
  </tr>
   <tr align="center">
    <td colspan="2"><input type="button" name="guardar" value="Modificar contraseña" >
      <input type="reset" name="borrar" value="Borrar">    </td>
   </tr>
</table>

</center>
         </form> 
				</div>
                
              </div>
        </div>
    </body>
	
	<?php include("includes/footer.php"); ?>
	

</html>
