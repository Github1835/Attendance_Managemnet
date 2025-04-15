<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$sid1=$_POST['sid'];
$lid1=$_POST['lid'];

include('../../../db_connect.php');
$query="update lect_sub set Lect_ID='$lid1' where Sub_ID='$sid1'";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_lect_sub.php';</script>";
}
else{
   die(mysqli_error($con));
}
}
?>
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Updating Records</title>
</head>
<body>
<?php
include('../../../db_connect.php');
$query="select * from lect_sub where Sub_ID='$_GET[sid]';";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$sid=$row['Sub_ID'];
$lid=$row['Lect_ID'];
?>
<form method="POST" action="update_lect_sub.php">
<table border="1">
<tr>
<td>Subject ID</td>
<td><input type="text" name="sid" value="<?php echo $sid; ?>"></td>
</tr>
<tr>
<td> Lecturer ID </td>
<td><input type="text" name="lid" value="<?php echo $lid;?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>