<?php
session_start();
?>
<html>
    <head>
        <title>Admin Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Menu/Menu.css">
        <link rel="stylesheet" href="css/AdminHome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- code for side menu -->
        <div class="side-menu">
<form action="AdminHome.php" method="POST">-->
  <ul>
    <li><input type="submit" value="Admin" name="container1"></li>
    <li><input type="submit" value="Lecturer" name="container1"></li>
    <li><input type="submit" value="Student" name="container1"></li>
    <li><input type="submit" value="Branch" name="container1"></li>
    <li><input type="submit" value="Subject" name="container1"></li>
    <li><input type="submit" value="lect_sub" name="container1"></li>
    <li><input type="submit" value="sub_br" name="container1"></li>
    <li><input type="submit" value="Scrolling News" name="container1"></li>
    <li><input type="submit" value="Event Table" name="container1"></li>
    
  </ul>
  </form>
</div>

        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">Admin</a>
            <a href="../Student/StudentHome.html">Student Home</a>
            <a href="../Student/php/StudentNews.php">News</a>
            <a href="Login/ALogin2.php">Logout</a>
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
        <!--<embed src="<?php if(isset($_POST['container1'])){ echo "php/".$_POST['container1']; }else{ echo "php/Admin"; } ?>.php" type="text/html" id="embed">-->
        
        </div>
        <!-- container code end -->
    </body>
</html>