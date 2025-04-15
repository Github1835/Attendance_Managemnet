<?php
include('../../../db_connect.php');
$db=mysqli_select_db($con,"attendance");
$query="delete from student where StuRollno=$_GET[enrollno]";
$cmd=mysqli_query($con,$query);
if ($cmd){
    $delete="<script>alert('Records deleted successfully');</script>";
    echo $delete;
     echo "<script>window.location.href='delete_stu.php';</script>";
}
mysqli_close($con);
?>