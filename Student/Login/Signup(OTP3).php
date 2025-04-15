<?php
session_start();
if(isset($_SESSION['StuRollno'])&&isset($_COOKIE['SESSION'])==1)
{
    if($_POST['OTP']==$_SESSION['otp'])
    {
        echo "<script>window.location.href='NewAccount1.php';</script>";
    }else
    {
        $_SESSION['otpinfo']="Wrong OTP";
        echo "<script>window.location.href='Signup(OTP2).php';</script>";
    }
}
else
{
    echo "<script>window.location.href='../Signup.html';</script>";
}
?>