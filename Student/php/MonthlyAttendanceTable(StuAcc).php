<table>
    <tr>
        <th>Subject</th>
        <th>Percentage</th>
    </tr>
    <?php
        include('../../db_connect.php');

        $date=date("Y-m");
        $eno=$_SESSION['StuRollno'];

        $query="select Sem from student where StuRollno='$eno'";
        $cmd=mysqli_query($con,$query);
        $sem=mysqli_fetch_array($cmd);
        $sem=$sem['Sem'];

        $query="select Sub_ID from subject where Sem='$sem'";
        $cmd1=mysqli_query($con,$query);

        while($sid=mysqli_fetch_array($cmd1))
        {
            $sid=$sid['Sub_ID'];
            
            $query="select Status from attendance where StuRollno='$eno' AND ADate like '$date%' AND Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            
            $num=mysqli_num_rows($cmd);
            $status=0;
            
            $query="select Status from attendance where StuRollno='$eno' AND ADate like '$date%' AND Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            
            while($row=mysqli_fetch_array($cmd))
            {
                $status+=$row['Status'];
            }
            if($num==0)
            {
                $per=0;
            }else
            
            if($num!=0)
            $per=ceil($status*100/$num);
            else
            $per=0;

            $query="select SubName from subject where Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            $sname=mysqli_fetch_array($cmd);
            $sname=$sname['SubName'];
        ?>
        <tr>
            <td><?php echo $sname; ?></td>
            <td><?php echo $per."%"; ?></td>
        </tr>
        <?php
        }

    ?>
</table>
