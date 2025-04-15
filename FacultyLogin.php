<!DOCTYPE html>
<html>
<head>
	<title>Faculty Login</title>
	<link rel="stylesheet" href="FacultyLogin.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="Lecturer">
				<form action="Lecturer/Login/Llogin1.php" method="POST">
					<label for="chk" aria-hidden="true">Lecturer Login</label>
					<input type="text" name="Lname" placeholder="User name" required="">
					<input type="password" name="Lpass" placeholder="Password" required="">
					<center>
                    <select name="branch" id="branch">
                        <?php
                            $con=mysqli_connect("localhost","root");
                            $db=mysqli_select_db($con,"AttendanceMS");
                            $query="select BranchName from branch";
                            $cmd=mysqli_query($con,$query);
                            while($row=mysqli_fetch_array($cmd))
                            {
                        ?>
                        <option value="<?php echo $row['BranchName'];?>"><?php echo $row['BranchName'];?></option>
                        <?php
                            }
                        ?>
                    </select>
						<div class="Forgot-Link1">
							<a href="Lecturer/Login/ForgotPassword.php">Forgot Password?</a>
						</div>
					</center>
					<button>Login</button>
				</form>
			</div>

			<div class="Admin">
				<form action="Admin/Login/Llogin1.php" method="POST">
					<label for="chk" aria-hidden="true">Admin Login</label>
					<input type="text" name="Aname" placeholder="User name" required="">
					<input type="password" name="Apass" placeholder="Password" required="">
					<center>
						<div class="Forgot-Link2">
							<a href="Admin/Login/ForgotPassword.php">Forgot Password?</a>
						</div>
					</center>
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>