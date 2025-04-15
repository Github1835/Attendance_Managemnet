<?php
	session_start();

	$eno=$_POST['eno'];
	$pass=$_POST['stupass'];

	//Connect database
	include('../../db_connect.php');
	
	$query="SELECT Password FROM student WHERE StuRollno=$eno";
	$cmd=mysqli_query($con,$query);
	$pass1=mysqli_fetch_array($cmd,MYSQLI_ASSOC);
	if($pass==$pass1['Password'])
	{
		$_SESSION['StuRollno']=$_POST['eno'];
		header("location:StudentAccount.php");
	} 
	else
	{
		header("location:../StudentLogin.html");
	}
?>