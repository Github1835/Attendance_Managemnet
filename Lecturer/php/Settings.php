<?php	
	session_start();
	if(isset($_SESSION['Lect_ID'])==1)
	{

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../Student/css/StudentNews.css">
        <!-- <link rel="stylesheet" href="Extra.css"> -->
        <title>
            Settings
        </title>
        <style>
            h1{
                background-color:#333;
                color:white;
            }
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
            include('../../db_connect.php');
            $lid=$_SESSION['Lect_ID'];
            $query="select Email_ID from lecturer where Lect_ID='$lid'";
            $cmd=mysqli_query($con,$query);
            $email=mysqli_fetch_array($cmd);
        ?>
        
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
        </table>
        </center>
        
        <!--settings section end-->
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>