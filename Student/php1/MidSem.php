<?php	
	session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/StudentNews.css">
        <link rel="stylesheet" href="../Menu/Menu.css">
        <link rel="stylesheet" href="../Menu/Footer.css">
        <!-- <link rel="stylesheet" href="Extra.css"> -->
        <title>
            Time Table
        </title>
        <style>
            .cname{
                margin-top:3%;
            }
            img{
                height: auto;
                width:100%;
            }
            @media screen and (max-width:600px) {
                .cname{
                margin-top:13%;
            }
            }
        </style>
    </head>
    <body>
        
        <!-- Code for Navigation Menu -->

        <div class="topnav" id="myTopnav">
            <a href="#Mid-Sem" class="active">Mid-Sem</a>
            <a href="../StudentHome.html">Home</a>
            <a href="StudentNews.php">News</a>
            <a href="StudentAccount.php">Student Account</a>
            <a href="TimeTable.php">Time-Table</a>
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
        <?php
        if(isset($_SESSION['StuRollno']))
        {
        ?>
        <!-- Navigation Menu's code ends -->
        <hr>
        <center>
            <div class="cname">
                <h1>Mid Semester Result</h1>
            </div>
        </center>
        <center>
        <table border="1">
            <tr>
            <th>Sub_name</th>
            <th>Sub_code</th>
            <th>Obtain Marks</th>
            </tr>
        <?php
            $eno=$_SESSION['StuRollno'];

            //Connect database
	        include('../../db_connect.php');

            $query="SELECT *FROM mid_marks WHERE StuRollno=$eno";
            $cmd=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($cmd))
            {
                $Sub_code=$row['Sub_ID'];
                $Sub_name=$row['SubName'];
                $obt_marks=$row['obt_marks'];
        ?>
        <tr>
        <td><?php echo $Sub_code; ?></td>
        <td><?php echo $Sub_name; ?></td>
        <td><?php echo $obt_marks; ?></td>
        </tr>
        <?php } ?>
        </table>
        </center>
        <!-- Footer section code -->
        <div id="footer" class="uni-padding">
            <div id="add" class="column">
                <h3>CONTACT US</h3>
                <ul>
                    <li>Bhailalbhai & Bhikhabhai Institute of Technology (BBIT - Polytechnic), Charutar Vidya Mandal, Vallabh Vidyanagar.</li>
                    <br>
                    <li><b>Address</b>   : Nr. Iscon Temple, Opp. Shastri Medan, Vallabh Vidya Nagar, Anand, Gujarat, India. 3881200</li>
                    <li><b>Phone</b>   : 02692 - 237240</li>
                    <li><b>Email</b>   : principal@bbit.ac.in</li>
                </ul>
            </div>
            
        </div>
        <!-- Footer section end -->
        <?php 
        }else
	    {
	    	header('Location:../StudentLogin.html');
	    }
    ?>
    </body>
</html>