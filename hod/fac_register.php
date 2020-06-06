
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
$ids="";
$name="";
if((isset($_POST["fname"])) && (isset($_POST["fid"])) ){
	$name = $_POST["fname"];
	$id = $_POST["fid"];
 
		$insert = mysql_query("INSERT INTO `faculty`(`id_matricula`, `id`, `name`, `yr`) VALUES ('','$id','$name','sn')");




		if($insert){
			$msg = "<div align='center'> <font color='green'>Hecho!</font></div>";
		}else{
			$msg = "<div align='center'> <font color='red'>Algo salio mal :(</font></div>";
		}
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
			<div class="head pull-left"><h2 class="pull-left">UMG<small>&nbsp;&nbsp;SISTEMA DE ADMINISTRACÓN MARIANO GALVEZ DE GUATEMALA</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="fac_register.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registrar cursos </h3></caption>
			<tbody>
				<th class="danger" colspan="3">	Registro				
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<input type="text" name="fname" class="form-control" placeholder="Nombre" />
					</td>
					
				</tr>
				<tr>
					<!-- Textbox for faculty signup -->
					<td class="active"><input type="text" name="fid" class="form-control" placeholder="Codigo de curso" />	</td>
					 <td class="active" colspan="2"><!-- <input type="password" name="pass" class="form-control" placeholder="Crear contraseña" /></td> -->
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Registro">	
								
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