<?php
    if(isset($_POST['submit'])){
        $adminid=$_POST['adminid'];
        $name=$_POST['name'];
        $email_ID=$_POST['emailid'];
        $password=$_POST['password'];
        $contact_no=$_POST['contactno'];
     
        include('../../../db_connect.php');
        $insert="insert into admin values('$adminid','$name','$email_ID','$password','$contact_no');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_admin_ser.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>