<?php
    include('../../../db_connect.php');
    $query="delete from event1 where No=$_GET[no]";
    $cmd=mysqli_query($con,$query);
    if ($cmd)
    {
        $delete="<script>alert('Record Delete Successfully');</script>";
        echo $delete;
        echo "<script>window.location.href='delete_event1.php';</script>";
    }
    mysqli_close($con);
?>
