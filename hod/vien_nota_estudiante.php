
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
<form method="post" action="vien_nota_estudiante.php">
	<h1>Buscar por Alumno</h1>

					<?php
//db connection
mysql_connect("localhost","id13925892_root","eABNC~#hFU121Q*B");
mysql_select_db("id13925892_proyecto");


//query
$sql=mysql_query("SELECT * FROM `user`");
if(mysql_num_rows($sql)){
$select= '<select name="alumno"><option value="">Buscar</option>';
while($rs=mysql_fetch_array($sql)){
      $select.='<option name=""  value="'.$rs['id'].'">'.$rs['userId'].'</option>';
  }
}
$select.='</select>';
echo $select;

?>
<input type="submit" name="" value="Buscar">
</form>
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Notas</h3></caption>
			<tbody>
				<th class="danger">Carnet</th><th class="danger">Nombre</th><th class="danger">Curso</th><th class="danger">Nota</th>
				
				<?php
				if (isset($_POST["alumno"])) {
					$buscar=$_POST['alumno'];
				}
					//$buscar=1590-17-3614;
						$matricula = mysql_query("SELECT * FROM matricula where id_user='$buscar'");


						while($row=mysql_fetch_array($matricula)){
							$idmatricula= $row["id"];
							$iduser = $row["id_user"];
							$idnota2=$row["id_curso"];
							$nota= $row["nota"];
										$user = mysql_query("SELECT userId FROM user where id='$iduser'");
										while($row1=mysql_fetch_array($user)){
										$nombreuser=$row1["userId"];
										}





									$faculty= mysql_query("SELECT * FROM faculty where id='$idnota2'");
										while($row2=mysql_fetch_array($faculty)){
										$faculty=$row2["name"];
										}
/*
										

							echo $iduser;
							echo $nombreuser;
							echo $faculty;
							echo $nota;*/
								echo "<tr> <td class='info'>$iduser</td><td class='info'>$nombreuser</td><td class='info'>$faculty</td><td class='info'>$nota</td></tr>";
						}


						
						
							
					

				?>
				<!-- <tr> <td colspan="2" class="info"><a href="fac_subdetails.php">Ver detalles del asunto </a></td></tr> -->
			</tbody>			
			</table>
		

			</form>
		 </div>
		</div>
	</body>
</html>