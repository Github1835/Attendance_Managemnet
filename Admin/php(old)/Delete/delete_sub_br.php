
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Branch ID</th>
<th> Subject ID</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from sub_br;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$sid=$row['Sub_ID'];
$bid=$row['Branch_ID'];
?>
<tr>
<td><?php echo $bid; ?></td>
<td><?php echo $sid; ?></td>

<td class="dd"><a href="delete_sub_br2.php?sid=<?php echo $sid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_sub_br.php?sid=<?php echo $sid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>