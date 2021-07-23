<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style>
		body,html{
	margin: 0;
	padding: 0;
	background-color: #D3D3D3;

}
header{
	width: 100%;
	height: 70px;
	background-color: #282828;

}
h2{
	position: absolute;
	padding: 3px;
	float: left;
	margin-left: 2%;
	margin-top: 10px;
	font-family: Times New Roman;
	color: blue;
	font-size: 30px;
}

ul{
	width: auto;
	float: right;
	margin-top: 8px;
}
li{
	display: inline-block;
	padding: 15px 15px;

}
a{
	text-align: center;
	color: #ffffff;
	text-decoration: none;
	font-family: Times New Roman;
	font-size: 1.4vw;

}
a:hover{
	color: #F0c330;
	transition: 0.5s;
}
.table3{
	border-collapse: collapse;
	width: 100%;
	color: #282828;
	font-family: Times New Roman;
	font-size: 20px;
	text-align: center;
	margin-top: 10px;
	padding: 0;
}
.patientsearch{

width: 30%;
margin:0px auto;
padding: 20px;
border: 1px solid #423289;
background: white;
border-radius: 0px 0px 10px 10px;
}
.btn{
	margin :0 50% 0 40%;
	padding: 10px 30px 10px 30px;
	font-size: 15px;
	color: white;
	background: grey;
	border:none;
	border-radius: 5px;
	font-family: Times New Roman;
}
.input-group{
	margin: 10px 0px 10px 0px;
}
.input-group label{
	display: block;
	text-align: left;
	margin: 5px;
}
.input-group input{
	height: 20px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border:1px solid grey;
}
.table2{
border-collapse: collapse;
width: 100%;
color: #282828;
font-family: Times New Roman;
font-size: 20px;
text-align: center;
margin-top: 130px;
}
th{
background-color: grey;
color: white;
width: auto;
}
tr:nth-child(even){
background-color: grey;
width: auto;
}
	</style>
</head>
<body>
	<header>
	<h2>Afya Bora</h2>
		<nav>
		<ul> 
			<li><a href=" index.php">Home</a></li>
			<li><a href=" searchpatient.php">Search Patient</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
		</ul>
	</nav>
</header>
	
<form method="post" action="searchpatient.php" class="patientsearch">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold; font-size: 30px">Search By:</label>
		<label style="font-weight: bold">*Patient ID</label>
		<input type="text" name="PID" >

	</div>

	<div class="input-group">
		<button type="submit" name="SearchP" class="btn">Search</button>
	</div>
		</form>
	</form>

		<?php 

         if (isset($_POST['SearchP'])) {

         ?>	<table class="table3" >
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Patient Information</caption>>
		<tr>
		<th>PatientID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Email</th>
		<th>BloodGroup</th>
		</tr>
		<?php  
		$PID =$mysqli -> real_escape_string($_POST['PID']);

		$sqlP="SELECT  * FROM  patients   WHERE 	UserID=('$PID') OR Name=('$PID') " ;
		$resultP=$mysqli->query($sqlP);
		if(mysqli_num_rows($resultP)==1){
			while ($rowP=$resultP->fetch_assoc()) {

				echo "<tr><td>".$rowP["UserID"]."</td><td>".$rowP["Name"]."</td><td>".$rowP["Address"]."</td><td>".$rowP["ContactNumber"]."</td><td>".$rowP['Email']."</td><td>".$rowP['Bloodtype']."</td></tr>";
			}
			echo "</table";
		}
	}?>
 </table>
			<?php 	
				 if (isset($_POST['SearchP'])) {

         ?>	<table class="table2">
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Treatment History</caption>>
		<tr>
		<th>PatientID</th>
		<th>PatientName</th>
		<th>Treatment</th>
		<th>Doctor's Note</th>	
		</tr> 
		<?php  

		$PID =$mysqli -> real_escape_string($_POST['PID']);

	}?>
 </table>
	
</body>
</html>

