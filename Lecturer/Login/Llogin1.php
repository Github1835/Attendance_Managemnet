<?php
	session_start();

	$lid=$_POST['Lname'];
	$pass=$_POST['Lpass'];

	//Connect database
	include("../../db_connect.php");

	$query="SELECT Password FROM lecturer WHERE Lect_ID='$lid'";
    $cmd=mysqli_query($con,$query);
	$pass1=mysqli_fetch_array($cmd);
	if($pass==$pass1['Password'])
	{
	    $_SESSION['Password']="";
		$_SESSION['Lect_ID']=$_POST['Lname'];
		header("location:../LecturerRedirect.php");
	} 
	else
	{
	    echo '<script type="text/javascript"> '; 
            echo '  if (confirm("ID or Password is Invalid")) {}';  
            echo '    document.location = "../../FacultyLogin.html";';
            echo '</script>';
	}
?>