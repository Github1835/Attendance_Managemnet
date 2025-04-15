
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Subject ID</th>
<th> Subject Name</th>
<th>Semester</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from subject;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$sid=$row['Sub_ID'];
$sname=$row['SubName'];
$sem=$row['Sem'];
?>
<tr>
<td><?php echo $sid; ?></td>
<td><?php echo $sname; ?></td>
<td><?php echo $sem; ?></td>
<td class="dd"><a href="delete_sub2.php?sid=<?php echo $sid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_sub.php?sid=<?php echo $sid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>