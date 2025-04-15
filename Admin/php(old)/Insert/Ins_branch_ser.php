<?php
    if(isset($_POST['submit'])){
        $bid=$_POST['Branch_ID'];
        $bname=$_POST['BranchName'];
        $lid=$_POST['Lect_ID'];
     
        include('../../../db_connect.php');
        $insert="insert into branch values('$bid','$bname','$lid');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_branch.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>