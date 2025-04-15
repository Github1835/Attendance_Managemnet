<?php

$name=$_POST['name'];
$email=$_POST['email'];
$no=$_POST['no'];
$message=$_POST['message'];

//Connect database
include('../../db_connect.php');

$query="INSERT INTO contact VALUES('null','$name','$email','$no','$message')";
$cmd=mysqli_query($con,$query);

if($cmd==1)
{
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Message has been sent.")) {}';  
    echo '    document.location = "../StudentLogin.html";';
    echo '</script>';
}

?>