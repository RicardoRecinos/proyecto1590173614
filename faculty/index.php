
<?php
session_start();
include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	   $check_did = $_SESSION["did"];
		if($check_did !=1){
			 header("location:../index.php");
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			Tusolutionweb tutos Ingeniería & Tecnología
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">SSN<small>&nbsp;&nbsp;Tusolutionweb tutos Ingeniería & Tecnología</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/facmenu.txt");?></div>
						<br><br/><br/>
			<h3><font color="663300">Tusolutionweb tutos Ingeniería & Tecnología </font></h3>
		</div>
	</body>
</html>