<?php
    if(isset($_POST['submit'])){
        $evno=$_POST['evno'];
        $evname=$_POST['evname'];
        $path=$_POST['Path'];
        
        include('../../../db_connect.php');
        $insert="insert into event1 values('$evno','$evname','$path');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_event1.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>