<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
    $rollno=$_GET['StuRollno'];
    
    //Connection to HOST
    include("../../db_connect.php");
    
    $sname=$_SESSION['Subject'];
    $query="SELECT Sub_ID FROM subject WHERE SubName='$sname'";
    $cmd=mysqli_query($con,$query);
    $sd=mysqli_fetch_array($cmd);
    $sid=$sd['Sub_ID'];
    
    $query="DELETE FROM mid_marks WHERE StuRollno='$rollno' AND Sub_ID='$sid'";
    $cmd=mysqli_query($con,$query);
    if(isset($cmd)==1){
        echo "<script>window.location.href='Mid-Marks.php';</script>";
    }


?>

<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>