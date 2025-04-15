<!DOCTYPE html>
<?php 
	include 'db.php';
	


?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Update Student</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Update Students</a>
				
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="Update2.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large" required>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							<a href="Student.php" class="btn btn-primary button-loading">Back</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
        <br><br>
        <h4>File must follow this format:</h4>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Enrollment no</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact no</th>
                    <th>Sem</th>
                    <th>Year</th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tr>
                <th>206040307010</th>
                <th>Shaili</th>
                <th>F</th>
                <th>shaili@gmail.com</th>
                <th>5458965741</th>
                <th>6</th>
                <th>3</th>
                <th>BRANCH07</th>
            </tr>
    
        </table>

	</div>

	</div>
  

	</body>
</html>