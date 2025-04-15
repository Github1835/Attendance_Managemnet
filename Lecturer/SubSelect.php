<?php
    session_start();
    
    if(isset($_SESSION['Lect_ID'])==1)
    {
        $_SESSION['Subject']=$_GET['Sub'];
        echo "<script>window.location.href='LecturerRedirect.php';</script>";
    }
    else{
        echo "<script>window.location.href='../FacultyLogin.html';</script>";
    }

?>