<?php
include 'db.php';
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {
            $i=0;
		  	$file = fopen($filename, "r");
	         while (($stuData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	            
	           if($i==0)
	           {
	               $i=1;
	               continue;
	           }
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into student values('$stuData[0]','$stuData[1]','$stuData[2]','$stuData[3]','$stuData[4]',$stuData[5],$stuData[6],null,'$stuData[7]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );
				if(! $result )
				{
					echo '<script type="text/javascript">
							alert("Invalid File:Please Upload CSV File.");
							window.location ="index.php"
						</script>';
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo '<script type="text/javascript">
						alert("CSV File has been successfully Imported.");
						window.location = "index.php"
					</script>';

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}	 
?>
<html>
    <head>
        <title>Import</title>
    </head>
    <body>
        
    </body>
</html>