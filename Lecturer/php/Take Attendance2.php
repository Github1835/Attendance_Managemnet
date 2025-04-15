<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
$sub=$_POST['sub'];
$_SESSION['Subject']=$sub;
echo "<script>window.location.href='AttendanceInsert.php';</script>";
?>

<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>