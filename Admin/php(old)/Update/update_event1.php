<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$no=$_POST['no1'];
$name=$_POST['name1'];
$path1=$_POST['path1'];

include('../../../db_connect.php');
$query="update event1 set Name='$name',Path='$path1' where No=$no;";
$cmd=mysqli_query($con,$query);
if($cmd){
    $update="<script>alert('Record Successfully Updated');</script>";
    echo $update;
    echo "<script>window.location.href='../Delete/delete_event1.php';</script>";
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
$query="select * from event1 where no=$_GET[no]";
$cmd=mysqli_query($con,$query);
$row=mysqli_fetch_array($cmd);
$no=$row['No'];
$name=$row['Name'];
$path=$row['Path'];
?>
<form method="POST">
<table border="1">
<tr>
<td>No</td>
<td><input type="number" name="no1" value="<?php echo $no;?>"></td>
</tr>
<tr>
<td> Name </td>
<td><input type="text" name="name1" value="<?php echo $name;?>"></td>
</tr>
<tr>
<td> Path </td>
<td><input type="text" name="path1" value="<?php echo $path;?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
</tr> </table>
<?php mysqli_close($con); ?>
</form>
</body>
</html>