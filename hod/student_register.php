
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
if((isset($_POST["rid"]))&& (isset($_POST["names"])) ){
	$id = $_POST["rid"];
	$sname = $_POST["names"];

		$sql = mysql_query("SELECT * FROM user where id='$id' ");
		$count = mysql_num_rows($sql);
		if($count){
		$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
		}

  


		else{
			$sql1 = mysql_query("INSERT INTO `user`(`id`, `userId`, `password`, `did`, `fname`) VALUES ('$id','$sname',123,3,'sn')");
			if($sql1){
			$msg = "<font color=\"green\"><H1>Registrado exitosamente</H1></font>";
	
		}

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
			<div class="head pull-left">
				<h2 class="pull-left">UMG<small>&nbsp;&nbsp;SISTEMA DE ADMINISTRACÓN MARIANO GALVEZ DE GUATEMALA</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="student_register.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de nuevos estudiantes
 </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Registro				
				</th>
			<tr>
					<td class="info" colspan="3">
					<input type="text" name="names" class="form-control" placeholder="Name" />
						</td>
			</tr>
			<tr>
				<td class="info">	
					<input type="text" name="rid" class="form-control" placeholder="Asigne un numero de carnet" />
				</td>
			</tr>
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