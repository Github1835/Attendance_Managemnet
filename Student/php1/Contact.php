<?php

$name=$_POST['name'];
$email=$_POST['email'];
$no=$_POST['no'];
$message=$_POST['message'];

//Connect database
include('../../db_connect.php');

$query="INSERT INTO contact VALUES('null','$name','$email','$no','$message')";
?>