<?php
    if(isset($_POST['submit'])){
        $sid=$_POST['Sub_ID'];
        $sname=$_POST['SubName'];
        $sem=$_POST['Sem'];
     
        include('../../../db_connect.php');
        $insert="insert into subject values('$sid','$sname','$sem');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_sub.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>