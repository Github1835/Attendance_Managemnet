<?php
    if(isset($_POST['submit'])){
        $lectid=$_POST['lectid'];
        $name=$_POST['name'];
        $email_ID=$_POST['emailid'];
        $password=$_POST['password'];
        $contact_no=$_POST['contactno'];
     
        include('../../../db_connect.php');
        $query="insert into lecturer values('$lectid','$name','$email_ID','$password','$contact_no');";
        $cmd=mysqli_query($con,$query);
        if($cmd){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_lect.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>