
<?php
session_start();
include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	   $check_did = $_SESSION["did"];
		if($check_did !=3){
			 header("location:../index.php");
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			ALUMNO
		</title>
		<style type="text/css">
			
			#logoumg{
				position: fixed;
				top:28%;
				left: 15%;
			}#logoumg2{
				
				width: 500px;
				height: auto;
			}


		</style>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">MARIANO GALVEZ DE GUATEMALA<small>&nbsp;&nbsp;MODULO ALUMNO</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/prmenu.txt");?></div>
						<br><br/><br/>
			
		</div>
		<div id="logoumg">
		<img id="logoumg2" src="logoumg.PNG">
		</div>
	</body>
</html>