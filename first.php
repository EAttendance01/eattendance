<?php
// Start the session
session_start();
?>
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
div.color-box{
background-color:lightgray;
height:100px;
}

body
{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-color: ;
  background-size: cover;
  text-align: center;
}

.loginBox
{
  position: absolute;
  top: 30%;
  left: 35%;
  transform: translated(-50%,-50%);
  width: 400px;
  padding: 40px;
  background: rgba(0,0,0,.8);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.5);
  border-radius: 10px;
}
.loginBox h2
{
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}
.loginBox .inputBox
{
  position: relative;
}
.loginBox .inputBox input
{
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  letter-spacing: 1px;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.loginBox .inputBox label
{
  position: absolute;
  top: 0;
  left: 0;
  letter-spacing: 1px;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}
.loginBox .inputBox input:focus ~ label,
.loginBox .inputBox input:valid ~ label
{
  top: -18px;
  left: 0;
  color: #03a9f4;
  font-size: 12px;
}
.loginBox input[type="submit"]
{
  background: transparent;
  border: none;
  outline: none;
  color: #fff;
  background: #03a9f4;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large new" style="align:center;">HOME</a>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">
<div class="color-box"><h1 class="w3-wide w3-center">Welcome to SPM.eAttendance</h1></div>
  <!-- login form -->
<form method="post">
        <div class="loginBox">
             <h2>LOGIN</h2>
			<div class="inputBox">
                <input type="text" name="type" required>
                <label>Type</label>
			</div>
            <div class="inputBox">
                <input type="text" name="un" required>
                 <label>Email</label>
			</div>
			<div class="inputBox">
                <input type="password" name="p" required>
                <label>Password</label>
			</div>
			<input type ="submit" name="login" value="Login">
		</div> 
</form>
			<?php
           //session_start();
          if(isset($_SESSION['error'])){
           echo '<script>alert("Wrong Credentials")</script>';
}
?> 

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$conn=new mysqli("localhost","root","","attendance");
if(!$conn->connect_error)
{
//echo"Connected";
$un="'".$_POST["un"]."'";
$pass="'".$_POST["p"]."'";
$type="'".$_POST["type"]."'";

$sql="select * from login where email=$un and password=$pass and type=$type";

$result=$conn->query($sql);
	if($result->num_rows>0)
	{   
		$row=$result->fetch_assoc();
		//creating session variables
		$_SESSION["name"]=$row["email"];
		echo $_SESSION["tpid"];
		//MATCHING THE TYPE OF USER
		if($type=="'admin'"){
			header("location:LOGIN.php");
		}
		elseif($type=="'tp'"){
			$_SESSION["tpid"]=$row["tpid"];
			header("location:tp_login.php");	
		}
		elseif($type=="'tpc'"){
			header("location:STUDENTS.php");
		}
		else{
			echo "invalid type";
		}
	}
	else
	{
		echo"<center><h1>invalid email / password /type</center></h1>";
	}
}
else
	 echo"can't connect".$connect_error();
}
?>
</body>
</html>