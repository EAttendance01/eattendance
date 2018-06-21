<?php
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'attendance'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$sql = "SELECT TPID,TPCID,TPCName,Description from tpc";
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
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
	<a href="TRAINERS_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINERS</a>
	<a href="STUDENT_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">STUDENTS</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">GENERATE ATTENDANCE</a>
	<a href="USER_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">CREATE USER</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">LOGOUT</a>
  </div>
</div>
<table class="data-table">
		<caption class="title">Or <a href="TP_center_create.php">CREATE NEW TRAINING PARTNER CENTER</a></caption>
		<thead>
			<tr>
				<th>NO. </th>
				<th>TPID</th>
				<th>TPCID</th>
				<th>Training Partner Name</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['TPID'].'</td>
					<td>'.$row['TPCID'].'</td>
					<td>'.$row['TPCName'] . '</td>
					<td>'.$row['Description'] . '</td>
				</tr>';
				$no++;
		}?>
		</tbody>
		
		</tfoot>
	</table></html>
</body>