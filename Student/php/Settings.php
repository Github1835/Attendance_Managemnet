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
            Settings
        </title>
        <style>
            .cname{
                margin-top:3%;
            }
            input{
                padding:10px;
            }
            input[type="submit"]{
                background-color: rgb(0, 68, 255);
                color: white;
                border-radius: 10px;
                border: 0px;
            }
            input[type="submit"]:hover{
                background-color: rgba(19, 165, 0, 0.733);
                transition: all 0.4s;
            }
            input[type="email"],input[type="password"]{
                background-color: rgba(255, 255, 255, 0.61);
                width: 50%;
            }
            @media screen and (max-width:600px) {
                .cname{
                margin-top:13%;
            }
            input[type="email"],input[type="password"]{
                width: 100%;
            }
            }
        </style>
    </head>
    <body>
        <?php
        if(isset($_SESSION['StuRollno'])==1)
        {
            
            include('../../db_connect.php');
            $eno=$_SESSION['StuRollno'];
            $query="select Email_ID from student where StuRollno='$eno'";
            $cmd=mysqli_query($con,$query);
            $email=mysqli_fetch_array($cmd);
        ?>
        <!-- Code for Navigation Menu -->

        <div class="topnav" id="myTopnav">
        <a href="#TimeTable"  class="active">Settings</a>
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
        
        <!-- Navigation Menu's code ends -->
        <hr>
        <center>
            <div class="cname">
                <h1>Settings</h1>
            </div>
        </center>
        
        <!--settings section-->
        <center>
        <table border="1">
            <form method="POST" action="ChangeData.php">
                <tr>
                    <td>Change Email: </td>
                    <td><input type="email" name="Semail" value="<?php echo $email['Email_ID'];?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Change Email" name="submit"></td>
                </tr>
                </form>
                <form method="POST" action="ChangeData.php">
                <tr>
                    <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="npass" placeholder="New Password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="cpass" placeholder="Confirm Password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $_SESSION['Password'];?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Change Password" name="submit"></td>
                </tr>
                </form>
                <form method="POST" action="ChangeData.php">
                <tr>
                    <td>Delete This Account: </td>
                    <td><?php echo $_SESSION['StuRollno'];?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Delete Account" name="submit"></td>
                </tr>
            </form>
        </table>
        </center>
        
        <!--settings section end-->

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
	        echo "<script>window.location.href='../StudentLogin.html';</script>";
	    }
    ?>
    </body>
</html>