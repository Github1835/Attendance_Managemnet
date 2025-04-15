<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$enrollno=$_POST['no1'];
$name=$_POST['name1'];
$gender=$_POST['gender1'];
$emailid=$_POST['email1'];
$contactno=$_POST['contact1'];
$sem=$_POST['sem1'];
$year=$_POST['year1'];
$password=$_POST['password1'];
$branchid=$_POST['branchid1'];

include('../../../db_connect.php');
$query="update student set StuRollno='$enrollno', StuName='$name', Gender='$gender', Email_ID='$emailid', Contact_no='$contactno', Sem='$sem', Year='$year', Password='$password', Branch_ID='$branchid' where StuRollno=$enrollno;";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_stu.php';</script>";
}
else{
    $update="<script>alert('Record Not Updated');</script>";
    echo $update;
}
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/table.css">
<title>Updating Records</title>
</head>
<body>
<?php
include('../../../db_connect.php');
$query="select * from student where StuRollno=$_GET[enrollno]";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$enrollno=$row['StuRollno'];
$name=$row['StuName'];
$gender=$row['Gender'];
$emailid=$row['Email_ID'];
$contactno=$row['Contact_no'];
$sem=$row['Sem'];
$year=$row['Year'];
$password=$row['Password'];
$branchid=$row['Branch_ID'];
?>
<form method="POST">
<table border="1">
<tr>
<td>StuRollno</td>
<td><input type="number" name="no1" value="<?php echo $enrollno;?>"></td>
</tr>
<tr>
<td> Student Name </td>
<td><input type="text" name="name1" value="<?php echo $name;?>"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="text" name="gender1" value="<?php echo $gender; ?>"></td>
</tr>
<tr>
<td>Email_ID</td>
<td><input type="email" name="email1" value="<?php echo $emailid; ?>"></td>
</tr>
<tr>
<td>Contact_no</td>
<td><input type="number" name="contact1" value="<?php echo $contactno; ?>"></td>
</tr>
<tr>
<td>Semester</td>
<td><input type="number" name="sem1" value="<?php echo $sem; ?>"></td>
</tr>
<tr>
<td>Year</td>
<td><input type="number" name="year1" value="<?php echo $year; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="text" name="password1" value="<?php echo $password; ?>"></td>
</tr>
<tr>
<td>Branch ID</td>
<td><input type="text" name="branchid1" value="<?php echo $branchid; ?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>