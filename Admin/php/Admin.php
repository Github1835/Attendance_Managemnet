<?php
    session_start();
?>
<html>
    <head>
        <title>Admin Operation</title>
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
            <div class="card-header text-center bg-dark text-light"><h2>Admin (Operation)</h2></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <a href="Dashboard.php" class="btn btn-primary">Back</a><br><br>
                    </div>
                    <div class="col-11">
                        <button class="btn btn-outline-primary border-2" data-bs-toggle="modal" data-bs-target="#addAdmin" style="border-radius: 15px; float: right;"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="alert alert-danger alert-dismissible border-danger">
                    note: You can use Back button to go to Dashboard
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Add")
                    {
                        $aid=$_POST['Admin_ID'];
                        $aname=$_POST['AdminName'];
                        $email=$_POST['Email_ID'];
                        $cno=$_POST['Contact_no'];
                        $npass=$_POST['newPass'];
                        $cpass=$_POST['confPass'];

                        $check=addAdmin($aid,$aname,$email,$cno,$npass,$cpass);

                        if($check==true)
                        {
                        ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            New Admin has been Added.
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
                        $adminid=$_POST['Admin_ID'];
                        
                        $check=removeAdmin($adminid);
                        
                        if($check==true)
                        {
                            ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            Admin has been removed.
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
                        $aid=$_POST['Admin_ID'];
                        $aname=$_POST['AdminName'];
                        $email=$_POST['Email_ID'];
                        $cno=$_POST['Contact_no'];
                        $npass=$_POST['newPass'];
                        $cpass=$_POST['confPass'];
                        
                        $check=updateAdmin($aid,$aname,$email,$cno,$npass,$cpass);
                        
                        if($check==true)
                        {
                            ?>
                        <div class="alert alert-success alert-dismissible border-danger">
                            Admin has been Updated.
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Admin ID</th>
                                <th>Admin Name</th>
                                <th>E-mail</th>
                                <th>Password</th>
                                <th>Contact no</th>
                            </tr>
                        </thead>
                        <?php
                        include('../../db_connect.php');
                        $query="select *from admin";
                        $cmd=mysqli_query($con,$query);

                        while($row=mysqli_fetch_array($cmd))
                        {
                        ?>
                        <tr>
                            <td><div class="navbar-light">
                                <div class="container">
                                    <button class="navbar-toggler navbar-toggler-icon" data-bs-toggle="collapse" data-bs-target="#<?php echo $row['Admin_ID'];?>"></button>
                                </div>
                            </div></td>
                            <td><p><?php echo $row['Admin_ID']; ?></p><a href="UpdateAdmin.php?Admin_ID=<?php echo $row['Admin_ID']; ?>" class="btn bg-secondary text-light collapse fade px-3" id="<?php echo $row['Admin_ID'];?>">Update</a></td>
                            <td><p><?php echo $row['AdminName']; ?></p><button class="btn bg-secondary text-light collapse fade px-3" id="<?php echo $row['Admin_ID'];?>" data-bs-toggle="modal" data-bs-target="#RemoveAdmin" onclick="replyR_clicked(this.id)">Remove</button></td>
                            <td><?php echo $row['Email_ID']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['Contact_no']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                
                <div class="modal fade" id="addAdmin">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-success text-white">
                                        <h3>Add Admin</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="Admin.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="Admin_ID" name="Admin_ID" class="form-control" placeholder="Name" required>
                                                        <label for="Admin_ID" class="form-label">Admin ID: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="AdminName" name="AdminName" class="form-control" placeholder="Name" required>
                                                        <label for="AdminName" class="form-label">Name: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
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
                                                    </div>
                                                    <span id="Result"></span>
                                                </div>
                                                <div class="col">
                                                    <!--<button class="btn btn-danger" style="float: left; width: 40%;" data-bs-dismiss="modal" name="action">Close</button>-->
                                                    <button class="btn btn-success" style="float: right; width: 40%;" name="action" value="Add" id="AddAdmin">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="RemoveAdmin">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-danger text-white">
                                        <h3>Confirm !!</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="Admin.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="RAdmin_ID" name="Admin_ID" class="form-control" placeholder="Name" readonly>
                                                        <label for="RAdmin_ID" class="form-label">Admin ID: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!--<button class="btn btn-success" style="float: left; width: 40%;" data-bs-dismiss="modal" name="action">Close</button>-->
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
            </div>
            <div class="card-footer text-center">
                <a href="#top" class="btn btn-secondary" style="width: 30%;">^</a>
            </div>
        </div>
    </body>
</html>
<?php
function addAdmin($aid,$aname,$email,$cno,$npass,$cpass)
{
    include('../../db_connect.php');
    $query="insert into admin values('$aid','$aname','$email','$cpass','$cno')";
    if(mysqli_query($con,$query))
    return true;
    else
    return false;
}
function removeAdmin($aid)
{
    include('../../db_connect.php');
    $query="delete from admin where Admin_ID='$aid'";
    if(mysqli_query($con,$query))
    return true;
    else
    return false;
}
function updateAdmin($aid,$aname,$email,$cno,$npass,$cpass)
{
    include('../../db_connect.php');
    $query="update admin set AdminName='$aname',Email_ID='$email',Password='$cpass',Contact_no='$cno' where Admin_ID='$aid'";
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
    function getvalue()
    {
        let txt = document.getElementById("newPass").value;
        let txt2 = document.getElementById("confPass").value;
        let pass = document.getElementById("pass").innerHTML="\"Password must contain 8 or more character and One uppercase, One lowercase And Number\"";
        if(txt!=txt2)
        {
            document.getElementById("Result").innerHTML="Both password must be same";
            document.getElementById("AddAdmin").disabled=true;
        }else{
            document.getElementById("Result").innerHTML="Both Password are same";
            document.getElementById("AddAdmin").disabled=false;
        }
    }
    function replyR_clicked(clicked_id)
    {
        document.getElementById("RAdmin_ID").value=clicked_id;
    }
    function replyU_clicked(clicked_id)
    {
        document.getElementById("UAdmin_ID").value=clicked_id;
    }
</script>