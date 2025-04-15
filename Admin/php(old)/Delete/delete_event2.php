
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Delete and Update Records</title>
</head>
<body>
<table border="1">
<tr>
<th> Ev_No</th>
<th> Ev_Name</th>
<th>Ev_Date</th>
</tr>
<?php
include('../../../db_connect.php');
$query="select * from event2";
$cmd=mysqli_query($con,$query);
While ($row=mysqli_fetch_array($cmd))
{
$no=$row['Eno'];
$name=$row['Ev_name'];
$date=$row['Ev_date'];
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $date; ?></td>
<td class="dd"><a href="delete_event2_2.php?no=<?php echo $no; ?>">Delete</a></td>
<td class="dd"><a href="../Update/update_event2.php?no=<?php echo $no; ?>">Update</a></td>
</tr>
<?php } ?>
</table> </body> </html>