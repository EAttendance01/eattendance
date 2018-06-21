<?php
include 'Attendance.php';
	$Atten= new Attendance();
    $Status=$Atten->Main1(10,4,1);
	for($i=0;$i<count($Status);$i++)
	{
		echo $Status[$i];
	}
		?>