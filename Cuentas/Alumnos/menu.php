<?php
@$conex = mysql_connect("localhost","root","") or die ("No se pudo realizar la conexion");
	mysql_select_db("sistema",$conex)
	or die("ERROR con la base de datos");
	mysql_query("SET NAMES 'utf8'");
session_start();

if(!$_SESSION){
	header("location:login.php");
}
$id_alumnos =$_SESSION['id_alumnos'];
$consulta= "SELECT idalumno,nombre, matricula, appaterno,apmaterno, carreras.carrera, password FROM alumnos inner join carreras on alumnos.idcarrera = carreras.idcarrera WHERE idalumno='$id_alumnos'";
$resultado=mysql_query($consulta,$conex) or die (mysql_error());
$resultado_obtenido= mysql_fetch_array($resultado);
$idalumno = $resultado_obtenido['idalumno'];
$nombre = $resultado_obtenido['nombre'];
$matricula = $resultado_obtenido['matricula'];
$appaterno = $resultado_obtenido['appaterno'];
$apmaterno = $resultado_obtenido['apmaterno'];
$carrera = $resultado_obtenido['carrera'];
$password = $resultado_obtenido['password'];
?>
<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script type="text/javascript" src="js/cambiarPestanna.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
 	 <div class="contenedor">
            <div>
            <center>
            <table width="1060" >
  <tr>
    <td width="30"><img src="imagenes/logoITC.png"  ></td>
    <td width="878"><center><h1>Instituto Tecnologico de Campeche</h1>    <h2>Sistema de Registro de Actividades Complementarias de Tutorias y Orientación Educativa</h2>
    <h3><?php echo date("h:i:A d:M:Y"); ?></h3>
    </center>
    </td>
    <td width="30" align="right"><img src="imagenes/logo-tec.png" ></td>
  </tr>
</table>

            </center>
			<center><h2>Bienvenido</h2>
      <table width="1080" align="center">
  <tr align="center">
  </tr>
  <tr>
  <?php
include ('includes/conex.php');
?>
 <?php
            $consulta = mysql_query("SELECT sum(totalh) as conteo FROM kardex where idalumno='$id_alumnos ' ");
            
            $reg = mysql_fetch_array($consulta, MYSQL_ASSOC);
                      
?>
  <script>
var barra_progreso = document.getElementById('barra_progreso');
var actualizar_progreso = function(valor) {
 barra_progreso.value = valor;
 barra_progreso.getElementsByClassName('span');
}    
	</script> 
<td width="200"> 
 <span><?php echo $reg['conteo'] .'  horas' ?></span><br>

<progress id="barra_progreso" max='20' value='<?php echo $reg["conteo"] ?>' >
</progress>

</td> 
    <td align="center" width="600">
<h2><span><strong><?php echo $matricula;?> </strong></span></h2>
 <h2><span><strong>
 <?php echo $nombre;?> 
 <?php echo $appaterno;?>
 <?php echo $apmaterno;?> </strong></span></h2>  
<h2><span><strong><?php echo $carrera;?> </strong></span></h2>
    </td>
    <td width="210" align="center"><strong><p ><a href="logout.php">Cerrar Sesión</a> </p></strong>   
</td>
  </tr>
</table>
      
    </center> 
			   
			</div>
  <div id="pestanas">
 <ul id=lista>
  <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>
  <acronym title="
Aqui puedes realizar la siguiente:

● Realizar Ingreso a Actividad 
● Consulta de actividades por hora y fecha 
">Actividades</acronym></a></li>
  <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>
  <acronym title="
Aqui puedes realizar la siguiente:

● Consulta de Actividades Realizadas 
● Imprimir Kardex de Actividades Realizadas 
">Kardex de Actividades</acronym></a></li>
  <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>
<acronym title="
  Aqui puedes realizar la siguiente:

● Visualizar contraseña 
● Cambiar contraseña                 
                   "> Cambiar Contraseña </acronym></a></li>
                    
 </ul>
  </div>
            
<body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">

    <fieldset style="border:2px solid #F60; width:950px">
    <legend>Realizar Solicitud </legend>
    <section align="center"  > 
<form name="aluact" method="POST" action="../Departamento Academico/Datos/Alumnos_Actividad/register.php">

<table width="250" align="center">
<center>
  <tr>
    <td colspan="2" align="center">
   
           <?php include('select/actividad.php') ?>
     <select name="actividad_idactividad">
     <option >
  Seleccione la actividad a asistir..............
     </option> 
    <?php while ($pe = mysql_fetch_array($query)){ ?>
    
<option value="<?php echo $pe['idactividad']?>">
	 <?php echo $pe['nombact']?>
</option>
     <?php } ?>
     </select> 
    </td>
    </tr>
  <tr>
    <td colspan="2" align="center">
    
 <select name="alumnos_idalumno" size="0" > 
    
<option value="<?php echo $idalumno ?>">  
 <?php echo $appaterno;?>
 <?php echo $apmaterno;?>
 <?php echo $nombre;?>
 </option>
 </select>
 </td></tr></center>
    
    
  <tr>
    <td align="right">
    
    <input type="submit" name="register" id="register" 
    style="background-color:#FF0" width="100" height="80" value="Guardar">
   
    </td>
    <td align="left">
   
    <input type="reset" name="borrar"   value="Borrar" style="background-color:#FF0" width="100" height="80">
    
    </td>
  </tr>
</table>

</form>
     </section>
   </fieldset>
   
   <fieldset style="border:2px solid #F60; width:950px">
    <legend>Consulta de Actividades </legend>
  <section align="center">
      
       <script>
	function mostrardatos(){
		var lista=$("#actividad").val();
		$.ajax({
			url: "cargardatos.php",
			data:{idactividad:lista},
			type:"POST",
			success:function(data){
				$("#instituto").html(data);
				}
			})
		}
	</script>
    <form method="post">
     Actividad: 
  <select name="consulta" id="consulta" onChange="mostrardatos()">
     <option>Seleccionar actividad </option>
     <?php 
	 $resuelto= include('select/actividad.php') ;
	 while ($act = mysql_fetch_array($query)){?>
	<option value=" <?php echo $act['idactividad'] ?>"><?php echo $act['nombact'] ?></option>	 
	<?php	 };
	 ?>
     </select>
     Institucion:
     <select name="instituto" id="instituto">
     </select>
    </form>
   
  </section>
        </fieldset>      
				</div>
    
                <div id="cpestana2">
                   <form>
  <center>
<table border="4" rules="all" >
<thead>
 <tr>
   <td><b><center>Areá Comisionada</center></b></td>
   <td><b><center>Representante del Areá</center></b></td>
   <td><b><center>Tipo de Actividad</center></b></td>
   <td><b><center>Nombre de la Actividad</center></b></td>
   <td><b><center>Ponente</center></b></td>
   <td><b><center>Fecha realizada</center></b></td>
   <td><b><center>Horas asignadas</center></b></td>
    <td><b><center>Cancelar Evento</center></b></td>
 </tr>

<tr>
<?php
include ('includes/conex.php');
?>
<?php
$consulta_mysql="select alumno_actividad, tipoact, nombact, ponente, fecha, totalh, nombrec,area from kardex where idalumno='$id_alumnos '";
$result_consulta_mysql=mysql_query($consulta_mysql,$con);
while($row = mysql_fetch_array($result_consulta_mysql)){?>
<td><?php echo $row['area'] ?></td>
<td><?php echo $row['nombrec'] ?></td>
<td><?php echo $row['tipoact'] ?></td>
<td><?php echo $row['nombact'] ?></td>
<td><?php echo $row['ponente'] ?> </td>
<td><center><?php echo $row['fecha'] ?></center> </td>
<td><center><?php echo $row['totalh'] .'  horas' ?></center> </td>
<td><center><a class="button" href="../Departamento Academico/Datos/Alumnos_Actividad/eli.php?alumno_actividad=<?php echo $row['alumno_actividad'];?>">Cancelar</a></center> </td>
</tr>

<?php
    }
    ?>
     <tr>
        <td style="border:0"></td>
        <td style="border:0"></td>
        <td style="border:0"></td>
        <td style="border:0"></td>
        <td colspan="2"  style="border:1"><center><p style="color:orange">TOTAL DE HORAS :</p></center></td>
        
        <td style="border:1"><center>
        <?php
include ('includes/conex.php');
?>
 <?php
            $consulta = mysql_query("SELECT sum(totalh) as conteo FROM kardex where idalumno='$id_alumnos ' ");
            
            $reg = mysql_fetch_array($consulta,MYSQL_ASSOC);
           echo $reg["conteo"] .'  horas';
            
?>
 </center>
  </td>
    </tr>
</thead>
</table>
<center>
<input type="submit" name="imprimir" formaction="../Departamento Academico/Datos/formatos/pdfkardex.php" value="Imprimir a PDF">
</center>
                       </center>
                       </form>          
                </div>
                
                <div id="cpestana3">
  <center>             
 <section>
        <?php
        if(isset($_SESSION['id_alumnos'])) { 
  if(isset($_POST['enviar'])) {
	  if($_POST['password'] != $_POST['password_conf']) {
                    echo' 
			<script>
window.alert("LAS CONTRASEÑAS NO COINCIDEN, INTENTE DE NUEVO POR FAVOR");
window.location="menu.php";
</script>';
                }else {
                    $id_alumnos = $_SESSION['id_alumnos'];
 $password = mysql_real_escape_string($_POST["password"]);
                  // $password = md5($password);   encriptamos la nueva contraseña con md5
                    $sql = mysql_query("UPDATE alumnos SET password='".$password."' WHERE idalumno='$id_alumnos'
					");
                    if($sql) {
                      echo '<script> 
window.alert("CONTRASEÑA MODIFICADA CORRECTAMENTE");
window.location="menu.php";
</script>';
                    }else {
                        echo '
						<script>
window.alert("ERROR, NO SE PUEDE CAMBIAR A CONTRASEÑA");
window.location="menu.php";
</script>';
                    }
                }
            }else {
    ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <label>Su contraseña Actual es:</label><br /><br />
                <label><?php echo $password ?></label><br />
  <br />       <label>Nueva contraseña:</label><br />
  <input type="password" name="password" maxlength="15" required /><br />
         <br />       <label>Confirmar:</label><br />
             <input type="password" name="password_conf" maxlength="15" /><br />
     <br />           <input type="submit" name="enviar" value="Enviar" required/>
            </form>
    <?php
            }
        }else {
            echo "Acceso denegado.";
        }
    ?> 

       
</section>
</center>	              </div>
            </div>
          </body>
        </div>
    
	
	<?php include("includes/footer.php"); ?>
