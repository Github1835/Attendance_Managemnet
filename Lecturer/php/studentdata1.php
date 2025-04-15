<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
?>

<html>
<head>
<title>Student Data</title>
<link rel="stylesheet" href="../../Student/css/StudentNews.css">
<link rel="stylesheet" href="../../Student/css/StudentAccount.css">
<style>
    h1{
        background-color:#333; color:white;
    }
</style>
</head>
<body>
    <center>
    <h1 style="background-color:#333; color:white;">Student Data</h1>
    <table>
        <?php
            
            include('../../db_connect.php');
            
            $eno=$_GET['StuRollno'];
            $_SESSION['StuRollno']=$eno;
            
            $query="select * from student where StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);
            
            $br=mysqli_fetch_array($cmd);
            $branch=$br['Branch_ID'];
            
            $query="select BranchName from branch where Branch_ID='$branch'";
            $cmd=mysqli_query($con,$query);
            $br=mysqli_fetch_array($cmd);
            $branch=$br['BranchName'];
            
            $query="select * from student where StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);

            while($row=mysqli_fetch_array($cmd))
            {
                $eno=$row['StuRollno'];
                $name=$row['StuName'];
                $gender=$row['Gender'];
                $email=$row['Email_ID'];
                $contact=$row['Contact_no'];
                $sem=$row['Sem'];
                $year=$row['Year'];
        ?>
       <tr>
           <td>Enrollment no</td>
           <td>:</td>
           <td><?php echo $eno; ?></td>
       </tr>
       <tr>
           <td>Name</td>
           <td>:</td>
           <td><?php echo $name; ?></td>
       </tr>
         <tr>
           <td>Gender</td>
           <td>:</td>
           <td><?php echo $gender; ?></td>
       </tr>
       <tr>
           <td>Contact</td>
           <td>:</td>
           <td><?php echo $contact; ?></td>
       </tr>
         <tr>
           <td>Sem</td>
           <td>:</td>
           <td><?php echo $sem; ?></td>
       </tr>
       <tr>
           <td>Year</td>
           <td>:</td>
           <td><?php echo $year; ?></td>
       </tr>
       <tr>
           <td>Branch</td>
           <td>:</td>
           <td><?php echo $branch; ?></td>
       </tr>
    <?php } ?>
</table>
<table>
    <tr>
        <th>Subject ID</th>
        <th>Subject Name</th>
        <th>Obtain Marks</th>
    </tr>
    <?php
          //code for mid_marks
            $query="select * from mid_marks where StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);

            while($row=mysqli_fetch_array($cmd))
            {
                $eno=$row['StuRollno'];
                $sub_id=$row['Sub_ID'];
                $sub_name=$row['SubName'];
                $obt_marks=$row['obt_marks'];
        ?>

       <tr>
           <td><?php echo $sub_id; ?></td>
           <td><?php echo $sub_name; ?></td>
           <td><?php echo $obt_marks; ?></td>
       </tr>

<?php } ?>
    </table>
    </center>
    <!-- Attendence report section code-->
        <center>
        <div class="attendance">
        <h1>Attendance</h1>
        <hr>
            <div class="att">
            <button class="attlinks" onclick="openCity(event, 'Daily1')">Daily</button>
            <button class="attlinks" onclick="openCity(event, 'Monthly1')">Monthly</button>
            </div>

            <div id="Daily1" class="attcontent">
            <?php include('../../Student/php/DailyAttendanceTable(StuAcc).php'); ?>
            </div>

            <div id="Monthly1" class="attcontent">
            <?php include('../../Student/php/MonthlyAttendanceTable(StuAcc).php'); ?>
            </div>
        </div>
        </center>
        <script>
            function openCity(evt, type) {
            var i, attcontent, tablinks;
            attcontent = document.getElementsByClassName("attcontent");
            for (i = 0; i < attcontent.length; i++) {
                attcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("attlinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(type).style.display = "block";
            evt.currentTarget.className += " active";
            }
            </script>
        <!-- Attendence report section End -->

        <!-- Attendaance Chart section code -->
        <center>
        <div class="chart">
        <h1>Attendance Chart</h1>
        <hr>
            <div class="attchar">
            <button class="chartlinks" onclick="opentab(event, 'Subject')">Subject</button>
            <button class="chartlinks" onclick="opentab(event, 'Total')">Total</button>
            </div>

            <div id="Subject" class="chartcontent">
            <?php include('../../Student/php/MonthlyAttendanceChart(StuAcc).php'); ?>
            </div>

            <div id="Total" class="chartcontent">
            <?php include('../../Student/php/TotalAttendanceChart(StuAcc).php'); ?>
            </div>
        </center>
        <script>
            function opentab(evt, type) {
            var j, chartcontent, chartlinks;
            chartcontent = document.getElementsByClassName("chartcontent");
            for (j = 0; j < chartcontent.length; j++) {
                chartcontent[j].style.display = "none";
            }
            chartlinks = document.getElementsByClassName("chartlinks");
            for (j = 0; j < chartlinks.length; j++) {
                chartlinks[j].className = chartlinks[j].className.replace(" active", "");
            }
            document.getElementById(type).style.display = "block";
            evt.currentTarget.className += " active";
            }
            </script>
        </div>
        </center>
        <!-- Attendaance Chart section code end -->
</body>
</html>

<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>