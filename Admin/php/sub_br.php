<?php
session_start();
include('../../db_connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Sub_ID=$_POST['Sub_ID'];
}else
{
    $Sub_ID=$_GET['Sub_ID'];
}
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
        <div class="card-header text-center bg-dark text-light"><h2>Lecturer (Operation)</h2></div>
        <div class="row">
            <div class="col col-1">
                <a href="Subject.php" class="btn btn-primary m-3">Back</a>
            </div>
            <div class="col col-11">
                <a href="sub_br.php?Sub_ID=<?php echo $Sub_ID;?>" class="btn btn-primary m-3" style="float:right;">Refresh</a>
            </div>
        </div>
        <div class="row row-cols-1 m-3">
            <div class="col">
                <form action="sub_br.php" method="POST">
                    <div class="input-group">
                        <select name="Branch" id="" class="form-control">
                            <?php
                                $query="select *from branch";
                                $cmd=mysqli_query($con,$query);
                                
                                while($row=mysqli_fetch_array($cmd))
                                {
                                    $id=$row['Branch_ID'];
                                    $name=$row['BranchName'];
                            ?>
                            <option value="<?php echo $id;?>" class="form-control"><?php echo $name;?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <input type="hidden" name="Sub_ID" value="<?php echo $Sub_ID;?>">
                        <button name="action" value="Add2" class="btn btn-dark">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
        <table class="table table-hover pt-2" cellpadding="10px">
            <thead>
                <tr>
                    <th>Branch</th>
                    <th></th>
                </tr>
            </thead>
            <?php
                $cmd=fetchBR();
                while($row=mysqli_fetch_array($cmd))
                {
                    $sid=$row['Branch_ID'];
                    $query="select BranchName from branch where Branch_ID='$sid'";
                    $cmd1=mysqli_query($con,$query);
                    $row1=mysqli_fetch_array($cmd1);
            ?>
            <tr>
                <td><?php echo $row1['BranchName'];?></td>
                <td><button class="btn bg-danger" id="<?php echo $sid;?>" data-bs-toggle="modal" data-bs-target="#RemoveBR" onclick="replyU_clicked(this.id)">Remove</button></td>
            </tr>
            <?php
                }
            ?>
        </table>  
            <div class="modal fade" id="RemoveBR">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-danger text-white">
                                        <h3>Confirm !!</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="sub_br.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="ULect_ID" name="Branch_ID" class="form-control" placeholder="Name" readonly>
                                                        <label for="RLect_ID" class="form-label">Branch ID: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    
                                                <input type="hidden" name="Sub_ID" value="<?php echo $Sub_ID;?>">
                                                    <button class="btn btn-danger" style="float: right; width: 40%;" name="action" value="Remove2" id="RemoveBr">Remove</button>
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

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Add2")
{
    $sid=$_POST['Sub_ID'];
    $bid=$_POST['Branch'];
    
    addBR($sid,$bid);
}
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove2")
{
    $id=$_POST['Branch_ID'];
    deleteBR($id);
}
?>

<?php
function fetchBR()
{
    include('../../db_connect.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Sub_ID=$_POST['Sub_ID'];
}else
{
    $Sub_ID=$_GET['Sub_ID'];
}
    
    $id=$Sub_ID;
    $query="select *from sub_br where Sub_ID='$id'";
    $cmd=mysqli_query($con,$query);
    
    return $cmd;
}
function addBR($lid,$bid)
{
    include('../../db_connect.php');
    
    $id=$lid.$bid;
    $query="insert into sub_br values('$id','$lid','$bid')";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Branch is assigned");</script>';
}
function deleteBR($id)
{
    include('../../db_connect.php');
    
    $query="delete from sub_br where Branch_ID='$id'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Branch is deleted");</script>';

}
?>
<script>
    function replyR_clicked(clicked_id)
    {
        document.getElementById("RLect_ID").value=clicked_id;
    }
    function replyU_clicked(clicked_id)
    {
        document.getElementById("ULect_ID").value=clicked_id;
    }
</script>