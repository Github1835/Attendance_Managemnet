<?php

	session_start();

	if(isset($_SESSION['Lect_ID'])==1)
	{
	//Connection to HOST
	include("../../db_connect.php");

	if($_POST['action']=='Insert')
	{
		for($i=1;$i<=$_POST['Stuno'];$i++)
		{

			$sname=$_SESSION['Subject'];
			$query="SELECT Sub_ID FROM subject WHERE SubName='$sname'";
			$cmd=mysqli_query($con,$query);
			$sd=mysqli_fetch_array($cmd);
			$sid=$sd['Sub_ID'];

			$name=$i."stu";
			$rollno=$_POST[$name];
			$name=$i.'mark';
			$mark=$_POST[$name];

			$query="SELECT obt_marks FROM mid_marks WHERE StuRollno='$rollno' AND Sub_ID='$sid'";
			$cmd=mysqli_query($con,$query);
			$disition=mysqli_fetch_array($cmd);

			if(isset($disition)==1)
			{
				$query="UPDATE mid_marks SET obt_marks='$mark' WHERE StuRollno='$rollno' AND Sub_ID='$sid'";
				$cmd=mysqli_query($con,$query);
			}
			else
			{
				$query="INSERT INTO mid_marks VALUES('$rollno','$sid','$sname','$mark')";
				$cmd=mysqli_query($con,$query);
			}
			
		}
		echo "<script>window.location.href='Mid-Marks.php';</script>";
	}
	else{
		$query="DELETE FROM mid_marks";
		$cmd=mysqli_query($con,$query);
		echo "<script>window.location.href='Mid-Marks.php';</script>";
	}
	}
	else
	{
		echo "<script>window.location.href='../../FacultyLogin.html';</script>";
	}
?>