<?php	
	session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/StudentNews.css">
        <link rel="stylesheet" href="../css/StudentAccount.css">
        <link rel="stylesheet" href="../Menu/Menu.css">
        <!-- <link rel="stylesheet" href="Extra.css"> -->
        <title>
            Letest News In BBIT
        </title>
        <style>
            table{
                margin: 2%;
                padding: 0px;
                background-color:rgba(245, 245, 245, 0.11);
            }
        </style>
    </head>
    <body>
    <?php
    if(isset($_SESSION['StuRollno']))
	{
    ?>
        <!-- Code for Navigation Menu -->

        <div class="topnav" id="myTopnav">
            <a href="#StudentAccount"  class="active">StudentAccount</a>
            <a href="../StudentHome.html">Home</a>
            <a href="StudentNews.php">News</a>
            <a href="TimeTable.php">Time-Table</a>
            <a href="MidSem.php">Mid-Sem</a>
            <a href="sessionlogin4.php">Log Out</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
        </div>
          <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
        <!-- Navigation Menu's code ends -->
        <hr>
        <center>
            <div class="cname">
                <h1>Student Account</h1>
            </div>
        </center>
        <hr>
        <!-- Student Data Section Code -->
        <center>
        <div class="studentdata">
            <table>
            <?php
            $eno=$_SESSION['StuRollno'];
            
            //Connect database
	        include('../../db_connect.php');

            $query="SELECT *FROM student WHERE StuRollno=$eno";
            $cmd=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($cmd))
            {
                $eno=$row['StuRollno'];
                $name=$row['StuName'];
                $branch=$row['Branch_ID'];
                $sem=$row['Sem'];
                $year=$row['Year'];
            ?>
                <tr>
                    <td>Enrollment number</td>
                    <td>:</td>
                    <td><?php echo $eno; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>:</td>
                    <td><?php echo $branch; ?></td>
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
                <?php } ?>
            </table>
        </div>
        </center>
        <!-- Student Data Section code End -->
        <hr>


        <!-- Attendence report section code-->
        <center>
        <div class="attendance">
        <h1>Attendance</h1>
        <hr>
            <div class="att">
            <button class="attlinks" onclick="openCity(event, 'Monthly1')">Monthly</button>
            <button class="attlinks" onclick="openCity(event, 'Daily1')">Daily</button>
            </div>

            <div id="Monthly1" class="attcontent">
            <embed src="" type="">
            data not Found 1
            </div>

            <div id="Daily1" class="attcontent">
            <embed src="" type="">
            data not Found 2
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
            <button class="chartlinks" onclick="opentab(event, 'Monthly2')">Monthly</button>
            <button class="chartlinks" onclick="opentab(event, 'Daily2')">Daily</button>
            </div>

            <div id="Monthly2" class="chartcontent">
            <embed src="" type="">
            data not Found 1
            </div>

            <div id="Daily2" class="chartcontent">
            <embed src="" type="">
            data not Found 2
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
        <?php 
        }else
	    {
	    	header('Location:../StudentLogin.html');
	    }
    ?>
    </body>
</html>