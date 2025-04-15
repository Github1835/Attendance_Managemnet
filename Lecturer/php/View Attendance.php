<?php session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
?>
<html>
    <head>
        <title>Search Student</title>
        <link rel="stylesheet" href="../css/Insert.css">
    </head>
    <body>
        <form action="View Attendance.php" method="POST">
        <center>
            <div class="Operation tb">
            <table style="margin-top:0">
                <tr>
                    <td>
                    <Label>Date: </Label>
                    <input type="date" name="date" value=<?php echo date('Y-m-d'); ?>>
                    </td>

                    <td>
                    <Label>Type: </Label>
                    <select name="Type">
                        <option value="Lect">Lectur</option>
                        <option value="Lab">Lab</option>
                    </select>
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
                    </td>
                </tr>
            </table>
            </div>
            <div class="Operation tb">


            <table style="margin-top:0">
                <tr>
                    <td>
                        <input type="text" placeholder="Search..." name="StuInfo" style="width:100%">
                    </td>
                    <td>
                        <div class="search-btn" style="padding:10px;" paceholder="Enrollment No">
                            <button type="submit" style="width:50%;" style="padding:10px;">Search</button>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
        </center>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

            include('../../db_connect.php');
            $stuinfo=$_POST['StuInfo'];
            $date=$_POST['date'];
            $type=$_POST['Type'];
            $stime=$_POST['Stime'];
            $etime=$_POST['Etime'];
            
            $lid=$_SESSION['Lect_ID'];
            $sname=$_SESSION['Subject'];
            
            $query="select Sub_ID from subject where SubName='$sname'";
            $cmd=mysqli_query($con,$query);
            $sid=mysqli_fetch_array($cmd);
            $sid=$sid['Sub_ID'];
            
            $query="select Branch_ID from sub_br where Sub_ID='$sid'";
            $cmd=mysqli_query($con,$query);
            $bid=mysqli_fetch_array($cmd);
            $bid=$bid['Branch_ID'];
            
            $query="select BranchName from branch where Branch_ID='$bid'";
            $cmd=mysqli_query($con,$query);
            $bname=mysqli_fetch_array($cmd);
            $bname=$bname['BranchName'];

            $query="select StuRollno,Status from attendance where Sub_ID='$sid' AND Lect_ID='$lid'";
            if($stuinfo==null)
            {
                $query="select StuRollno,Status from attendance where Sub_ID='$sid' AND Lect_ID='$lid' AND ADate='$date'";
            }else
            {
                $query.=" AND StuRollno like '%$stuinfo%'";
            }

            if(isset($date)==1)
            {
                $query.=" AND ADate='$date'";
            }

            if(isset($type)==1)
            {
                $query.=" AND Type='$type'";
            }

            if(isset($stime)==1)
            {
                $query.=" AND Stime='$stime'";
                
            }
            
            if(isset($stime)==1)
            {
                $query.=" AND Etime='$etime'";
                
            }
            
            $cmd=mysqli_query($con,$query);
            if(mysqli_fetch_row($cmd)!=0){
            ?>
            <div class="studata">
            <center>
            <table style="margin-top:0" cellspacing="5px" border="0">
                <tr>
                    <th style="background-color: #333; color:white;"><?php echo $bname;?></th>
                    <th style="background-color: #333; color:white;"><?php echo "Date :$date";?></th>
                    <th style="background-color: #333; color:white;"><?php echo "Type :$type";?></th>
                    <th style="background-color: #333; color:white;"><?php echo "STime:$stime ETime:$etime";?></th>
                </tr>
            </table>
            </center>
            <center>
            <table cellspacing="5px">
                <tr>
                <th>Enrollment number</th>
                <th>Name</th>
                <th>Status</th>
                </tr>
                <?php
                        $cmd=mysqli_query($con,$query);
                        $counter=0;
                        while ($row=mysqli_fetch_array($cmd)) {
                            $eno=$row['StuRollno'];
                            $query="select StuName from student where StuRollno='$eno'";
                            $cmd1=mysqli_query($con,$query);
                            $sname=mysqli_fetch_array($cmd1);
                            $sname=$sname['StuName'];
                            
                            $status=$row['Status'];
                ?>
                <tr class="tb">
                    <td><a href="studentdata1.php?StuRollno=<?php echo $eno;?>"><?php echo $row['StuRollno'];?></a></td>
                    <td><?php echo $sname; ?></td>
                    <td>
                        <input type="radio" name="status[<?php echo $counter ?>]" value=0 <?php if($status==0){echo "checked";}else{echo "disabled";} ?> >Absent
                        <input type="radio" name="status[<?php echo $counter ?>]" value=1 <?php if($status==1){echo "checked";}else{echo "disabled";} ?> >Present
                    </td>
                </tr>
                <?php
                $counter++;
                    }
                ?>
            </table>
            </center>
            </div>

            <?php
                }
                else
                {
                    ?>
                    <center>
                    <tr>
                        <td><h3>No Data</h3></td>
                    </tr>
                    </center>
                    <?php
                }
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