<?php
    session_start();
    include('../../../db_connect.php');
?>
<html>
    <head>
        <title>Bootstrap Collapse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../../css/style.css">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-header text-center bg-dark text-light"><h2>Student(Operation)</h2></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <a href="../Dashboard.php" class="btn btn-primary shadow">Back</a><br><br>
                    </div>
                </div>
            </div>
            <div class="card-group text-light">
                <a href="index.php" class="card-content card text-light">
                    <div class="card-body">
                        <h2>Add</h2>
                        <p class="small">Student</p>
                    </div>
                </a>
                <a href="Update.php" class="card-content card">
                    <div class="card-body">
                        <h2>Update</h2>
                        <p class="small">Student</p>
                    </div>
                </a>
                <a href="Delete.php" class="card-content card">
                    <div class="card-body">
                        <h2>Delete</h2>
                        <p class="small">Student</p>
                    </div>
                </a>
            </div>
            <center>
            <div class="container row row-cols-2 mt-5">
                <form action="Student.php" method="POST">
                <div class="col">

                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-floating">
                                <select name="select1" id="select1" class="form-control" aria-placeholder="Hello" required>
                                    <?php
                                        $cmd=fetchBranch();
                                        while($row=mysqli_fetch_array($cmd))
                                        {
                                    ?>
                                    <option value="<?php echo $row['Branch_ID'];?>" class="form-control"><?php echo $row['BranchName'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <label for="select1" class="form-label">Branch: </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select name="select2" id="select2" class="form-control" aria-placeholder="Hello" required>
                                    <?php
                                        $cmd=fetchSem();
                                        $row=mysqli_fetch_array($cmd);
                                        $i=1;
                                        while($i<=$row['max(Sem)'])
                                        {
                                    ?>
                                    <option value="<?php echo $i;?>" class="form-control"><?php echo $i;?></option>
                                    <?php
                                        $i++;
                                        }
                                    ?>
                                </select>
                                <label for="select2" class="form-label">Sem: </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <button type="submit" class="btn btn-opr mt-2" name="action" value="type1">Search</button>
                </div>
                </form>
                <form action="Student.php" method="POST">
                <div class="col-8 mt-3">
                    <div class="input-group">
                        <i class="fa fa-search fa-lg p-3"></i>
                        <input type="text" class="form-control" placeholder="Search" name="select3" required>
                        <button type="submit" class="btn btn-opr" name="action" value="type2">Search</button>
                    </div>
                </div>
                </form>
            </div>
            </center>
            <div class="table-responsive mt-3">
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
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="type1")
                        {
                            $bid=$_POST['select1'];
                            $sem=$_POST['select2'];
                            $cmd=fetchData1($sem,$bid);
                            
                            while($row=mysqli_fetch_array($cmd))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['StuRollno'];?></td>
                                <td><?php echo $row['StuName'];?></td>
                                <td><?php echo $row['Gender'];?></td>
                                <td><?php echo $row['Email_ID'];?></td>
                                <td><?php echo $row['Contact_no'];?></td>
                                <td><?php echo $row['Sem'];?></td>
                                <td><?php echo $row['Year'];?></td>
                                <td><?php echo $row['Branch_ID'];?></td>
                                <td><a href="UpdateStu.php?StuRollno=<?php echo $row['StuRollno'];?>" class="btn btn-opr">Modify</a></td>
                            </tr>
                            <?php
                            }
                        }
                        else if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="type2")
                        {
                            $ser=$_POST['select3'];
                            $cmd=fetchData2($ser);
                            
                            while($row=mysqli_fetch_array($cmd))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['StuRollno'];?></td>
                                <td><?php echo $row['StuName'];?></td>
                                <td><?php echo $row['Gender'];?></td>
                                <td><?php echo $row['Email_ID'];?></td>
                                <td><?php echo $row['Contact_no'];?></td>
                                <td><?php echo $row['Sem'];?></td>
                                <td><?php echo $row['Year'];?></td>
                                <td><?php echo $row['Branch_ID'];?></td>
                                <td><a href="UpdateStu.php?StuRollno='<?php echo $row['StuRollno'];?>'" class="btn btn-opr">Modify</a></td>
                            </tr>
                            <?php
                            }
                        }else
                        {
                            echo " ";
                        }
                        ?>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove")
{
    $srollno=$_POST['StuRollno'];
    
    $check=removeStu($srollno);
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Update")
{
    $srollno=$_POST['StuRollno'];
    $sname=$_POST['StuName'];
    $gender=$_POST['Gender'];
    $email=$_POST['Email_ID'];
    $cno=$_POST['Contact_no'];
    $sem=$_POST['Sem'];
    $year=$_POST['Year'];
    $branch=$_POST['Branch_ID'];

    $check=updateStu($srollno,$sname,$gender,$email,$cno,$sem,$year,$branch);
}
function fetchData1($sem,$bid)
{
    include('../../../db_connect.php');

    $query="select *from student where Branch_ID='$bid' and Sem='$sem'";
    $cmd=mysqli_query($con,$query);

    return $cmd;
}
function fetchData2($ser)
{
    include('../../../db_connect.php');

    $query="select *from student where StuRollno='$ser'";
    $cmd=mysqli_query($con,$query);

    return $cmd;
}
function fetchBranch()
{
    include('../../../db_connect.php');

    $query="select *from branch";
    $cmd=mysqli_query($con,$query);

    return $cmd;
}
function fetchSem()
{
    include('../../../db_connect.php');

    $query="select max(Sem) from student";
    $cmd=mysqli_query($con,$query);

    return $cmd;
}
function removeStu($srollno)
{
   include('../../../db_connect.php');
       $srollno=trim($srollno,'s');
    $query="delete from student where StuRollno='$srollno'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Student Removed");</script>';
}
function updateStu($srollno,$sname,$gender,$email,$cno,$sem,$year,$branch)
{
   include('../../../db_connect.php');
       $srollno=trim($srollno,'s');
    $query="update student set StuName='$sname',Gender='$gender',Email_ID='$email',Contact_no='$cno',Sem=$sem,Year=$year,Branch_ID='$branch' where StuRollno='$srollno'";
   $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Student Updated");</script>';
}
?>