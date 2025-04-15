<?php
session_start();
?>
<html>
    <head>
        <title>Lecturer Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Lecturer/Menu/Menu.css">
        <link rel="stylesheet" href="Lecturer/css/LecturerHome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body bgcolor="white">
        <?php
            if(isset($_SESSION['Lect_ID'])==1)
            {
        ?>
         <!--code for side menu -->
        <div class="side-menu">
            
            <form action="LecturerHome.php" method="POST">
                <ul type="none">
                    <li><input type="submit" value="Take Attendance" name="container1"></li>
                    <li><input type="submit" value="View Attendance" name="container1"></li>
                    <li><input type="submit" value="Update Attendance" name="container1"></li>
                    <li><input type="submit" value="Student Data" name="container1"></li>
                    <li><input type="submit" value="Mid-Marks" name="container1"></li>
                    <li><input type="submit" value="Report" name="container1"></li>
                    <li><input type="submit" value="Settings" name="container1"></li>
                    <!--<li><input type="submit" value="Alert" name="container1"></li>-->
                </ul>
            </form>
        </div>
        <!-- End of side-menu -->

        <!-- Code for Navigation Menu -->
        <div class="topnav" id="myTopnav">
            <a href="#Home" class="active">
            <?php
                if(isset($_SESSION['Subject'])==1){
                echo $_SESSION['Subject'];
                }else
                {
                    echo '<script type="text/javascript"> '; 
                    echo '  if (confirm("Subject is not selected")) {}';  
                    echo '    document.location = "LecturerRedirect.php";';
                    echo '</script>';
                }
            ?>
            </a>
            <a href="../FacultyLogin.html">Admin Login</a>
            <a href="../Student/StudentHome.html">Student Home</a>
            <a href="../Student/php/StudentNews.php">News</a>
            <!--<a href="../multiSC.html">Multi Screen</a>-->
            <a href="LecturerRedirect.php">Switch Subject</a>
            <a href="Login/Llogin2.php">Log out</a>
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

        

        <!-- code for embed container -->
        <div class="container">
        <!--<embed src="<?php //if(isset($_POST['container1'])){ echo "php/".$_POST['container1']; }else{ echo "php/Take Attendance"; } ?>.php" type="text/html" id="embed">-->
        <embed src="newlayout.php" type="text/html" id="embed">
        </div>
         container code end 

        <?php
        }
        else
        {
            echo "<script>window.location.href='../FacultyLogin.html';</script>";
        }
        ?>
    </body>
</html>