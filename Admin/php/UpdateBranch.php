<?php
session_start();
?>
<html>
    <head>
        <title>Update Branch</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body style="background-color:#999;">
        <center>
        <div class="container">
            <div class="card shadow" style="width: 50%;background-color:#777;margin-top:2.5%;margin-bottom:2.5%;">
                <form action="Branch.php" method="POST" novalidate>
                        <div class="card-header text-center bg-success text-white">
                            <h3>Update Branch</h3>
                        </div>
                        <div class="card-body">
                                <?php
                                if($_SERVER["REQUEST_METHOD"] == "GET")
                                {
                                    include('../../db_connect.php');
                                    $bid=$_GET['Branch_ID'];
                                    $query="select *from branch where Branch_ID='$bid'";
                                    $cmd=mysqli_query($con,$query);
                                    $row=mysqli_fetch_array($cmd);

                                    $name=$row['BranchName'];
                                    // $email=$row['Email_ID'];
                                    // $pass=$row['Password'];
                                    // $cno=$row['Contact_no'];
                                }
                                ?>
                                <div class="row row-cols-1 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="Branch_ID" name="Branch_ID" class="form-control" placeholder="Name" readonly value="<?php echo $bid; ?>">
                                            <label for="Branch_ID" class="form-label">Branch ID: </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" id="BranchName" name="BranchName" class="form-control" placeholder="Name" required value="<?php echo $name; ?>">
                                            <label for="BranchName" class="form-label">Name: </label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <div class="col">
                                <a href="Branch.php" class="btn btn-danger" style="float: left; width: 40%;">Close</a>
                                <button class="btn btn-success" style="float: right; width: 40%;" name="action" value="Update" id="UpdateBranch">Update</button>
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
   
</script>