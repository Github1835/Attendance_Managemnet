<?php
    include('../../../db_connect.php');
    $query="delete from event2 where Eno=$_GET[no]";
    $cmd=mysqli_query($con,$query);
    if ($cmd)
    {
        $delete="<script>alert('Record Delete Successfully');</script>";
        echo $delete;
        echo "<script>window.location.href='delete_event2.php';</script>";
    }
    mysqli_close($con);
?>