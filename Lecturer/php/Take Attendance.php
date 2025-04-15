<?php session_start(); 
if(isset($_SESSION['Lect_ID'])==1)
	{
?>
<html>
<head>
	<title>Dynamic Buttons</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			background: linear-gradient(to bottom right, #ff69b4, #9400d3);
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}
		.button-container {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		button{
		    text-decoration:none;
			background-color: #fff;
			color: #000;
			padding: 10px 20px;
			margin: 10px;
			border-radius: 5px;
			border: none;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
		}
		button:hover{
		    box-shadow:0 0 4px 4px #333;
		}
	</style>
</head>
<body>
    <?php
    //Connection to HOST
      include("../../db_connect.php");

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
        <form action="Take Attendance2.php" method="POST">
        <div class="button-container">
		<button value="<?php echo $sub['SubName'];?>" name="sub"><?php echo $sub['SubName'];?></button>
	</div>
            <?php
            }
            ?>
</body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>