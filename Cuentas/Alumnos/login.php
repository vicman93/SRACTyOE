<?php include("includes/header.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>ITC-SRACTyOE</title>
</head>
<center>
            <table width="1020" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnológico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Educativa</h2></center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>

    </center>
            <center>
    <div class="container mlogin">
            <div id="login">
    <h1><strong>Login</strong></h1>
   <center> <p><b>Alumnos</b></p></center>
<form name="loginform" id="loginform" action="accesousuario.php" method="POST">
    <p>
        <label for="user_login">Matricula:<br />
        <input type="text" name="matricula" id="matricula" class="input" size="20"   style="font-family:'Courier New', Courier, monospace; font-size:14px" /></label>
    </p>
    <p>
        <label for="user_pass">Contraseña:<br />
        <input type="password" name="password" id="password" class="input" size="20"  style="font-family:'Courier New', Courier, monospace; font-size:14px"/></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Entrar" />
    </p>
        <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
</form>

    </div>
<?php include("includes/rinicio.php");
?>
    </div>
	
	<?php include("includes/footer.php"); ?>
	

</center>	
</center>
</html>