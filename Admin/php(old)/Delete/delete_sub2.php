<?php
include('../../../db_connect.php');
$query="delete from subject where Sub_ID='$_GET[sid]';";
$cmd=mysqli_query($con,$query);
if ($cmd){
echo "Records Deleted Successfully";
 echo "<script>window.location.href='delete_sub.php';</script>";
}
else
die(mysqli_error($con));
mysqli_close($con);
?>