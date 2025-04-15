<html>
    <head>
        <title>Update Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">
    </head>
    <body style="background-color:#999;">
        <center>
        <div class="container">
            <a href="Student.php" class="btn btn-danger fa fa-close fa-lg" style="float: right;"></a>
            <div class="card shadow" style="width: 50%;background-color:#777;margin-top:2.5%;margin-bottom:2.5%;">
                
                <form action="Student.php" method="POST" novalidate>
                        <div class="card-header text-center bg-success text-white">
                            <h3 tyle="width:80%;">Update Student</h3>
                        </div>
                        <div class="card-body">
                                <?php
                                if($_SERVER["REQUEST_METHOD"] == "GET")
                                {
                                    include('../../../db_connect.php');
                                    
                                    $srollno=$_GET['StuRollno'];
                                    $query="select *from student where StuRollno='$srollno'";
                                    $cmd=mysqli_query($con,$query);
                                    $row=mysqli_fetch_array($cmd);
                                    
                                    $srollno=$row['StuRollno'];
                                    $sname=$row['StuName'];
                                    $gender=$row['Gender'];
                                    $email=$row['Email_ID'];
                                    $cno=$row['Contact_no'];
                                    $sem=$row['Sem'];
                                    $year=$row['Year'];
                                    $branch=$row['Branch_ID'];
                                    $pass=$row['Password'];
                                }
                                ?>
                                <div class="row row-cols-1 g-1">
                                    
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="StuRollno" name="StuRollno" class="form-control" placeholder="Rollno" value="<?php echo $srollno; ?>" required readonly>
                                            <label for="StuRollno" class="form-label">Rollno: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="StuName" name="StuName" class="form-control" placeholder="Name" value="<?php echo $sname;?>" required>
                                            <label for="StuName" class="form-label">Name: </label>
                                        </div>
                                    </div>
                                     <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="Gender" name="Gender" class="form-control" placeholder="Gender" value="<?php echo $gender;?>" required>
                                            <label for="Gender" class="form-label">Gender: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="email" id="Email_ID" name="Email_ID" class="form-control" placeholder="Name" value="<?php echo $email;?>" required>
                                            <label for="Email_iD" class="form-label">E-mail: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="number" id="Contact_no" name="Contact_no" class="form-control" placeholder="Name" value="<?php echo $cno;?>" required>
                                            <label for="Contact_no" class="form-label">Contact Number: </label>
                                        </div>
                                    </div>
                                     <div class="col">
                                        <div class="form-floating">
                                            <input type="number" id="Sem" name="Sem" class="form-control" placeholder="Sem" value="<?php echo $sem;?>" required>
                                            <label for="Sem" class="form-label">Semester: </label>
                                        </div>
                                    </div>
                                     <div class="col">
                                        <div class="form-floating">
                                            <input type="number" id="Year" name="Year" class="form-control" placeholder="Year" value="<?php echo $year;?>" required>
                                            <label for="Year" class="form-label">Year: </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="Password" value="<?php echo $pass;?>">
                                    <div class="col">
                                        <select class="form-control mb-2" name="Branch_ID" value="<?php echo $branch;?>" required>
                                            <?php
                                                include('../../../db_connect.php');
                                                $query="select *from branch";
                                                $cmd=mysqli_query($con,$query);
                                                
                                                while($row=mysqli_fetch_array($cmd))
                                                {
                                            ?>
                                            <option value="<?php echo $row['Branch_ID'];?>" class="form-control"><?php echo $row['BranchName'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="card-footer">
                            <div class="col">
                                <button class="btn btn-danger" style="float: left; width: 40%;" name="action" value="Remove" id="UpdateLect">Delete</button>
                                <button class="btn btn-success" style="float: right; width: 40%;" name="action" value="Update" id="UpdateLect">Update</button>
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
            document.getElementById("UpdateLect").disabled=true;
        }else{
            document.getElementById("Result").innerHTML="Both Password are same";
            document.getElementById("UpdateLect").disabled=false;
        }
    }
</script>