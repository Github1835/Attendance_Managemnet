
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Branch ID</th>
<th> Branch Name</th>
<th>Lecturer ID</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from branch;";
$cmd=mysqli_query($con,$query);
While($row=mysqli_fetch_array($cmd))
{
$bid=$row['Branch_ID'];
$bname=$row['BranchName'];
$lid=$row['Lect_ID'];
?>
<tr>
<td><?php echo $bid; ?></td>
<td><?php echo $bname; ?></td>
<td><?php echo $lid; ?></td>
<td class="dd"><a href="delete_branch2.php?bid=<?php echo $bid; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_branch.php?bid=<?php echo $bid; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>