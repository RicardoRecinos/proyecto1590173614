
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
if( (isset($_POST["year"])) && (isset($_POST["section"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	
	
	if( $year=="" || $section == "" ){
					$msg = "<font color=\"red\">All fields are required.</font>";

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
			<div class="hidden-print"><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="view_timetable.php" name="regupdate">
			<table class="table table-bordered table-hover hidden-print" width="400px" >
			<caption align="center"><h3>Ver tabla de tiempos  </h3></caption>
			<tbody>
				<th class="danger" colspan="8">Vista de tabla de tiempo			
				</th>
			</td>
			</tr>
				<tr>
				
					<td class="info" colspan="4"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONAR SEMESTRE--</option>
								
			<option value="I-I">I-I</option>
			<option value="I-II">I-II</option>
			<option value="II-I">II-I</option>
			<option value="II-II">II-II</option>
			<option value="III-I">III-I</option>
			<option value="III-II">III-II</option>
			<option value="IV-I">IV-I</option>
			<option value="IV-II">IV-II</option>
			
						</select>
						
					</td>
					<td class="info" colspan="4"> 	
						<select name="section" class="form-control">
					<option value=""> -- Seccion--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
						
					</td>
				</tr>			
				<tr>
					<td colspan="8" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="View">	
					</td>
				</tr>
				<tr>
					<td colspan="8" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		 <?php
if( (isset($_POST["year"])) && (isset($_POST["section"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	
	
	if( $year=="" || $section == "" ){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
		echo "<table class=\"table table-hover table-bordered\">
		<caption><h3><i>Time Table for $year Section $section</i></h3></caption>";
		echo '<form><input type="button" class="btn btn-success hidden-print" value="Print" onClick="javascript:print()"/></form>
						<tr>
					<td class="danger">Day</td><td class="danger">Periodo-I</td><td class="danger">Period-II</td><td class="danger">Periodo-III</td><td class="danger">Periodo-IV</td><td class="danger">Periodo-V</td><td class="danger">Periodo-VI</td><td class="danger">Periodo-VII</td>
				</tr>';
			$qr1 = mysql_query("SELECT * FROM timetable WHERE year = '$year' AND sec = '$section' ");
			while($row = mysql_fetch_array($qr1)){
				$day = $row["day"];
				$per1 = $row["per1"];
				$per2 = $row["per2"];
				$per3 = $row["per3"];
				$per4 = $row["per4"];
				$per5 = $row["per5"];
				$per6 = $row["per6"];
				$per7 = $row["per7"];
				
				echo "
				<tr>
					<td class='info'>$day</td>
					<td class='info'>$per1</td><td class='info'>$per2</td><td class='info'>$per3</td><td class='info'>$per4</td>
					<td class='info'>$per5</td><td class='info'>$per6</td><td class='info'>$per7</td>
				</tr>				
				";
				
			}
		
		echo '</table>';
	// end of not null
	}
}?>
		</div>
	</body>
</html>