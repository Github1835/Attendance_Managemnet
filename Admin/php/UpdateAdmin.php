<?php
session_start();
?>
<html>
    <head>
        <title>Update Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body style="background-color:#999;">
        <center>
        <div class="container">
            <div class="card shadow" style="width: 50%;background-color:#777;margin-top:2.5%;margin-bottom:2.5%;">
                <form action="Admin.php" method="POST" novalidate>
                        <div class="card-header text-center bg-success text-white">
                            <h3>Update Admin</h3>
                        </div>
                        <div class="card-body">
                                <?php
                                if($_SERVER["REQUEST_METHOD"] == "GET")
                                {
                                    include('../../db_connect.php');
                                    $aid=$_GET['Admin_ID'];
                                    $query="select *from admin where Admin_ID='$aid'";
                                    $cmd=mysqli_query($con,$query);
                                    $row=mysqli_fetch_array($cmd);

                                    $name=$row['AdminName'];
                                    $email=$row['Email_ID'];
                                    $pass=$row['Password'];
                                    $cno=$row['Contact_no'];
                                }
                                ?>
                                <div class="row row-cols-1 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="Admin_ID" name="Admin_ID" class="form-control" placeholder="Name" readonly value="<?php echo $aid; ?>">
                                            <label for="Admin_ID" class="form-label">Admin ID: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="AdminName" name="AdminName" class="form-control" placeholder="Name" required value="<?php echo $name; ?>">
                                            <label for="AdminName" class="form-label">Name: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="email" id="Email_ID" name="Email_ID" class="form-control" placeholder="Name" required value="<?php echo $email; ?>">
                                            <label for="Email_iD" class="form-label">E-mail: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="number" id="Contact_no" name="Contact_no" class="form-control" placeholder="Name" pattern=".{7,}" required value="<?php echo $cno; ?>">
                                            <label for="Contact_no" class="form-label">Contact Number: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p style="color:white; font-size:small; text-align:left;" id="pass"></p>
                                        <div class="form-floating">
                                            <input type="password" id="newPass" name="newPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" value="<?php echo $pass; ?>" required>
                                            <label for="newPass" class="form-label">New Password: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="password" id="confPass" name="confPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" value="<?php echo $pass; ?>" required>
                                            <label for="confPass" class="form-label">Confirm Password: </label>
                                        </div>
                                        <span id="Result" style="color:white;"></span>
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="card-footer">
                            <div class="col">
                                <a href="Admin.php" class="btn btn-danger" style="float: left; width: 40%;">Close</a>
                                <button class="btn btn-success" style="float: right; width: 40%;" name="action" value="Update" id="UpdateAdmin">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php

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
            document.getElementById("UpdateAdmin").disabled=true;
        }else{
            document.getElementById("Result").innerHTML="Both Password are same";
            document.getElementById("UpdateAdmin").disabled=false;
        }
    }
</script>