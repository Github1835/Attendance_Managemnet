<?php
	session_start();

	$aid=$_POST['Aname'];
	$pass=$_POST['Apass'];

	//Connect database
	include('../../db_connect.php');

	$query="SELECT Password FROM admin WHERE Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
	$pass1=mysqli_fetch_array($cmd);
	if($pass==$pass1['Password'])
	{
		$_SESSION['Admin_ID']=$_POST['Aname'];
       header("location:../AdminHome.php");
	} 
	else
	{
	    echo '<script type="text/javascript"> '; 
            echo '  if (confirm("ID or Password is Invalid")) {}';  
            echo '    document.location = "../../FacultyLogin.html";';  
            echo '</script>';
		echo "faild";
	}
?>