<?php

session_start();

//Connect database
include("../../db_connect.php");

if(isset($_COOKIE['SESSION']))
{
    $aid=$_POST['Admin_ID'];
    $query="SELECT Email_ID FROM admin WHERE Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    $row=mysqli_fetch_array($cmd);
    $email=$row['Email_ID'];

    $_SESSION['Admin_ID']=$aid;
    $_SESSION['Email_ID']=$email;
    $_SESSION['Password']="Change Password";
    $_SESSION['otpinfo']="OTP is sent on E-mail";
    
    $query="SELECT AdminName FROM admin WHERE Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    $n=mysqli_fetch_array($cmd);
    $name=$n['AdminName'];
    
    //To create OTP
    function otp($length=6)
    {
        $char='0123456789';
        $otp='';
        for($i=0;$i<$length;$i++){
            $otp.=$char[mt_rand(0,strlen($char)-1)];
        }
        return $otp;
    }
    $otp=otp(6);

    $_SESSION['otp']=$otp;
            
    $Subject = 'OTP for BBIT Admin Forgot Password';
    $Body = "Hello there!! $name \nHave you forgot your password... Here is your OTP:\n\n$otp";
    $x=mail($email,$Subject,$Body);
    if(isset($x)!=1)
    {
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("There is Some error plese try again")) {}';  
        echo '    document.location = "ForgotPassword.php";'; 
        echo '</script>';
    }
    echo "<script>window.location.href='OTP2.php';</script>";
}else
{
    header("location:ForgotPassword.php");
    echo "<script>window.location.href='ForgotPassword.php';</script>";
}
?>