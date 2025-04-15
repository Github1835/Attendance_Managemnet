<?php
	session_start();

	$eno=$_POST['eno'];
	$pass=$_POST['stupass'];

	//Connect database
	include("../../db_connect.php");
	
	$query="SELECT Password FROM student WHERE StuRollno='$eno'";
	$cmd=mysqli_query($con,$query);
	$pass1=mysqli_fetch_array($cmd,MYSQLI_ASSOC);
	if($pass1['Password']==null)
	{
	    echo '<script type="text/javascript"> '; 
            echo '  if (confirm("You don\'t have account")) {}';  
            echo '    window.location.href = "../StudentLogin.html";'; 
            echo '</script>';
	}
	if($pass==$pass1['Password'])
	{
		$_SESSION['StuRollno']=$_POST['eno'];
		$_SESSION['Password']=" ";
		echo "<script>window.location.href='StudentAccount.php';</script>";
} 
	else
	{
	    echo '<script type="text/javascript"> '; 
            echo '  if (confirm("ID or Password is Invalid.")) {}';  
            echo '    document.location = "../StudentLogin.html";';  
            echo '</script>';
        echo "<script>window.location.href='../StudentLogin.html';</script>";
	}
?>