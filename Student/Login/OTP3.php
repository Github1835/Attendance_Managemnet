<?php
session_start();
if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
{
    if($_POST['OTP']==$_SESSION['otp'])
    {
        echo "<script>window.location.href='NewPassword1.php';</script>";
    }else
    {
        $_SESSION['otpinfo']="Wrong OTP";
        echo "<script>window.location.href='OTP2.php';</script>";
    }
}
else
{
    echo "<script>window.location.href='ForgotPassword.php';</script>";
}
?>