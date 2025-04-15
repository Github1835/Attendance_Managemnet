<?php
    session_start();
    include('../../../db_connect.php');
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="http://localhostdotdev.com/favicon.ico" rel="icon" type="image/x-icon" />
        <title>&lrm;</title>
    </head>
    <body>
        <center>
        <div class="container">
        <center><h3 style="width: 100%;">Attendance Report</h3></center><hr>
        <div class="row row-cols-2">
            <?php 
                $lid=$_SESSION['Lect_ID'];
                $sname=$_SESSION['Subject'];
                $pdate=date("d-m-Y");

                $query="select LectName from lecturer where Lect_ID = '$lid'";
                $cmd=mysqli_query($con,$query);
                $row=mysqli_fetch_array($cmd);
                $lname=$row['LectName'];

                $query="select Sub_ID from subject where SubName = '$sname'";
                $cmd=mysqli_query($con,$query);
                $row=mysqli_fetch_array($cmd);
                $sid=$row['Sub_ID'];
            ?>
            <div class="col" style="text-align: left;">
                Subject: <?php echo $sname; ?>
            </div>
            <div class="col" style="text-align: right;">
                Date: <?php echo $pdate;?>
            </div>
            <div class="col" style="text-align: left;">
                Code: (<?php echo $sid; ?>)
            </div>
            <div class="col" style="text-align: Right;">
                From: <?php echo date("01-m-Y",strtotime('last month'));?>
            </div>
            <div class="col" style="text-align: left;">
                Lecturer Name: <?php echo $lname; ?>
            </div>
            <div class="col" style="text-align: Right;">
                To: <?php echo date("t-m-Y",strtotime('last month'));?>
            </div>
            <div class="col" style="text-align: left;">
                <Button onclick="window.print();" class="btn btn-sm btn-outline-secondary">Print Report</Button>
            </div>
        </div>
        <div class="studata">
        <div class="table-responsive">
        <table style="margin-top:0;" cellspacing="5px" class="table table-striped">
            <center>
                <thead>
                    <tr>
                        <th style="text-align: center;">Enrollment no</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Attendance</th>
                        <th style="text-align: center;">Sign</th>
                    </tr>
                </thead>
            </center>
            <?php

                $lid=$_SESSION['Lect_ID'];
                $sname=$_SESSION['Subject'];
                
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
                        $query="select Status from attendance where StuRollno='$eno' AND ADate like '$date%' AND Sub_ID='$sid'";
                        $cmd3=mysqli_query($con,$query);
                        
                        $num=mysqli_num_rows($cmd3);
                        $status=0;
                        
                        $query="select StuName from student where StuRollno='$eno'";
                        $cmd5=mysqli_query($con,$query);
                        $name=mysqli_fetch_array($cmd5);
                        $name=$name['StuName'];
                        
                        $query="select Status from attendance where StuRollno='$eno' AND ADate like '$date%' AND Sub_ID='$sid'";
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
                    ?>
                    <tr class="tb">
                        <td style="text-align: center;"><?php echo $eno;?></td>
                        <td><?php echo $name;?></td>
                        <td style="text-align: center;">
                            <?php echo $per."%"; ?>
                        </td>
                        <td class="border-1 border-dark"></td>
                    </tr>
                    <?php
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
        </div>
        </div>
    </body>
</html>