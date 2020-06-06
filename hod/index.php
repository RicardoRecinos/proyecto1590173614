
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
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			UMG
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
				<h2 class="pull-left">UMG<small>&nbsp;&nbsp;SISTEMA DE ADMINISTRACÓN MARIANO GALVEZ DE GUATEMALA</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br><br/><br/>
			<h3><font color="663300">
 </font></h3>
		</div>
		<div id="logoumg">
		<img id="logoumg2" src="logoumg.png">
		</div>
	</body>
</html>