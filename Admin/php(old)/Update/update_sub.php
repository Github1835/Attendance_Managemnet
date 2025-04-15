<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$sid1=$_POST['sid'];
$sname1=$_POST['sname'];
$sem1=$_POST['sem'];

include('../../../db_connect.php');
$query="update subject set SubName='$sname1', Sem='$sem1' where Sub_ID='$sid1'";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_sub.php';</script>";
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
$query="select * from subject where Sub_ID='$_GET[sid]';";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$sid=$row['Sub_ID'];
$sname=$row['SubName'];
$sem=$row['Sem'];
?>
<form method="POST" action="update_sub.php">
<table border="1">
<tr>
<td>Subject ID</td>
<td><input type="text" name="sid" value="<?php echo $sid; ?>"></td>
</tr>
<tr>
<td> Subject Name </td>
<td><input type="text" name="sname" value="<?php echo $sname;?>"></td>
</tr>
<td> Sem</td>
<td><input type="number" name="sem" value="<?php echo $sem;?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>