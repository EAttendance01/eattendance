<!DOCTYPE html>
<html>
<title>eAttendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.new{
font-size:13px;
}
.ar{
width: 360px;
height: 500px;
background-color: rgba(0,0,0,0.9);
margin:auto;
margin-top:50px;
padding-top:10px;
padding-left:40px;
border-radius:10px;
}
.ar input[type="text"]{
width:100px;
height:20px;
border-radius:10px;
padding-left:10px;
}
.ar input[type="submit"]{
width:130px;
height:35px;
border-radius:10px;
margin-left:5px;
background-color:skyblue;

}
.ar input[type="password"]{
width:200px;
height:35px;
padding-left:10px;
border-radius:5px;
}

</style>
</head>
<body>
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="login.html" class="w3-bar-item w3-button w3-padding-large new">HOME</a>
    <a href="training_partner_create.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER</a>
    <a href="training_partner_center.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER CENTERS</a>
    <a href="create_batch.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">BATCHES</a>
	<a href="add_trainer.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINERS</a>
	<a href="add_student.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">STUDENTS</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">GENERATE ATTENDANCE</a>
	<a href="create_user.html" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">CREATE USER</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">LOGOUT</a>
  </div>
</div>


<div class="ar">
<pre><h1><FONT SIZE="40" color="white">    Register</h1></pre>
<form method="post">
<table>
<tr>
<td><b><h2><font color="white">TPID</td>
<td>
<input type=text name="TPID" placeholder="Enter TPID" required>
</td>
</tr>


<tr>
<td><b><h2><h2><font color="white"> TPCID</td>
<td>
<input type=text name="TPCID"  placeholder="Enter TPCID" required>
</td>

<tr>
<td><b><h2><h2><font color="white"> TPCName</td>
<td>
<input type=text name="TPCName"  placeholder="Enter TPCName" required>
</td>


<tr>
<td><b><h2><h2><font color="white">Description</td>
<td>
<input type=text name="Description"  placeholder="Enter Description" required>
</td>

<tr>
<td>
<input type=submit value="Sign Up" name="s">
</td>

</table>
</form>
</div>

<?php
$host="localhost";
$user="root";
$pass="";
$db="attendance";
$conn=mysqli_connect($host,$user,$pass,$db);
if(mysqli_connect_errno())
	echo"could't connect".mysqli_connect_error();
else
	//echo"<center>connection established ";
if(isset($_POST['s']))
{
	$TPID="'".$_POST["TPID"]."'";
	$TPCID="'".$_POST["TPCID"]."'";
	$TPCName="'".$_POST["TPCName"]."'";
	$Description="'".$_POST["Description"]."'";
	
	$sql="insert into tpc(TPID,TPCID,TPCName,Description)values($TPID,$TPCID,$TPCName,$Description)";
	if($conn->query($sql)===true)
		echo"<center>succesfully registered";
	else
		echo"some error occured".$conn->error;
	$conn->close();
}
?>
</body>
</html>