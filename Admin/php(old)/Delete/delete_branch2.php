<?php
include('../../../db_connect.php');
$query="delete from branch where Branch_ID='$_GET[bid]';";
$cmd=mysqli_query($con,$query);
if ($cmd){
echo "Records Deleted Successfully";
 echo "<script>window.location.href='delete_branch.php';</script>";
}
else
die(mysqli_error($con));
mysqli_close($con);
?>