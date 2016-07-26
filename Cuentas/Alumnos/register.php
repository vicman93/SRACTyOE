<?php
@$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
mysql_select_db("sistema",$conex) or die("ERROR con la base de datos");
 ?>
<?php include("includes/header.php"); ?>


	<?php

if(isset($_POST["register"])){

if(

!empty($_POST['matricula']) && 
!empty($_POST['appaterno']) &&
!empty($_POST['apmaterno']) && 
!empty($_POST['nombre']) && 
!empty($_POST['sexo']) && 
!empty($_POST['correo']) &&
!empty($_POST['telefono']) &&
!empty($_POST['password']) && 
!empty($_POST['idcarrera'])) {
		
	$matricula=$_POST['matricula'];
	$appaterno=$_POST['appaterno'];
	$apmaterno=$_POST['apmaterno'];
	$nombre=$_POST['nombre'];
	$sexo=$_POST['sexo'];
	$correo=$_POST['correo'];
    $telefono=$_POST['telefono'];	
	$password=$_POST['password'];
	$idcarrera=$_POST['idcarrera'];
	

		
	$query=mysql_query("SELECT * FROM alumnos WHERE matricula='".$matricula."' or  appaterno='".$appaterno."' and  apmaterno='".$apmaterno."' and  nombre='".$nombre."' or  correo='".$correo."' or  telefono='".$telefono."'  " );
	$numrows=mysql_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO alumnos
( matricula,appaterno,apmaterno,nombre,sexo,correo,telefono, password,idcarrera) 
VALUES('$matricula' ,'$appaterno', '$apmaterno', '$nombre', '$sexo', '$correo', '$telefono', '$password' , '$idcarrera')";

	$result=mysql_query($sql);

	if($result){
	
		
echo '<script> 
window.alert("DATOS INGRESADOS CORRECTAMENTE");
window.location="login.php";
</script>';
	
	} else {
	
	 echo 
	 '<script> 
window.alert("ERROR AL INGRESAR DATOS DE LA INFORMACION!");
window.location="register.php";
</script>';
	 
	}

	} else {
	
	 echo '<script> 
window.alert("EL REGISTRO QUE INTENTA REALIZAR YA EXISTE");
window.location="register.php";
</script>';
	}

} else {
	
	echo '<script> 
window.alert("TODOS LOS CAMPOS NO DEBEN DE ESTAR VACIOS!");
window.location="register.php";
</script>';
}
}
?>

	<center>
            <table width="1020" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnologico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Educativa</h2></center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>

            </center>
<div class="container2 mlogin"  >
			<div  id="login2" >
<center>	<h1><strong>Registro</strong></h1>
	<p>Alumnos</p></center>
<form name="registerform" id="registerform" action="register.php" method="post">
<table width="800" cellspacing="5" cellpadding="2" border="1px solid" bordercolor="#3333FF" align="center">
<center>
  <tr height="50px">
    <td align="center" width="375"> <p>
		<label for="user_login">Nombre(s)<br />
		<input type="text" name="nombre" id="nombre" class="input" size="32"  style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" /></label>
	</p></td>
    <td align="center" colspan="2"><p>
		<label for="user_login">Apellido Paterno<br />
		<input type="text" name="appaterno" id="appaterno" class="input" size="32"  style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" /></label>
	</p></td>
    <td align="center" width="375"><p>
      <label for="user_login">Apellido Materno<br />
        <input type="text" name="apmaterno" id="apmaterno" class="input" size="32"  style="font-family:'Courier New', Courier, monospace; font-size:14px; text-transform:uppercase; "
          onkeyup="javascript:this.value=this.value.toUpperCase();" /></label>
    </p></td>
  </tr>
  <tr height="50px">
    <td align="center" colspan="2"> <p>
      <label for="user_login">Telefono<br />
        <input type="number" name="telefono" id="telefono" class="input" size="32"  style="font-family:'Courier New', Courier, monospace; font-size:14px" /></label>
    </p></td>
    <td align="center" colspan="2">	<p>
      <label for="user_login">Sexo<br />
        <select name="sexo"  id="sexo" class="input"  style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px; width:240px">
          <option>---valor sin asignar-----</option>
          <option value="H">HOMBRE</option>
          <option value="M">MUJER</option>
          </select></label>
    </p></td>
    </tr>
  <tr height="50px">
    <td align="center" colspan="4"><p>
      <label for="user_login">Correo Electrónico<br />
        <input type="email" name="correo" id="correo" class="input"  size="50"  style="font-family:'Courier New', Courier, monospace; font-size:14px"/></label>
    </p></td>
    </tr>
  <tr height="50px">
    <td align="center" ><p>
		<label for="user_pass">Matricula<br />
		<input type="number" name="matricula" id="matricula" class="input" size="32"  style="font-family:'Courier New', Courier, monospace; font-size:14px"/></label>
	</p></td>
    <td align="center" colspan="2"><p>
		<label for="user_pass">Carrera<br />
        <?php include('select/carreras.php') ?>
    
      <select name="idcarrera" size="0" class="input"  style="inline-box-align:initial; font-family:'Courier New', Courier, monospace; font-size:14px">
     <option >--------------SIN ASIGNAR---------------</option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
     <option value="<?php echo $pe['idcarrera']?>"><?php echo $pe['carrera']?></option>
     <?php } ?>
     </select>
       
        </label>
	</p></td>
    <td align="center">	<p>
      <label for="user_pass">Contraseña<br />
        <input type="password" name="password" id="password" class="input" size="22"  style="font-family:'Courier New', Courier, monospace; font-size:14px"/></label>
    </p></td>
  </tr>
  </center>
</table>
<table width="930px" cellspacing="5" cellpadding="2" align="center">
  <tr>
    <td width="280">&nbsp;</td>
    <td><p >
		<input type="submit" name="register" id="register" class="button2" value="Registrar" />
	</p>
	<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p></td>
    <td width="280">&nbsp;</td>
  </tr>
</table>
	</form>
	    
	</div>
    <?php include("includes/rinicio.php");
?>
	</div>
	<?php include("includes/footer.php"); ?>
	