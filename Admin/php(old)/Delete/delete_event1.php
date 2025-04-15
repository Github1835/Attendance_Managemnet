
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete Records</title>
</head>
<body>
<table border="1">
<tr>
<th> No</th>
<th> Name</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from event1";
$cmd=mysqli_query($con,$query);
While ($row=mysqli_fetch_array($cmd))
{
$no=$row['No'];
$name=$row['Name'];
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $name; ?></td>
<td class="dd"><a href="delete_event1_2.php?no=<?php echo $no; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_event1.php?no=<?php echo $no; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>