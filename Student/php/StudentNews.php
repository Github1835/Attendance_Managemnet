<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/StudentNews.css">
        <link rel="stylesheet" href="../Menu/Menu.css">
        <link rel="stylesheet" href="../Menu/Footer.css">
        <!-- <link rel="stylesheet" href="Extra.css"> -->
        <title>
            Letest News In BBIT
        </title>
        <style>
            .topnav{
                position: relative;
            }
        </style>
    </head>
    <body>
        
        <!-- Code for Navigation Menu -->

        <div class="topnav" id="myTopnav">
            <a href="#news"  class="active">News</a>
            <a href="../StudentHome.html">Home</a>
            <a href="search.php">Search Attendance</a>
            <a href="../StudentLogin.html">Student Login</a>
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
                <h1>News Section</h1>
            </div>
        </center>
        <hr>
        <!-- Image Section Code -->
        <div class="EventImage">
            <div class="w3-content">
                <img class="EventImg" src="../Images/NewsImages/Screenshot (11).png">
                <img class="EventImg" src="../Images/NewsImages/Screenshot (10).png">
                <img class="EventImg" src="../Images/NewsImages/Screenshot (8).png">
                <img class="EventImg" src="../Images/NewsImages/Screenshot (9).png">
            </div>
            <center>
                <div class="change-event-image bt1" onclick="plusDivs(-1)">&#10094;</div>
                <div class="change-event-image bt2" onclick="plusDivs(1)">&#10095;</div>
            </center>
        </div>
        <script>
        var slideIndex = 1;
        showDivs(slideIndex); 
        
        function plusDivs(n) {
            showDivs(slideIndex += n);
        }
        
        function currentDiv(n) {
            showDivs(slideIndex = n);
        }
        
        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("EventImg");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " w3-white";
        }
        </script>
        <!-- Image Section code End -->
        <br><br><br><br><br>
        <hr>
        <!-- News and updates section code-->
        <h1>Latest News at BBIT</h1>
        <hr>
        <div class="data1">
        <marquee direction="up" scrollamount="2">
            <ul>
            
            <?php
                //Connect database
	            include('../../db_connect.php');

                $select="SELECT *FROM event1";
                $query=mysqli_query($con,$select);
                while($row=mysqli_fetch_array($query))
                {
                    $Name=$row['Name'];
                    $path=$row['Path'];
            ?>
                <li><a href="<?php echo $path; ?>"><?php echo $Name; ?></a></li>
            <?php } ?>
            
            </ul>
            </marquee>
        </div>
        <!-- news and updates section End -->
        <hr>
        <!-- Event section code -->
        <h1>New Events and Dates</h1>
        <hr>
        <center>
        <table style="overflow-x:auto;" cellpadding=5%>
        <tr>
        <th>Ev_name</th>
        <th>Ev_date<th>
        </tr>
            <?php
                $select="SELECT *FROM event2";
                $query=mysqli_query($con,$select);
                while($row=mysqli_fetch_array($query))
                {
                    $Eno=$row['Eno'];
                    $Ev_name=$row['Ev_name'];
                    $Ev_date=$row['Ev_date'];
            ?>
        <tr>
            <td><?php echo $Ev_name; ?></td>
            <td><?php echo $Ev_date; ?></td>
        </tr>
        <?php }?>
        </table>
        </center>
        <!-- Event section code end -->

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
    </body>
</html>