<?php
include('../../../db_connect.php');
$query="delete from admin where Admin_ID='$_GET[adminid]';";
$cmd=mysqli_query($con,$query);
if ($cmd){
echo "Records Deleted Successfully";
 echo "<script>window.location.href='delete_admin.php';</script>";
}
else
die(mysqli_error($con));
mysqli_close($con);
?>