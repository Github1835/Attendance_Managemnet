<?php
include('../../../db_connect.php');
$query="delete from lecturer where Lect_ID='$_GET[lectid]';";
$cmd=mysqli_query($con,$query);
if ($cmd){
echo "Records Deleted Successfully";
 echo "<script>window.location.href='delete_lect.php';</script>";
}
else
die(mysqli_error($con));
mysqli_close($con);
?>