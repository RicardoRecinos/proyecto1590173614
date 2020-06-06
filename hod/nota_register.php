
<?php
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
 
		$insert = mysql_query("INSERT INTO `faculty` VALUES ('$id','$name','sn')");
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
			<caption align="center"><h3>Registrar nota</h3></caption>
			<tbody>
				<th class="danger" colspan="3">	Registro				
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<B>Alumno:</B>
						<?php
//db connection
mysql_connect("localhost","root","");
mysql_select_db("sge_tusolutionweb");

//query
$sql=mysql_query("SELECT * FROM `user` where id!=1");
if(mysql_num_rows($sql)){

$select= '<select name="select">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['id'].'">'.$rs['userId'].'</option>';
  }
}
$select.='</select>';
echo $select;

?>

					</td>
					
				</tr>
				<tr>
					<td class="active" colspan="2">	
						<B>Curso:</B>
						<?php
//db connection
mysql_connect("localhost","root","");
mysql_select_db("sge_tusolutionweb");

//query
$sql=mysql_query("SELECT * FROM `faculty` where id!=1");
if(mysql_num_rows($sql)){

$select= '<select name="select">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
  }
}
$select.='</select>';
echo $select;

?>

					</td>
					
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