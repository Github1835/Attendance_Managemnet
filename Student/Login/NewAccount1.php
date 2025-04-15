<?php
session_start();
?>
<!DOCTYPE Html>
<Html>
    <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <Title>New Account</Title>
        <Link Rel="Stylesheet" Href="../css/StudentLogin.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            label{
                margin:40px;
                margin-top:50%;
            }
        </style>
    </Head>
    <Body>
        <?php
            if(isset($_SESSION['StuRollno'])&&isset($_COOKIE['SESSION'])==1)
            {
                $eno=$_SESSION['StuRollno'];
                $pass=$_SESSION['Password'];
                include('../../db_connect.php');
                $query="UPDATE student SET Password='$pass' WHERE StuRollno='$eno'";
                $cmd=mysqli_query($con,$query);
        ?>
            <!-- Link Form Code -->
            <Div Class="main">
                <Div Class="Container">
                    <Label>Your account is created...</Label>
                    <div class="Forgot-Link1" style="margin:20%;">
                    <center>
                        <a href="../StudentLogin.html">Home</a>
                   </center>
                </div>
                </Div>
            </Div>
            <!-- Link form code Ends -->
        <?php
            session_destroy();
            }
            else
            {
                echo "<script>window.location.href='../Signup.html';</script>";
            }
        ?>
    </Body>
</Html>
    </body>
</html>