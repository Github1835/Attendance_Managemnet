<?php
    session_start();
    
    if(isset($_SESSION['StuRollno'])==1)
    {
        include('../../db_connect.php');    //Connection to database    

        $eno=$_SESSION['StuRollno'];    //Storing student Enrollment no into eno
        
        if($_POST['submit']=="Change Email")    //This section is used to update email of student into database
        {
            $email=$_POST['Semail'];
            $query="UPDATE student SET Email_ID='$email' WHERE StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);
            echo "<script>window.location.href='Settings.php';</script>";
        }else if($_POST['submit']=="Delete Account")    //This section is used to delete account (It will set password to NULL)
        {
            $query="UPDATE student SET Password=NULL WHERE StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);
            echo '<script type="text/javascript"> '; 

                echo '  if (confirm("Account is Deleted.")) {}'; 
                echo '    document.location = "../StudentLogin.html";';
                echo '</script>';
        }
        else        //This section is used to change password of student or generate error messages
        {
            $npass=$_POST['npass'];
            $cpass=$_POST['cpass'];

            /*If Selected password and confirm password are same and length of password is 
            6 or more then 5 characters this code will run */

            if($npass==$cpass&&strlen($npass)>=6)
            {
                $query="UPDATE student SET Password='$npass' WHERE StuRollno='$eno'";
                $cmd=mysqli_query($con,$query);
                $_SESSION['Password']="Password is changed";
                
                echo "<script>window.location.href='Settings.php';</script>";
            }
            else if(strlen($npass)<6)       //If password is less then 6 characters
            {
                $_SESSION['Password']="Password is too short";
                echo "<script>window.location.href='Settings.php';</script>";
            }
            else        //If selected password and confirm password is not same
            {
                $_SESSION['Password']="Both Password must be same";
                echo "<script>window.location.href='Settings.php';</script>";
            }
        }
    }
    else        //If session is not established, User will redirect to logini form
    {
        echo "<script>window.location.href='../StudentLogin.html';</script>";
    }
?>