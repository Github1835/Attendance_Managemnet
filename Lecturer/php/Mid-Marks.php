<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="../css/Insert.css">
    </head>
    <body>
    <form method="post" action="Mid-MarksInsert.php">
        <!-- code for operation button -->
        <center>
            <div class="Operation tb">
            <input type="submit" style="width:20%;" name="action" value="Insert">
            <input type="submit" style="width:20%;" name="action" value="Delete ALL">
            </div>
        </center>
        <!-- code for operation button end -->

        <!-- code for table -->
        <center>
        <div class="studata">
            
            <table cellspacing="5px">
            <tr>
                <th>Enrollment NO</th>
                <th>Name</th>
                <th>Marks</th>
                <th>Insert</th>
            </tr>
            <?php
            //Connection To HOST
            include("../../db_connect.php");

            $sname=$_SESSION['Subject'];
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
            $i=0;

            while($row=mysqli_fetch_array($cmd2))
            {
                $eno=$row['StuRollno'];
                $name=$row['StuName'];
                $i++;

                $query3="SELECT obt_marks FROM mid_marks WHERE StuRollno='$eno' AND Sub_ID='$sid'";
                $cmd3=mysqli_query($con,$query3);
                
            ?>
           
            <tr class="tb">
                <td><a href="studentdata1.php?StuRollno=<?php echo $row['StuRollno'];?>"><?php echo $row['StuRollno'];?></a></td></td>
                <input type="hidden" name="Stuno" value="<?php echo $n;?>">
                <input type="hidden" name="<?php echo $i."stu";?>" value="<?php echo $eno;?>">
                <td style="text-align:justify;"><?php echo $name;?></td>
                <td><input type="number" name="<?php echo $i."mark";?>" min="0" value="<?php if($row=mysqli_fetch_array($cmd3)){echo $row['obt_marks'];}else{echo '0';}?>"></td>
                <td><div class="dd"><a href="Mid-MarksDelete.php?StuRollno=<?php echo $eno; ?>" class="dd">Delete</a></div></td>
            </tr>
            
            <?php
            }
            ?>
        </table>
        <div class="tb" style="padding:10px;">
        <input type="submit" style="width:20%;" name="action" value="Insert">
        </div>
    </form>
        </center>
    </body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href='../../FacultyLogin.html';</script>";
    }?>