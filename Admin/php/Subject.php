<?php
    session_start();
?>
<html>
    <head>
        <title>Bootstrap Collapse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="containerdemo.css">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div class="id"></div>
        <div class="card">
            <div class="card-header text-center bg-dark text-light"><h2>Subject(Operation)</h2></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <a href="Dashboard.php" class="btn btn-primary">Back</a><br><br>
                    </div>
                    <div class="col-11">
                        <button class="btn btn-outline-primary border-2" data-bs-toggle="modal" data-bs-target="#addBranch" style="border-radius: 15px; float: right;"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="alert alert-danger alert-dismissible border-danger">
                    note: You can use Back button to go back to Dashboard
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Add")
                    {
                        $sid=$_POST['Sub_ID'];
                        $name=$_POST['SubName'];
                        // $email=$_POST['Email_ID'];
                        // $cno=$_POST['Contact_no'];
                        // $npass=$_POST['newPass'];
                        // $cpass=$_POST['confPass'];

                        $check=addBranch($sid,$name);

                        if($check==true)
                        {
                        ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            New Subject has been Added.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php
                        }else
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissible border-danger">
                            Error occured during process OR Record is already available, Plese Try Again.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php 
                        }
                    }
                    if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove")
                    {
                        $sid=$_POST['Sub_ID'];
                        
                        $check=removeBranch($sid);
                        
                        if($check==true)
                        {
                            ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            Subject has been removed.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php
                        }else
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissible border-danger">
                            Error occured during process, Plese Try Again.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php 
                        }
                    }
                    if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Update")
                    {
                        $sid=$_POST['Sub_ID'];
                        $name=$_POST['SubName'];
                        // $email=$_POST['Email_ID'];
                        // $cno=$_POST['Contact_no'];
                        // $npass=$_POST['newPass'];
                        // $cpass=$_POST['confPass'];
                        
                        $check=updateBranch($sid,$name);
                        
                        if($check==true)
                        {
                            ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            Subject has been Updated.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php
                        }else
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissible border-danger">
                            Error occured during process, Plese Try Again.
                            <button class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php 
                        }
                    }
                ?>
                <div class="table-responsive">
                        <?php
                        include('../../db_connect.php');
                        
                        $sql="select *from branch";
                        $exe=mysqli_query($con,$sql);
                        
                        while($row1=mysqli_fetch_array($exe))
                        {
                            $bid=$row1['Branch_ID'];
                            $sql="select *from sub_br where Branch_ID = '$bid'";
                            $exe1=mysqli_query($con,$sql);
                        ?>
                        <h4 style="padding:10px; border-radius:15px; background-color:black; color:white;"><?php echo $row1['BranchName']; ?></h4>
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row2=mysqli_fetch_array($exe1))
                        {
                            $lid=$row2['Sub_ID'];
                            $query="select *from subject where Sub_ID = '$lid'";
                            $cmd=mysqli_query($con,$query);
    
                            while($row=mysqli_fetch_array($cmd))
                            {
                            ?>
                                <tr>
                                    <td><div class="navbar-light">
                                        <div class="container">
                                            <button class="navbar-toggler navbar-toggler-icon" data-bs-toggle="collapse" data-bs-target="#x<?php echo $row2['ID'];?>"></button>
                                        </div>
                                    </div></td>
                                    <td><p><?php echo $row['Sub_ID']; ?></p>
                                    <a href="sub_br.php?Sub_ID=<?php echo $row['Sub_ID']; ?>" class="btn bg-secondary text-light collapse fade px-3" id="x<?php echo $row2['ID'];?>">Modify</a></td>
                                    <td><p><?php echo $row['SubName']; ?></p>
                                    <a href="UpdateSub.php?Sub_ID=<?php echo $row['Sub_ID']; ?>" class="btn bg-secondary text-light collapse fade px-3" id="x<?php echo $row2['ID'];?>">Update</a>
                                    <button class="btn bg-secondary text-light collapse fade px-3" id="x<?php echo $row2['ID'];?>" data-bs-toggle="modal" data-bs-target="#RemoveBranch" onclick="replyR_clicked(this.id)">Remove</button></td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                            </table>
                        <?php
                        }
                        ?>
                </div>
                
                <div class="modal fade" id="addBranch">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-success text-white">
                                        <h3>Add Subject</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="layout_subject.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="Sub_ID" name="Sub_ID" class="form-control" placeholder="Name" required>
                                                        <label for="Sub_ID" class="form-label">Subject ID: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="SubName" name="SubName" class="form-control" placeholder="Name" required>
                                                        <label for="SubName" class="form-label">Name: </label>
                                                    </div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="form-floating">
                                                        <input type="email" id="Email_ID" name="Email_ID" class="form-control" placeholder="Name" required>
                                                        <label for="Email_iD" class="form-label">E-mail: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="number" id="Contact_no" name="Contact_no" class="form-control" placeholder="Name" pattern=".{7,}" required>
                                                        <label for="Contact_no" class="form-label">Contact Number: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p style="color:red; font-size:small;" id="pass"></p>
                                                    <div class="form-floating">
                                                        <input type="password" id="newPass" name="newPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" required>
                                                        <label for="newPass" class="form-label">New Password: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="password" id="confPass" name="confPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" required>
                                                        <label for="confPass" class="form-label">Confirm Password: </label>
                                                    </div> -->
                                                    <!-- <span id="Result"></span>
                                                </div> -->
                                                <div class="col">
                                                    <button class="btn btn-success" style="float: right; width: 40%;" name="action" value="Add" id="AddBranch">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="RemoveBranch">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-danger text-white">
                                        <h3>Confirm !!</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="layout_subject.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="RSub_ID" name="Sub_ID" class="form-control" placeholder="Name" readonly>
                                                        <label for="RSub_ID" class="form-label">Subject ID: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-danger" style="float: right; width: 40%;" name="action" value="Remove" id="RemoveBranch">Remove</button>
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
            <div class="card-footer text-center">
                <a href="#top" class="btn btn-secondary" style="width: 30%;">^</a>
            </div>
        </div>
    </body>
</html>
<?php
function addBranch($sid,$name)
{
    include('../../db_connect.php');
    $sid=trim($sid,'x');
    $query="insert into subject(Sub_ID,SubName) values('$sid','$name')";
    if(mysqli_query($con,$query))
    return true;
    else
    return false;
}
function removeBranch($sid)
{
    include('../../db_connect.php');
     $sid=trim($sid,'x');
    $query="delete from subject where Sub_ID='$sid'";
    if(mysqli_query($con,$query))
    return true;
    else
    return false;
}
function updateBranch($sid,$name)
{
    include('../../db_connect.php');
     $sid=trim($sid,'x');
    $query="update subject set SubName='$name' where Sub_ID='$sid'";
    if(mysqli_query($con,$query))
    return true;
    else
    return false;
}
?>
<script> 
    const form = document.querySelector("form")
    form.addEventListener('submit',e=> {
        if(!form.checkValidity()){
            e.preventDefault()
        }
        form.classList.add('was-validated')
    })
    // function getvalue()
    // {
    //     let txt = document.getElementById("newPass").value;
    //     let txt2 = document.getElementById("confPass").value;
    //     let pass = document.getElementById("pass").innerHTML="\"Password must contain 8 or more character and One uppercase, One lowercase And Number\"";
    //     if(txt!=txt2)
    //     {
    //         document.getElementById("Result").innerHTML="Both password must be same";
    //         document.getElementById("AddLect").disabled=true;
    //     }else{
    //         document.getElementById("Result").innerHTML="Both Password are same";
    //         document.getElementById("AddLect").disabled=false;
    //     }
    // }
    function replyR_clicked(clicked_id)
    {
        document.getElementById("RSub_ID").value=clicked_id;
    }
    function replyU_clicked(clicked_id)
    {
        document.getElementById("USub_ID").value=clicked_id;
    }
</script>
