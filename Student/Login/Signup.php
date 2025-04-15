<?php

session_start();

$eno=$_POST['eno'];
$pass=$_POST['pass'];
include('../../db_connect.php');

$query="SELECT Password FROM student where StuRollno='$eno'";
$cmd=mysqli_query($con,$query);
$account=mysqli_fetch_array($cmd);
if(isset($account)!=1)
{
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Invalid ID")) {';  
    echo '    document.location = "../Signup.html";';  
    echo '  }';  
    echo '</script>';
}else if($account['Password']!=null)
{
    echo '<script type="text/javascript"> '; 
    echo 'if(confirm("You already have an Account")){}';  
    echo '    document.location = "../Signup.html";'; 
    echo '</script>';
}else
{
    if(strlen($pass)<6)
    {
         echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Password is too short")) {';  
        echo '    document.location = "../Signup.html";';  
        echo '  }';  
        echo '</script>';
    }
    else
    {
        setcookie('SESSION','SESSION',time()+180);
        $_SESSION['StuRollno']=$eno;
        $_SESSION['Password']=$pass;
        echo "<script>window.location.href='Signup(OTP1).php';</script>";
    }
}
?>