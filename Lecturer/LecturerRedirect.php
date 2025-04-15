<?php
session_start();

$_SESSION['checkall']=0;
?>
<html>
    <head>
        <title>Redirect</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Menu/Menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            body{
                background: linear-gradient(to bottom right, #ff69b4, #9400d3);
            }
            .image1{
                float: left;
                margin-top: 18%;
                height: 60px;
                width: 60px;
                background-color: white;
                box-shadow: 0 0 9px rgba(0, 0, 0, 0.9), inset 0 0 0px rgba(0, 0, 0, 0.4);
                border-radius: 5px;
                margin-left: 45%;
            }
            .image1 img{
                height: 50px;
                width: 50px;
            }
            .image1:hover{
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.9), inset 0 0 0px rgba(0, 0, 0, 0.4);
            }
            .image2{
                float: left;
                margin-top: 18%;
                height: 60px;
                width: 60px;
                background-color: white;
                box-shadow: 0 0 9px rgba(0, 0, 0, 0.9), inset 0 0 0px rgba(0, 0, 0, 0.4);
                border-radius: 5px;
                margin-left: 2%;
            }
            .image2 img{
                height: 50px;
                width: 50px;
            }
            .image2:hover{
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.9), inset 0 0 0px rgba(0, 0, 0, 0.4);
            }
            @media screen and (max-width:600px) {
                .image1{
                    margin-top: 50%;
                    margin-left: 35%;
                }
                .image2{
                    margin-top: 50%;
                }
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_SESSION['Lect_ID'])==1)
            {   
        ?>
        <!-- Code for Navigation Menu -->
        <div class="topnav" id="myTopnav">
            <a href="#" class="active"><?php if(isset($_SESSION['Subject'])==1){echo $_SESSION['Subject'];}else{echo "Select Sub";} ?></a>
            <?php
            //Connection to HOST
            include("../db_connect.php");

            $lid=$_SESSION['Lect_ID'];
            $query="SELECT Sub_ID FROM lect_sub WHERE Lect_ID='$lid'";
            $cmd=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($cmd))
            {
                $sid=$row['Sub_ID'];
                $query1="SELECT SubName FROM subject WHERE Sub_ID='$sid'";
                $cmd1=mysqli_query($con,$query1);
                $sub=mysqli_fetch_array($cmd1)
            ?>
            <a href="SubSelect.php?Sub=<?php echo $sub['SubName'];?>"><?php echo $sub['SubName'];?></a>
            <?php
            }
            ?>
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
        <div class="image1">
            <center><a href="LecturerHome.php"><img src="Image/Mange.png" alt=""></a></center>
        </div>
        <div class="image2">
            <center><a href="php/AttendanceInsert.php"><img src="Image/Attendance.jpg" alt=""></a></center>
        </div>
        <?php
            }
            else
            {
                echo "<script>window.location.href='../FacultyLogin.html';</script>";
            }
        ?>
    </body>
</html>