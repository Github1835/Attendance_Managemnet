<?php
session_start();

if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
{
    $pass=$_POST['newpass'];
    $cpass=$_POST['Confirmpass'];
    if($pass==$cpass&&strlen($pass)>=6)
    {
        $aid=$_SESSION['Admin_ID'];

        //Connect database
        include("../../db_connect.php");
        
        $query="UPDATE admin SET Password='$pass' WHERE Admin_ID='$aid'";
        $cmd=mysqli_query($con,$query);
        $_SESSION['Password']="Password is changed";
        header("location:SessionDestroy.php");
        echo "<script>window.location.href='SessionDestroy.php';</script>";
    }
    else if(strlen($pass)<6)
    {
        $_SESSION['Password']="Password is too short";
        header("location:NewPassword1.php");
        echo "<script>window.location.href='NewPassword1.php';</script>";
    }
    else
    {
        $_SESSION['Password']="Both Password must be same";
        header("location:NewPassword1.php");
        echo "<script>window.location.href='NewPassword1.php';</script>";
    }
}
else
{
    header("location:ForgotPassword.php");
    echo "<script>window.location.href='ForgotPassword.php';</script>";
}
?>