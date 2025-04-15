<?php
session_start();
?>
<!DOCTYPE Html>
<Html>
    <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <Title>Password Changed</Title>
        <link rel="stylesheet" href="../../FacultyLogin.css">
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
            if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
            {
        ?>
            <!-- Link Form Code -->
            <Div Class="main">
                <Div Class="Container">
                    <Label>Password Is Changed...</Label>
                </Div>
                <div class="Forgot-Link1">
                    <center>
                        <a href="../../FacultyLogin.html">Home</a>
                   </center>
                </div>
            </Div>
            <!-- Link form code Ends -->
        <?php
            session_destroy();
            }
            else
            {
                header("location:ForgotPassword.php");
                echo "<script>window.location.href='ForgotPassword.php';</script>";
            }
        ?>
    </Body>
</Html>
    </body>
</html>