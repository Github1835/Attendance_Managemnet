<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
	{
?>
<html>
    <head>
        <title>Search Student</title>
        <link rel="stylesheet" href="../css/Insert.css">
    </head>
    <body>
        <form action="Student Data.php" method="POST">
        <center>
            <div class="Operation tb">
            <table style="margin-top:0">
                <tr>
                    <td>
                    <Label>Branch: </Label>
                    <select name="Branch">
                        <option value="ALL">ALL</option>
                        <?php
                        include('../../db_connect.php');
                        $query="select BranchName from branch";
                        $cmd=mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($cmd))
                        {
                        ?>
                            <option value="<?php echo $row['BranchName'] ?>"><?php echo $row['BranchName'] ?></option>
                        <?php
                        }?>
                    </select>
                    </td>

                    <td>
                    <Label>Sem: </Label>
                    <select name="Sem">
                        <option value="ALL">ALL</option>
                        <?php
                        $query="select max(Sem) from student";
                        $cmd=mysqli_query($con,$query);
                        $row=mysqli_fetch_array($cmd);
                        for($i=1;$i<=$row['max(Sem)'];$i++)
                        {
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                        }?>
                    </select>
                    </td>

                    <td>
                    <Label>Year: </Label>
                    <select name="Year">
                        <option value="ALL">ALL</option>
                        <?php
                        $query="select max(Year) from student";
                        $cmd=mysqli_query($con,$query);
                        $row=mysqli_fetch_array($cmd);
                        for($i=1;$i<=$row['max(Year)'];$i++)
                        {
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                        }?>
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
                        <div class="search-btn" style="padding:10px;">
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
            $br=$_POST['Branch'];
            $branch=$br;
            $branchDisplay=$branch;
            if($br!='ALL')
            {
                $query="select Branch_ID from branch where BranchName='$br'";
                $cmd=mysqli_query($con,$query);
                $br=mysqli_fetch_array($cmd);
                $branch=$br['Branch_ID'];
            }

            $sem=$_POST['Sem'];
            $year=$_POST['Year'];

            if($stuinfo!=null)
            {
                $check=ord($stuinfo[0]);
            }

            $query="select *from student where";
            if($stuinfo==null)
            {
                $query="select *from student";
            }else if($check>=48&&$check<=57)
            {
                $query.=" StuRollno='$stuinfo'";
            }else
            {
                $query.=" StuName like '%$stuinfo%'";
            }

            if($branch!='ALL')
            {
                if(strlen($query)==20)
                {
                    $query.=" where";
                }
                if(strlen($query)>26)
                {
                    $query.=" AND";
                }
                $query.=" Branch_ID='$branch'";
            }

            if($sem!='ALL')
            {
                if(strlen($query)==20)
                {
                    $query.=" where";
                }
                if(strlen($query)>26)
                {
                    $query.=" AND";
                }
                $query.=" Sem='$sem'";
            }

            if($year!='ALL')
            {
                if(strlen($query)==20)
                {
                    $query.=" where";
                }
                if(strlen($query)>26)
                {
                    $query.=" AND";
                }
                $query.=" Year='$year'";
                
            }
            
            $cmd=mysqli_query($con,$query);
            if(mysqli_fetch_row($cmd)!=0){
            ?>
            <center>
            <div class="studata">
            <table style="margin-top:0" cellspacing="5px" border="0">
                <tr>
                    <th style="background-color: #333; color:white;"><?php echo $branchDisplay;?></th>
                    <th style="background-color: #333; color:white;"><?php echo "Sem :$sem";?></th>
                    <th style="background-color: #333; color:white;"><?php echo "Year :$year";?></th>
                </tr>
            </table>
            <table cellspacing="5px">
                <tr>
                <th>Enrollment number</th>
                <th>Name</th>
                </tr>
                <?php
                        $cmd=mysqli_query($con,$query);
                        while ($row=mysqli_fetch_array($cmd)) {
                ?>
                <tr class="tb">
                    <td><a href="studentdata1.php?StuRollno=<?php echo $row['StuRollno'];?>"><?php echo $row['StuRollno'];?></a></td>
                    <td><?php echo $row['StuName']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            </div>
            </center>

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