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
        <a href="#TimeTable"  class="active">Time-Table</a>
            <a href="../StudentHome.html">Home</a>
            <a href="StudentNews.php">News</a>
            <a href="StudentAccount.php">Student Account</a>
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
        <?php
        if(isset($_SESSION['StuRollno']))
        {
        ?>
        <!-- Navigation Menu's code ends -->
        <hr>
        <center>
            <div class="cname">
                <h1>Time Table</h1>
            </div>
        </center>
        
        <img src="../Images/Screenshot (11).jpg" alt="">

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