<html>
<head>
<title>Student Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../Student/css/StudentNews.css">
</head>
<body>
    <center>
    <h1 style="background-color:#333; color:white;">Student Attendance</h1>
    <table>
        <tr>
            <th>
                SubName
            </th>
            <th>
                Status
            </th>
        </tr>
        <?php
            
            include('../../db_connect.php');
            
            $eno=$_GET['StuRollno'];
            
            $date=date("Y-m-d");
            $query="select Sub_ID,Status from attendance where StuRollno='$eno' AND ADate='$date'";
            $cmd=mysqli_query($con,$query);

            while($row=mysqli_fetch_array($cmd))
            {
                $subid=$row['Sub_ID'];
                $query="select SubName from subject where Sub_ID='$subid'";
                $cmd1=mysqli_query($con,$query);
                $sname=mysqli_fetch_array($cmd1);
                $sname=$sname['SubName'];
                
                $status=$row['Status'];
        ?>
       <tr>
           <td>
               <?php echo $sname; ?>
           </td>
           <td>
               <?php if($status==0){echo "Absent"; }else{echo "Present"; } ?>
           </td>
       </tr>
    <?php } ?>
</table>
    </center>
</body>
</html>