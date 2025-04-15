<?php
    session_start();
    if(isset($_SESSION['Lect_ID'])==1)
	{
    include("../../db_connect.php");
        
        $subject=$_SESSION['Subject'];
        
        $query="select Sub_ID from subject where SubName='$subject'";
        $cmd=mysqli_query($con,$query);
        $sid=mysqli_fetch_array($cmd);
        $sid=$sid['Sub_ID'];
        
        $stime=$_GET['Stime'];
        $etime=$_GET['Etime'];
        $date=$_GET['ADate'];
        $status=$_GET['Status'];
        $type=$_GET['Type'];
        $stuinfo=$_GET['StuInfo'];
        
        if($status=="0")
        {
            $s=1;
        }else
        {
            $s=0;
        }
        
        $d=substr("$date",5,2).substr("$date",8,2);
        
        $rollno=$_GET['StuRollno'];
            
            $Att_ID="A".$d.substr("$stime",0,2).substr("$etime",0,2).$sid.substr("$rollno",8,4);
            
            $query="update attendance set Status=$s where Att_ID='$Att_ID'";
            $result=mysqli_query($con,$query);
            //echo "<script>window.location.href='ex.php';</script>";
?>
<html>
    <head>
        <title>
            
        </title>
        <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                background-image: linear-gradient(to bottom right, #ff69b4, #9400d3);
            }
            .container {
              width: 100%;
              height: 100%;
              /* Center vertically and horizontally */
              display: flex;
              justify-content: center;
              align-items: center;
            }
            
            .child {
              width: 50%;
              height: 50%;
              background-color:white;
              justify-content:center;
              align-items:center;
              box-shadow:0 0 15px 7px;
            }
            input[type="submit"]{
                height:40px;
                width:80px;
                border-radius:5px;
                background-image: linear-gradient(to bottom right, #ff69b4, #9400d3);
                color:white;
            }
            label{
                color:black;
                font-size:30px;
            }
            .label1{
                margin:10%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="child">
                <center>
                <form action="Update Attendance.php" method="POST">
                    <input type="hidden" value="<?php echo $stime;?>" name="Stime">
                    <input type="hidden" value="<?php echo $etime;?>" name="Etime">
                    <input type="hidden" value="<?php echo $date;?>" name="date">
                    <input type="hidden" value="<?php echo $type;?>" name="Type">
                    <input type="hidden" value="<?php echo $stuinfo;?>" name="StuInfo">
                    
                    <div class="label1"><label>Attendance Updated...</label></div>
                    <input type="submit" value="OK">
                </form>
            </div>
        </div>
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>