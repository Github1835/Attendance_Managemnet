<?php
session_start();

if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
{
    $pass=$_POST['newpass'];
    $cpass=$_POST['Confirmpass'];
    
    if($pass==$cpass&&strlen($pass)>=6)
    {
        $lid=$_SESSION['Lect_ID'];
        
        //Connect database
	    include('../../db_connect.php');

        $query="UPDATE lecturer SET Password='$pass' WHERE Lect_ID='$lid'";
        $cmd=mysqli_query($con,$query);
        $_SESSION['Password']="Password is changed";
        echo "<script>window.location.href='SessionDestroy.php';</script>";
    }
    else if(strlen($pass)<6)
    {
        $_SESSION['Password']="Password is too short";
        echo "<script>window.location.href='NewPassword1.php';</script>";
    }
    else
    {
        $_SESSION['Password']="Both Password must be same";
        echo "<script>window.location.href='NewPassword1.php';</script>";
    }
}
else
{
    echo "<script>window.location.href='ForgotPassword.php';</script>";
}
?>