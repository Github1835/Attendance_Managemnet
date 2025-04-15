<?php
        $date=date("Y-m");
        $eno=$_SESSION['StuRollno'];

        $query="select Sem from student where StuRollno='$eno'";
        $cmd=mysqli_query($con,$query);
        $sem=mysqli_fetch_array($cmd);
        $sem=$sem['Sem'];
        
        $query="select * from subject where Sem='$sem'";
        $cmd=mysqli_query($con,$query);
        $snum=mysqli_num_rows($cmd);

        $query="select Sub_ID from subject where Sem='$sem'";
        $cmd1=mysqli_query($con,$query);
        $per=0;

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
            $per=0;
            else
            $per+=ceil($status*100/$num);
        }
        $snum*=100;
        $total=ceil($per*100/$snum);
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<canvas id="newChart"></canvas>
  <script src="script.js"></script>
  <script>
      // Define the data for the chart
var data = {
  labels: ['Present', 'Absent'],
  datasets: [{
    label: 'Total Attendance',
    data: [<?php echo $total;?>, <?php echo (100-$total);?>],
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
      text: 'Total Attendance Pie Chart'
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