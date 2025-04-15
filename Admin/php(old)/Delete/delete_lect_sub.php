
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Subject ID</th>
<th> Lecturer ID</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from lect_sub;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$sid=$row['Sub_ID'];
$lid=$row['Lect_ID'];
?>
<tr>
<td><?php echo $sid; ?></td>
<td><?php echo $lid; ?></td>
<td class="dd"><a href="delete_lect_sub2.php?sid=<?php echo $sid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_lect_sub.php?sid=<?php echo $sid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>