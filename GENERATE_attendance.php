<?php
include 'config.php';
$sql_tpc="SELECT * FROM `tpc`";
$query_tpc=mysql_query($sql_tpc) or die(mysql_error());

$sql_tp="SELECT * FROM `tp`";
$query_tp=mysql_query($sql_tp) or die(mysql_error());

$sql_batches="SELECT * FROM `batches`";
$query_batches=mysql_query($sql_batches) or die(mysql_error());

$sql_trainers="SELECT * FROM `trainers`";
$query_trainers=mysql_query($sql_trainers) or die(mysql_error());

?>
<html>
<!DOCTYPE html>
<title>eAttendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS.css">

<style>
.new{
font-size:13px;
}
body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin-top:100px;
			margin-left:290px;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: black;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}
div.box{
width:50%;
margin-left:350px;
}
/* Full-width input fields */
input[type=text], input[type=password],input[type=select] {
    width: 100%;
	height:20px;
	aligh:center;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
.select{
	width: 100%;
	height:20px;
	aligh:center;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
}
input[type=text]:focus, input[type=password]:focus, input[type=select]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color:black;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
<div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="LOGIN.php" class="w3-bar-item w3-button w3-padding-large new">HOME</a>
    <a href="TRAINING_PARTNERS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER</a>
    <a href="TRAINING_PARTNERS_CENTER.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER CENTERS</a>
    <a href="BATCHES.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">BATCHES</a>
	<a href="TRAINERS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINERS</a>
	<a href="STUDENTS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">STUDENTS</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">GENERATE ATTENDANCE</a>
	<a href="USER_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">CREATE USER</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">LOGOUT</a>
  </div>
</div>

<form method="post">
  <div class="container box">
  
    <hr>

<label><b>Training Partner</b></label>
	<select name="TPID" class="select">    
    <option value="tp">Select Training Partner</option>
       <?php
        while($th=mysql_fetch_assoc($query_tp)){
       ?>
         <option value="<?=$th['tpid'] ?>"><?=$th['tp_name'] ?></option>
       <?php
       }
        ?>
    </select>

    <label><b>Training Partner Center</b></label>
	<select name="TPID" class="select">    
    <option value="">Select Training Partner Center</option>
       <?php
        while($th=mysql_fetch_assoc($query_tpc)){
       ?>
         <option value="<?=$th['TPID'] ?>"><?=$th['TPCName'] ?></option>
       <?php
       }
        ?>
    </select>
	
	<label><b>BATCH</b></label>
	<select name="" class="select">    
    <option value="">Select Batch</option>
       <?php
        while($th=mysql_fetch_assoc($query_batches)){
       ?>
         <option value="<?=$th['BID'] ?>"><?=$th['BID'] ?></option>
       <?php
       }
        ?>
    </select>
	
	<label><b>Date</b></label><br>
    <input type=date placeholder="enter student_doa" name="date" required>

	<br><br><label><b>Trainer 1</b></label>
	<select name="" class="select">    
    <option value="">Select Trainer 1</option>
       <?php
        while($th=mysql_fetch_assoc($query_trainers)){
       ?>
         <option value="<?=$th['TID'] ?>"><?=$th['TName'] ?></option>
       <?php
       }
        ?>
    </select>
	
	<br><label><b>Trainer 2</b></label>
	<select name="" class="select">    
    <option value="">Select Trainer 2</option>
       <?php
        while($th=mysql_fetch_assoc($query_trainers)){
       ?>
         <option value="<?=$th['TID'] ?>"><?=$th['TName'] ?></option>
       <?php
       }
        ?>
    </select>
	
	
	<label><b>Time</b></label><br>
    <input type=time placeholder="Time" name="time" required>
	
  </div> 
</form>

</html>
</body>