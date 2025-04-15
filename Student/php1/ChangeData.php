<?php
    session_start();
    
    if(isset($_SESSION['StuRollno'])==1)
    {
    include('../../db_connect.php');
    
    $eno=$_SESSION['StuRollno'];
    
    if($_POST['submit']=="Change Email")
    {
        $email=$_POST['Semail'];
        $query="UPDATE student SET Email_ID='$email' WHERE StuRollno='$eno'";
        $cmd=mysqli_query($con,$query);
        echo "<script>window.location.href='Settings.php';</script>";
    }else if($_POST['submit']=="Delete Account")
    {
        $query="UPDATE student SET Password=NULL WHERE StuRollno='$eno'";
        $cmd=mysqli_query($con,$query);
        echo '<script type="text/javascript"> '; 

            echo '  if (confirm("Account is Deleted.")) {}'; 
            echo '    document.location = "../StudentLogin.html";';
            echo '</script>';
    }
    else
    {
        $npass=$_POST['npass'];
        $cpass=$_POST['cpass'];
        if($npass==$cpass&&strlen($npass)>=6)
        {
            $query="UPDATE student SET Password='$npass' WHERE StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);
            $_SESSION['Password']="Password is changed";
            
            echo "<script>window.location.href='Settings.php';</script>";
        }
        else if(strlen($npass)<6)
        {
            $_SESSION['Password']="Password is too short";
            echo "<script>window.location.href='Settings.php';</script>";
        }
        else
        {
            $_SESSION['Password']="Both Password must be same";
            echo "<script>window.location.href='Settings.php';</script>";
        }
    }
    }
    else
    {
        echo "<script>window.location.href='../StudentLogin.html';</script>";
    }
?>