<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$lectid=$_POST['lectid1'];
$name=$_POST['name1'];
$emailid=$_POST['email1'];
$password=$_POST['password1'];
$contactno=$_POST['contact1'];

include('../../../db_connect.php');
$query="update lecturer set LectName='$name', Email_ID='$emailid',Password='$password', Contact_no='$contactno' where Lect_ID='$lectid';";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_lect.php';</script>";
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
$query="select * from lecturer where Lect_ID='$_GET[lectid]';";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$lectid=$row['Lect_ID'];
$name=$row['LectName'];
$emailid=$row['Email_ID'];
$password=$row['Password'];
$contactno=$row['Contact_no'];
?>
<form method="POST" action="update_lect.php">
<table border="1">
<tr>
<td>Lecturer ID</td>
<td><input type="text" name="lectid1" value="<?php echo $lectid; ?>"></td>
</tr>
<tr>
<td> Lecturer Name </td>
<td><input type="text" name="name1" value="<?php echo $name;?>"></td>
</tr>
<tr>
<td>Email ID</td>
<td><input type="email" name="email1" value="<?php echo $emailid; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="text" name="password1" value="<?php echo $password; ?>"></td>
</tr>
<tr>
<td>Contact_no</td>
<td><input type="number" name="contact1" value="<?php echo $contactno; ?>"></td>
</tr>
<tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>