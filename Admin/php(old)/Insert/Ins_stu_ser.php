<?php
    if(isset($_POST['submit'])){
        $enrollno=$_POST['enrollno'];
        $name=$_POST['name'];
        $branch_ID=$_POST['branchid'];
        $gender=$_POST['gender'];
        $email_ID=$_POST['emailid'];
        $contact_no=$_POST['contactno'];
        $sem=$_POST['semester'];
        $year=$_POST['year'];
        $password=$_POST['password'];

        include('../../../db_connect.php');
        $insert="insert into student(StuRollno,StuName,Gender,Email_ID,Contact_no,Sem,Year,Password,Branch_ID) values('$enrollno','$name','$gender','$email_ID','$contact_no','$sem','$year',null,'$branch_ID');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_stu.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>