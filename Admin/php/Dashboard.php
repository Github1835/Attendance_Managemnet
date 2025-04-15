<?php
session_start();
include('../../db_connect.php');
?>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-witdh, initial-scale=1.0" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
        <div class="container">
            <div class="card-group text-light">
                <a href="Admin.php" class="card-content card">
                    <div class="card-body">
                        <h2>Admin</h2>
                        <p class="small">Operation</p>
                    </div>
                </a>
                <a href="Lecturer.php" class="card-content card">
                    <div class="card-body">
                        <h2>Lecturer</h2>
                        <p class="small">Operation</p>
                    </div>
                </a>
                <a href="StudentOpe/Student.php" class="card-content card">
                    <div class="card-body">
                        <h2>Student</h2>
                        <p class="small">Operation</p>
                        <!--../../Test/layout_stu.php-->
                    </div>
                </a>
            </div>
            <div class="card-group text-light">
                <a href="Branch.php" class="card-content card">
                    <div class="card-body">
                        <h2>Branch</h2>
                    </div>
                </a>
                <a href="Subject.php" class="card-content card">
                    <div class="card-body">
                        <h2>Subject</h2>
                    </div>
                </a>
            </div>
            <div class="heading container mt-4 p-2 text-light">
                <div class="row row-cols-2">
                    <div class="col"><h4>News</h4></div>
                    <div class="col"><h4><button style="float: right; margin: 5px;" data-bs-toggle="modal" data-bs-target="#scrollAdd"><i class="fa fa-pencil fa-lg" style="color:white;"></i></button></h4></div>
                </div>
            </div>
            <div class="table-responsive" style="border: 1px solid; border-radius: 5px;">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>News</th>
                            <th>Path</th>
                        </tr>
                    </thead>
                        <?php
                            $event1=fetchScrollEvent();
                            
                            while($row=mysqli_fetch_array($event1))
                            {
                                $no=$row['No'];
                                $ename=$row['Name'];
                                $path=$row['Path'];
                        ?>
                        <tbody>
                            <tr>
                                <td style="text-align: center;"><button data-bs-toggle="collapse" data-bs-target="#Scroll<?php echo $no; ?>"><i class="fa fa-bars"></i></button></td>
                                <td><p><?php echo $ename; ?></p><button class="btn btn-opr collapse fade pt-1" id="Scroll<?php echo $no; ?>" onclick="replyR_clicked(this.id)" data-bs-toggle="modal" data-bs-target="#ScrollRemove">Remove</button></td>
                                <td><?php echo $path; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                </table>
            </div>
            <div class="heading container mt-4 p-2 text-light">
                <div class="row row-cols-2">
                    <div class="col"><h4>Event</h4></div>
                    <div class="col"><h4><button style=" float: right; margin: 5px;" data-bs-toggle="modal" data-bs-target="#EventAdd"><i class="fa fa-gear fa-lg" style="color:white;"></i></button></h4></div>
                </div>
            </div>
            <div class="table-responsive" style="border: 1px solid; border-radius: 5px;">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Event No.</th>
                            <th>Event Name</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $event2=fetchEvent();
                            
                            while($row=mysqli_fetch_array($event2))
                            {
                                $evno=$row['Eno'];
                                $evname=$row['Ev_name'];
                                $date=$row['Ev_date'];
                        ?>
                        <tr>
                            <td style="text-align: center;"><button data-bs-toggle="collapse" data-bs-target="#event2<?php echo $evno; ?>"><i class="fa fa-bars"></i></button></td>
                            <td><p><?php echo $evno;?></p>
                            <button class="btn btn-opr collapse fade pt-1" id="event2<?php echo $evno; ?>" onclick="replyN_clicked(this.id)" data-bs-toggle="modal" data-bs-target="#EventRemove">Remove</button></td>
                            <td><p><?php echo $evname; ?></p></td>
                            <td><?php echo $date; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="scrollAdd">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header text-center bg-danger text-white">
                                    <h3>Add News</h3>
                                </div>
                                <div class="card-body">
                                    <form action="Dashboard.php" method="POST">
                                        <div class="row row-cols-1 g-3">
                                            <div class="col">
                                                <div class="form-floating py-2">
                                                    <input type="text" id="NewsName" name="Ename" class="form-control" placeholder="News">
                                                    <label for="NewsName" class="form-label">News: </label>
                                                </div>
                                                <div class="form-floating py-2">
                                                    <input type="text" id="Path" name="path" class="form-control" placeholder="Path">
                                                    <label for="Path" class="form-label">Path: </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger btn-opr" style="float: right; width: 40%;" name="action" value="Add" id="RemoveAdmin">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="EventAdd">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header text-center bg-danger text-white">
                                    <h3>Add Event</h3>
                                </div>
                                <div class="card-body">
                                    <form action="Dashboard.php" method="POST">
                                        <div class="row row-cols-1 g-3">
                                            <div class="col">
                                                <div class="form-floating py-2">
                                                    <input type="text" id="EventName" name="Ename" class="form-control" placeholder="News">
                                                    <label for="EventName" class="form-label">Event Name: </label>
                                                </div>
                                                <div class="form-floating py-2">
                                                    <input type="date" id="datee" name="Edate" class="form-control" placeholder="Path">
                                                    <label for="datee" class="form-label">Date: </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger btn-opr" style="float: right; width: 40%;" name="action" value="Add2" id="RemoveAdmin">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="modal fade" id="ScrollRemove">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header text-center bg-danger text-white">
                                    <h3>Confirm !!</h3>
                                </div>
                                <div class="card-body">
                                    <form action="Dashboard.php" method="POST">
                                        <div class="row row-cols-1 g-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" id="REvent1" name="Admin_ID" class="form-control" placeholder="Name" readonly>
                                                    <label for="REvent1" class="form-label">News ID: </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger" style="float: right; width: 40%;" name="action" value="Remove" id="RemoveAdmin">Remove</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="EventRemove">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header text-center bg-danger text-white">
                                    <h3>Confirm !!</h3>
                                </div>
                                <div class="card-body">
                                    <form action="Dashboard.php" method="POST">
                                        <div class="row row-cols-1 g-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" id="REvent2" name="Admin_ID" class="form-control" placeholder="Name" readonly>
                                                    <label for="REvent2" class="form-label">Event ID: </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger" style="float: right; width: 40%;" name="action" value="Remove2" id="RemoveAdmin">Remove</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>

<!-- form controls -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove")
{
    $EID=$_POST['Admin_ID'];
    $no=trim($EID,"Scroll");

    removeScrollEvent($no);
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove2")
{
    $EID=$_POST['Admin_ID'];
    $no=trim($EID,"event2");

    removeEvent($no);
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Add")
{
    $name=$_POST['Ename'];
    $path=$_POST['path'];

    addScrollEvent($name,$path);
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Add2")
{
    $name=$_POST['Ename'];
    $date=$_POST['Edate'];

    addEvent($name,$date);
}
?>

<!-- php functions -->
<?php
function fetchScrollEvent()
{
    include('../../db_connect.php');
    
    $query="select *from event1";
    $cmd=mysqli_query($con,$query);
    
    return $cmd;
}
function fetchEvent()
{
    include('../../db_connect.php');
    
    $query="select *from event2";
    $cmd=mysqli_query($con,$query);
    
    return $cmd;
}
function addScrollEvent($news,$path)
{
    include('../../db_connect.php');
    
    $query="insert into event1 values(null,'$news','$path');";
    $cmd=mysqli_query($con,$query);
    
}
function addEvent($name,$date)
{
    include('../../db_connect.php');
    
    $query="insert into event2 values(null,'$name','$date');";
    $cmd=mysqli_query($con,$query);
    
}
function removeScrollEvent($no)
{
    include('../../db_connect.php');

    $query="delete from event1 where No='$no'";
    $cmd=mysqli_query($con,$query);

    echo '<script>alert(" Record from news is removed");</script>';
    echo "<script>window.location.href='Dashboard.php';</script>";

}
function removeEvent($no)
{
    include('../../db_connect.php');

    $query="delete from event2 where Eno='$no'";
    $cmd=mysqli_query($con,$query);

    echo '<script>alert(" Record from news is removed");</script>';
    echo "<script>window.location.href='Dashboard.php';</script>";

}

?>
<script>
    function replyR_clicked(clicked_id)
    {
        document.getElementById("REvent1").value=clicked_id;
    }
    function replyN_clicked(clicked_id)
    {
        document.getElementById("REvent2").value=clicked_id;
    }
</script>