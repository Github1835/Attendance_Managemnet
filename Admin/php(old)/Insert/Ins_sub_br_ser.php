<?php
    if(isset($_POST['submit'])){
        $branch=$_POST['branch'];
        $sub=$_POST['sub'];
     
        include('../../../db_connect.php');
        $insert="insert into sub_br values('$sub','$branch');";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "Record Inserted";
            echo "<script>window.location.href='Ins_sub_br.php';</script>";}
        else
            die(mysqli_error($con));
    }
?>