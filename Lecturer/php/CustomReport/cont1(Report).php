<?php
    session_start();
    if(isset($_SESSION['Lect_ID'])==1)
    {
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .hide {
              display: none;
            }
            .myDIV:hover+.hide{
              display: block;
              color: black;
            }
        </style>
        
    </head>
    <link rel="stylesheet" href="../../css/Insert.css">
    <body>
        <center>
        <div class="studata">
        <table style="margin-top:0;" cellspacing="5px">
            <tr>
                <th>Enrollment no</th>
                <th>Attendance</th>
                <Button onclick="downl()">Print</Button>
            </tr>
            <?php
                include('../../../db_connect.php');

                $lid=$_SESSION['Lect_ID'];
                $sname=$_SESSION['Subject'];
                
                $from_date=$_SESSION['fdate'];
                $to_date=$_SESSION['tdate'];
                
                $query="select Sub_ID,Sem from subject where SubName='$sname'";
                $cmd=mysqli_query($con,$query);
                $x=mysqli_fetch_array($cmd);
                $sid=$x['Sub_ID'];
                $sem=$x['Sem'];
                
                $query="select Branch_ID from sub_br where Sub_ID='$sid'";
                $cmd=mysqli_query($con,$query);
                $bid=mysqli_fetch_array($cmd);
                $bid=$bid['Branch_ID'];
                
                $query="select StuRollno from attendance where Lect_ID='$lid' AND Sub_ID='$sid'";
                $cmd1=mysqli_query($con,$query);
                
                $query="select StuRollno from student where Sem='$sem' AND Branch_ID='$bid'";
                $cmd2=mysqli_query($con,$query);
                $new=array();
                $i=0;
                while($rec=mysqli_fetch_array($cmd2))
                {
                    $new[$i]=$rec['StuRollno'];
                    $i++;
                }
                krsort($new);
                $e=0; $count=count($new);
                
                while ($row=mysqli_fetch_array($cmd1)) {
                    $eno=$row['StuRollno'];
                    $date=date('Y-m',strtotime('last month'));
                    if($e>=$count)
                    {
                        break;
                    }
                        if($new[$e]==$eno)
                        {
                            $n=array_pop($new);
                            $e++;
                            
                        $eno=$n;
                        $query="select Status from attendance where StuRollno='$eno' AND ADate between '$from_date' and '$to_date' AND Sub_ID='$sid'";
                        $cmd3=mysqli_query($con,$query);
                        
                        $num=mysqli_num_rows($cmd3);
                        $status=0;
                        
                        $query="select StuName from student where StuRollno='$eno'";
                        $cmd5=mysqli_query($con,$query);
                        $name=mysqli_fetch_array($cmd5);
                        $name=$name['StuName'];
                        
                        $query="select Status from attendance where StuRollno='$eno' AND ADate between '$from_date' and '$to_date' AND Sub_ID='$sid'";
                        $cmd4=mysqli_query($con,$query);
                        
                        while($row=mysqli_fetch_array($cmd4))
                        {
                            $status+=$row['Status'];
                        }
                        if($status==0||$num==0)
                        $per=0;
                        else
                        $per=ceil($status*100/$num);
                            
                        }
                        else
                        {
                            continue;
                        }
                        $pers=$_SESSION['pers'];
                        if($per<=$pers)
                        {
                    ?>
                    <tr class="tb">
                        <td>
                            <div class="myDIV"><?php echo $eno;?></div>
                            <div class="hide"><?php echo $name;?></div>
                        </td>
                        <td>
                            <?php echo $per."%"; ?>
                        </td>
                    </tr>
                    <?php
                        }
                    if($rec!=1)
                    {
                        $rec--;
                    }else
                    {
                        break;
                    }
                }
            ?>
        </table>
        </div>
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>
<script>
    function downl()
    {
        window.open("Report.php","_BLANK");
    }
</script>