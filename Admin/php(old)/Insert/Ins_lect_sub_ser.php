<?php
    if(isset($_POST['submit'])){
        $lect=$_POST['lect'];
        $sub=$_POST['sub'];
     
        include('../../../db_connect.php');
        $insert="insert into lect_sub values('$sub','$lect');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_lect_sub.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>