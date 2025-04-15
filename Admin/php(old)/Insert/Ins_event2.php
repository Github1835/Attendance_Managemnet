<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $evno=$_POST['evno'];
        $evname=$_POST['evname'];
        $evdate=$_POST['date'];
        
        include('../../../db_connect.php');
        $insert="insert into event2 values('$evno','$evname','$evdate');";
        $query=mysqli_query($con,$insert);
        if($query){
            $insert="<script>alert('Record Inserted Successfully');</script>";
            echo $insert;
        }
        else
            die(mysqli_error($con));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event 2 Data</title>
    
</head>
<body>
    <form action="Ins_event2.php" method="POST">
        <table>
            <tr>
                <th>Event No</th>
                <td><input type="number" name="evno" placeholder="Enter Event no"></td>
            </tr>
            <tr>
                <th>Event Name</th>
                <td><input type="text" name="evname" placeholder="Enter Name"></td>
            </tr>
            <tr>
                <th>Enter Event Date</th>
                <td><input type="date" name="date" value="date('Y-m-d')"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>