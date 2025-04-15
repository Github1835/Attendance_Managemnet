
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Lecturer ID</th>
<th> Lecturer Name</th>
<th>Email_ID</th>
<th>Password</th>
<th>Contact_no</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from lecturer;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$lectid=$row['Lect_ID'];
$name=$row['LectName'];
$emailid=$row['Email_ID'];
$password=$row['Password'];
$contactno=$row['Contact_no'];
?>
<tr>
<td><?php echo $lectid; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $emailid; ?></td>
<td><?php echo $password; ?></td>
<td><?php echo $contactno; ?></td>
<td class="dd"><a href="delete_lect2.php?lectid=<?php echo $lectid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_lect.php?lectid=<?php echo $lectid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>