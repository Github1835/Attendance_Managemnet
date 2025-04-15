
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th>Enrollno</th>
<th>Name</th>
<th>Gender</th>
<th>Email_ID</th>
<th>Contact_no</th>
<th>Sem</th>
<th>Year</th>
<th>Password</th>
<th>Branch_ID</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from student;";
$cmd=mysqli_query($con,$query);
While ($row=mysqli_fetch_array($cmd))
{
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
<tr>
<td><?php echo $enrollno; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $gender; ?></td>
<td><?php echo $emailid; ?></td>
<td><?php echo $contactno; ?></td>
<td><?php echo $sem; ?></td>
<td><?php echo $year; ?></td>
<td><?php echo $password; ?></td>
<td><?php echo $branchid; ?></td>
<td class="dd"><a href="delete_stu2.php?enrollno=<?php echo $enrollno; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_stu.php?enrollno=<?php echo $enrollno; ?>">Update</a></td>

</tr>
<?php } ?>
</table> </body> </html>