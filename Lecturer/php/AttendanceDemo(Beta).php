<?php
    session_start();
    if(isset($_SESSION['Lect_ID'])==1)
    {
    if(isset($_SESSION['Subject'])==1){
    }else
    {
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Subject is not selected")) {}';  
        echo '    document.location = "../LecturerRedirect.php";';
        echo '</script>';
    }
    
    include("../../db_connect.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="ALL Present"){
        if($_SESSION['checkall']==0)
        $_SESSION['checkall']=1;
        else
        $_SESSION['checkall']=0;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']!="ALL Present"){
        
        mysqli_autocommit($con,FALSE);
        
        $lid=$_SESSION['Lect_ID'];
        $subject=$_SESSION['Subject'];
        
        $query="select Sub_ID from subject where SubName='$subject'";
        $cmd=mysqli_query($con,$query);
        $sid=mysqli_fetch_array($cmd);
        $sid=$sid['Sub_ID'];
        
        $stime=$_POST['Stime'];
        $etime=$_POST['Etime'];
        $type=$_POST['type'];
        $flg=0;
        foreach($_POST['status'] as $id=>$status)
        {
            $rollno=$_POST['StuRollno'][$id];
            $date=date("Y-m-d");
            $d=date("md");
            $Att_ID="A".$d.substr("$stime",0,2).substr("$etime",0,2).$sid.substr("$rollno",8,4);
            
            $query="insert into attendance values('$Att_ID','$date','$stime','$etime','$status','$type','$lid','$sid','$rollno')";
            $result=mysqli_query($con,$query);
            if($result==false)
            {
                mysqli_rollback($con);
                $flg=1;
            }
        }
        if($flg==1)
        {
           echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Attendance is not Inserted")) {}';  
            echo '    document.location = "AttendanceDemo(Beta).php";';
            echo '</script>';
        }else
        {
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Attendance is Taken")) {}';  
            echo '    document.location = "AttendanceDemo(Beta).php";';
            echo '</script>';
        }
        mysqli_commit($con);
    }
    
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
        a{
            height:100%;
            width:100%;
            background-color:#999;
            text-decoration:none;
            padding:10px;
            color:white;
            border-radius:5px;
        }
        a:hover{
            border:0 0 3px 5px ;
        }
        @media screen and (max-width: 600px) {
            .hide {
              display: none;
            }
            .myDIV:hover+.hide{
              display: block;
              color: black;
            }
        }
        </style>
        <link rel="stylesheet" href="../css/Insert.css">
    </head>
    <body>
    <form method="post" action="AttendanceDemo(Beta).php">
        <!-- code for operation button -->
        <center>
            <div class="Operation tb">
            <table style="margin-top:0">
            <tr>
                <td>
                    <a href="../LecturerRedirect.php">Exit</a>
                </td>
                <td>
                    <label>Starting Time:</label>
            <select Name="Stime" Size="Number_of_options">  
             <option value="10:30" selected> 10:30 </option>  
              <option value="11:30 "> 11:30 </option>  
              <option value="12:30">12:30</option>  
              <option value="02:00"> 02:00</option>  
              <option value="03:00"> 03:00</option>  
              <option value="04:00"> 04:00</option>  
              <option value="05:00"> 05:00</option>  
        </select>  
                </td>
                <td>
                    <label>Ending Time:</label>
        <select Name="Etime" Size="Number_of_options">  
              <option value="11:30" selected> 11:30 </option>  
              <option value="12:30">12:30</option>  
              <option value="01:30" >01:30</option>  
              <option value="03:00"> 03:00</option>  
              <option value="04:00"> 04:00</option>  
              <option value="05:00"> 05:00</option> 
              <option value="06:00"> 06:00</option>
        </select>
        <td> 
        <label>Type :</label>
        <select Name="type" Size="Number_of_options">  
              <option value="Lect" selected>Lect</option>  
              <option value="Lab">Lab</option>  
        </select>  
        </td>
                </td>
            </tr>
        
        </table>
            </div>
            <div class="Operation tb">
            <tr>
                <td>
                    <button type="submit" style="width:20%;" name="action" value="ALL Present"><?php if($_SESSION['checkall']==0){echo "ALL Present";}else{echo "ALL Absent";} ?></button>
                </td>
            </tr>
            </div>
        </center>
        <!-- code for operation button end -->
        <center>
<table style="margin-top:0" cellspacing="5px" border="0">

                <tr>

                    <th style="background-color: #333; color:white;"><?php echo $_SESSION['Subject'];?></th>
                    
                </tr>
         </table>
         </center>
        <!-- code for table -->
        <center>
        <div class="studata">
            
            <table cellspacing="5px">
            <tr>
                <th>Enrollment NO</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
            <?php
            //Connection To HOST
            include("../../db_connect.php");

            $sname="Advanced Java Programming";
            $query="SELECT Sub_ID FROM subject WHERE SubName='$sname'";
            $cmd=mysqli_query($con,$query);
            $sd=mysqli_fetch_array($cmd);
            $sid=$sd['Sub_ID'];

            $query="SELECT Branch_ID FROM sub_br WHERE Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            $br=mysqli_fetch_array($cmd);
            $branch=$br['Branch_ID'];

            $query="SELECT Sem FROM subject WHERE Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            $s=mysqli_fetch_array($cmd);
            $sem=$s['Sem'];

            $query2="SELECT StuRollno,StuName FROM student WHERE Branch_ID='$branch' AND Sem='$sem'";
            $cmd2=mysqli_query($con,$query2);
            $n=mysqli_num_rows($cmd2);
            $counter=0;

            while($row=mysqli_fetch_array($cmd2))
            {
                $eno=$row['StuRollno'];
                $name=$row['StuName'];
                
            ?>
           
            <tr class="tb">
            <td><?php echo $eno; ?></td>
            <input type="hidden" value="<?php echo $eno; ?>" name="StuRollno[]">
            <td style="text-align:left;"><div class="myDIV" style="float:left;">Name: </div><div class="hide" style="float:left;"><?php echo $name; ?></div></td>
            <input type="hidden" value="<?php echo $name; ?>" name="StuName[]">
            <td><input type="radio" name="status[<?php echo $counter ?>]" value=0 id="A[<?php echo $counter ?>]" <?php if($_SESSION['checkall']==0){echo "checked";}?>><label for="A[<?php echo $counter ?>]">Absent</label>
            <input type="radio" name="status[<?php echo $counter ?>]" value=1 id="P[<?php echo $counter ?>]" <?php if($_SESSION['checkall']==1){echo "checked";}?>><label for="P[<?php echo $counter ?>]">Present</label></td>
            </tr>
            
            <?php $counter++;
            }
            ?>
        </table>
        <div class="tb" style="padding:10px;">
        <input type="submit" style="width:20%;" name="action" value="Submit">
        </form>
        </div>
    
        </center>
    
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>