<?php
    session_start();
    if(isset($_SESSION['Lect_ID'])==1)
	{
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/Insert.css">
        <style>
        body{
            
        }
        </style>
    </head>
    
    <body>
            <?php
                include('../../../db_connect.php');

                $lid=$_SESSION['Lect_ID'];
                $sname=$_SESSION['Subject'];
                $pers=$_SESSION['pers'];
                
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
                
                $per=array();
                $stueno=array();
                $i=0;
                
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
                        
                        $query="select Status from attendance where StuRollno='$eno' AND ADate between '$from_date' and '$to_date' AND Sub_ID='$sid'";
                        $cmd4=mysqli_query($con,$query);
                        
                        while($row=mysqli_fetch_array($cmd4))
                        {
                            $status+=$row['Status'];
                        }
                        
                        if($num!=0)
                        {
                            $newper=ceil($status*100/$num);
                            if($newper<=$pers)
                                $per[$i]=$newper;
                        }else
                        {
                            $per[$i]=0;
                        }
                        if($newper<=$pers)
                        {
                            $stueno[$i]=substr($eno,8,4);
                            $i++;
                        }
                    if($rec!=1)
                    {
                        $rec--;
                    }else
                    {
                        break;
                    }
                        }
                        else
                        {
                            continue;
                        }
                }
            ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <center>
    <div class="studata">
<canvas id="myChart"></canvas>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php $i=0; foreach($stueno as $value) {
            if($i==0)
            {
                echo "'$value'";
                $i++;
            }else
            {
                echo ",'$value'";
            }
        } ?>],
        datasets: [{
            label: 'Custom Attendance Chart',
            data: [<?php $i=0; foreach($per as $value) {
            if($i==0)
            {
                echo "$value";
                $i++;
            }else
            {
                echo ",$value";
            }
            if($value<75)
            {
                $color="rgb(255, 53, 61 ,0.3)";
                $border="rgb(255, 53, 61 ,1)";
            }else if($value>=75&&$value<=90)
            {
                $color="rgb(255, 165, 0 ,0.3)";
                $border="rgb(255, 165, 0 ,1)";
            }else
            {
                $color="rgb(60, 179, 113 ,0.3)";
                $border="rgb(60, 179, 113 ,1)";
            }
        } ?>,100],
            backgroundColor: [
                <?php
                $i=0;
                foreach($per as $value)
                {
                    if($value<75)
                    {
                        $color="rgb(255, 53, 61 ,0.3)";
                    }else if($value>=75&&$value<90)
                    {
                        $color="rgb(255, 165, 0 ,0.3)";
                    }else
                    {
                        $color="rgb(60, 179, 113 ,0.3)";
                    }
                    
                    if($i==0)
                    {
                        echo "'$color'";
                        $i++;
                    }else
                    {
                        echo ",'$color'";
                    }
                }
                ?>
            ],
            borderColor: [
                <?php
                $i=0;
                foreach($per as $value)
                {
                    if($value<75)
                    {
                        $color="rgb(255, 53, 61 ,1)";
                    }else if($value>=75&&$value<90)
                    {
                        $color="rgb(255, 165, 0 ,1)";
                    }else
                    {
                        $color="rgb(60, 179, 113 ,1)";
                    }
                    
                    if($i==0)
                    {
                        echo "'$color'";
                        $i++;
                    }else
                    {
                        echo ",'$color'";
                    }
                }
                ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Bar Name'
                }
            }]
        }
    }
});
</script>
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>