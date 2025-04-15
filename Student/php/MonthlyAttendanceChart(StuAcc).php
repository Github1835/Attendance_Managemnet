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
        $i=0;
        $sname=array();
        $per=array();

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
            $per=array(0);
            else
            $per[$i]=ceil($status*100/$num);

            $query="select SubName from subject where Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            $s=mysqli_fetch_array($cmd);
            $sname[$i]=$s['SubName'];
            $i++;
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php $i=0; foreach($sname as $value) {
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
            label: 'Monthly Attendance Chart',
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