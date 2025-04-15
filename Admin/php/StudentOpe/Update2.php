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
	           $sql = "update student set StuName='$stuData[1]',Gender='$stuData[2]',Email_ID='$stuData[3]',Contact_no='$stuData[4]',Sem=$stuData[5],Year=$stuData[6],Branch_ID='$stuData[7]' where StuRollno='$stuData[0]'";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );
				if(! $result )
				{
					echo '<script type="text/javascript">
							alert("Invalid File:Please Upload CSV File.");
							window.location = "Update.php"
						</script>';
						
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo '<script type="text/javascript">
						alert("CSV File has been successfully Imported.");
						window.location = "Update.php"
					</script>';

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}	 
?>		 