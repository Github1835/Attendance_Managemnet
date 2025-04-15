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
            canvas{
                height:100%;
                width:100%;
            }
        </style>
    </head>
    <body>
        <center>
            <?php
                include('../../../db_connect.php');

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
                
                $query="select StuRollno from student where Sem='$sem' AND Branch_ID='$bid'";
                $cmd2=mysqli_query($con,$query);
                $total=mysqli_num_rows($cmd2);
                $total1=$total;
                $regular=0;
                
                while ($row=mysqli_fetch_array($cmd1)) {
                    $eno=$row['StuRollno'];
                    $date=date("Y-m");
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
                        
                        $query="select Status from attendance where StuRollno='$eno' AND ADate like '$date%' AND Sub_ID='$sid'";
                        $cmd4=mysqli_query($con,$query);
                        
                        while($row=mysqli_fetch_array($cmd4))
                        {
                            $status+=$row['Status'];
                        }
                        
                        if($num!=0)
                        $per=ceil($status*100/$num);
                        else
                        $per=0;
                        
                        if($per>=75)
                        {
                            $regular++;
                        }
                    if($total!=1)
                    {
                        $total--;
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
                $per=ceil($regular*100/$total1);
            ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<canvas id="newChart"></canvas>
  <script src="script.js"></script>
  <script>
      // Define the data for the chart
var data = {
  labels: ['Regular', 'Inragular'],
  datasets: [{
    label: 'Total Attendance',
    data: [<?php echo $per;?>, <?php echo (100-$per);?>],
    backgroundColor: ['green', 'red']
  }]
};

// Define the options for the chart
var options = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'top',
    },
    title: {
      display: true,
      text: 'This month\'s Total Attendance'
    }
  }
};

// Get the canvas element and render the chart
var ctx = document.getElementById('newChart').getContext('2d');
var newChart = new Chart(ctx, {
  type: 'pie',
  data: data,
  options: options
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