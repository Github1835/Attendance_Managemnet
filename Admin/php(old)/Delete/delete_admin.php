
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Admin ID</th>
<th> Admin Name</th>
<th>Email_ID</th>
<th>Password</th>
<th>Contact_no</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from admin;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$adminid=$row['Admin_ID'];
$name=$row['AdminName'];
$emailid=$row['Email_ID'];
$password=$row['Password'];
$contactno=$row['Contact_no'];
?>
<tr>
<td><?php echo $adminid; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $emailid; ?></td>
<td><?php echo $password; ?></td>
<td><?php echo $contactno; ?></td>
<td class="dd"><a href="delete_admin2.php?adminid=<?php echo $adminid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_admin.php?adminid=<?php echo $adminid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>