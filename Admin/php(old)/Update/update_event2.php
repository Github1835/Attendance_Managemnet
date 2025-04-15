<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$no=$_POST['no1'];
$name=$_POST['name1'];
$date=$_POST['date1'];
include('../../../db_connect.php');
$query="update event2 set Eno='$no', Ev_name='$name', Ev_date='$date' where Eno=$no;";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_event2.php';</script>";
}
else{
    $update="<script>alert('Record Not Updated');</script>";
    echo $update;
}
}
?>
<html>
<head>
    <link rel="stylesheet" href="../../css/table.css">
<title>Updating Records</title>
</head>
<body>
<?php
include('../../../db_connect.php');
$query="select * from event2 where Eno=$_GET[no]";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$no=$row['Eno'];
$name=$row['Ev_name'];
$date=$row['Ev_date'];
?>
<form method="POST">
<table border="1">
<tr>
<td>Eno</td>
<td><input type="number" name="no1" value="<?php echo $no;?>"></td>
</tr>
<tr>
<td> Ev_Name </td>
<td><input type="text" name="name1" value="<?php echo $name;?>"></td>
</tr>
<tr>
    <td>Ev_Date</td>
    <td><input type="date" name="date1" value="<?php echo $date; ?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> 
</table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>