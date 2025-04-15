<?php
    session_start();
    if(isset($_SESSION['Lect_ID'])==1)
    {
    include('../../db_connect.php');
    
    $lid=$_SESSION['Lect_ID'];
    
    if($_POST['submit']=="Change Email")
    {
        $email=$_POST['Semail'];
        $query="UPDATE lecturer SET Email_ID='$email' WHERE Lect_ID='$lid'";
        $cmd=mysqli_query($con,$query);
        echo "<script>window.location.href='Settings.php';</script>";
    }else if($_POST['submit']=="Delete Account")
    {
        $query="UPDATE student SET Password=NULL WHERE StuRollno='$lid'";
        $cmd=mysqli_query($con,$query);
        echo '<script type="text/javascript"> '; 

            echo '  if (confirm("Account is Deleted.")) {}'; 
            echo '    document.location = "../../FacultyLogin.html";';
            echo '</script>';
    }
    else
    {
        $npass=$_POST['npass'];
        $cpass=$_POST['cpass'];
        if($npass==$cpass&&strlen($npass)>=6)
        {
            $query="UPDATE lecturer SET Password='$npass' WHERE Lect_ID='$lid'";
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
    
?>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>