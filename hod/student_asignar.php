
<?php
error_reporting(0);
session_start();
include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	
	   $check_did = $_SESSION["did"];
		if($check_did !=2){
			 header("location:../index.php");
		}
	}
$msg ="";


if((isset($_POST["curso"]))&& (isset($_POST["alumno"])) &&(isset($_POST["nota"]))){
	$curso= $_POST["curso"];
	$alumno = $_POST["alumno"];
	$nota=$_POST["nota"];


$idr=rand(999, 9999);
$sql1 = mysql_query("INSERT INTO `matricula`(`id`, `id_user`, `id_curso`, `nota`) VALUES ('$idr','$alumno','$curso','$nota')");




				if($sql1){
				$msg = "<font color=\"green\"><H1>Registrado exitosamente</H1></font>";
				}else{
					$msg = "<font color=\"green\"><H1>No se ingreso</H1></font>";
				}


	}else{
		$msg="";
	}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			UMG
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">UMG<small>&nbsp;&nbsp;SISTEMA DE ADMINISTRACÓN MARIANO GALVEZ DE GUATEMALA</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="student_asignar.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>	Asignacion de estudiante
 </h3></caption>
			<tbody>
				<th class="danger" colspan="3">ASIGNACION				
				</th>
			<tr>
					<td class="info" colspan="3">Alumno
				<?php
//db connection
mysql_connect("localhost","id13925892_root","eABNC~#hFU121Q*B");
mysql_select_db("id13925892_proyecto");

//query
$sql=mysql_query("SELECT * FROM `user`");
if(mysql_num_rows($sql)){
$select= '<select name="alumno">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option name="alumno"  value="'.$rs['id'].'">'.$rs['userId'].'</option>';
  }
}
$select.='</select>';
echo $select;

?>
						</td>
			</tr>

				<tr>
				<td class="info">Que curso asignará?	
					
<?php
//db connection
mysql_connect("localhost","id13925892_root","eABNC~#hFU121Q*B");
mysql_select_db("id13925892_proyecto");

//query
$sql=mysql_query("SELECT * FROM `faculty`");
if(mysql_num_rows($sql)){
$select= '<select name="curso">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option name="curso" value="'.$rs['id'].'">'.$rs['name'].'</option>';
  }
}
$select.='</select>';
echo $select;

?> 
				</td>
			</tr>

<tr><td>

<!-- 
<input type="text" name="curso">
<input type="text" name="curso"> -->

	<input type="number" name="nota" max=100 min=0 placeholder="Nota" style="border-radius: 5px; border: none; width: 200px" ></td></tr>



			<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Register">	
								<!-- <p>Nota: para promover a los estudiantes<a href="promote.php">haga clic aquí</a></p>	 -->
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>







	</body>
</html>