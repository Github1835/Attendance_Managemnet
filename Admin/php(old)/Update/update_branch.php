<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$bid1=$_POST['bid'];
$bname1=$_POST['bname'];
$lid1=$_POST['lid'];

include('../../../db_connect.php');
$query="update branch set BranchName='$bname1', Lect_ID='$lid1' where Branch_ID='$bid1'";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_branch.php';</script>";
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
$query="select * from branch where Branch_ID='$_GET[bid]';";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$bid=$row['Branch_ID'];
$bname=$row['BranchName'];
$lid=$row['Lect_ID'];;
?>
<form method="POST" action="update_branch.php">
<table border="1">
<tr>
<td>Branch ID</td>
<td><input type="text" name="bid" value="<?php echo $bid; ?>"></td>
</tr>
<tr>
<td> Branch Name </td>
<td><input type="text" name="bname" value="<?php echo $bname;?>"></td>
</tr>
<tr>
<td>Lecturer ID</td>
<td><input type="text" name="lid" value="<?php echo $lid; ?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>