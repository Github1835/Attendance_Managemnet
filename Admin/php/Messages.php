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
        <div class="card-header text-center bg-dark text-light"><h2>Messages</h2></div>
        <div class="row">
            <div class="col col-1 mt-3">
                <a href="Dashboard.php" class="btn btn-primary m-3">Back</a>
            </div>
            <div class="col col-10 mt-3">
                <a href="Messages.php" class="btn btn-primary m-3">Refresh</a>
            </div>
        </div>
        <div class="container mt-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Remove</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <?php
                    $cmd=fetchMes();
                    while($row=mysqli_fetch_array($cmd))
                    {
                        $email=$row['Email_ID'];
                        $mess=$row['Message'];
                ?>
                <tr>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $mess; ?></td>
                    <td>
                        <button class="btn btn-opr" id="<?php echo $email;?>" data-bs-toggle="modal" data-bs-target="#RemoveM" onclick="replyU_clicked(this.id)">Remove</button>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <div class="modal fade" id="RemoveM">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header text-center bg-danger text-white">
                                        <h3>Confirm !!</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="Messages.php" method="POST" novalidate>
                                            <div class="row row-cols-1 g-3">
                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input type="text" id="ULect_ID" name="email" class="form-control" placeholder="Name" readonly>
                                                        <label for="RLect_ID" class="form-label">Email: </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-danger" style="float: right; width: 40%;" name="action" value="Remove" id="RemoveBr">Remove</button>
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
if($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['action']=="Remove")
{
    $id=$_POST['email'];
    remove($id);
}
function fetchMes()
{
    include('../../db_connect.php');
    
    $query="select *from message";
    $cmd=mysqli_query($con,$query);
    
    return $cmd;
}
function remove($id)
{
    include('../../db_connect.php');
    
    $query="delete from message where Email_ID = '$id'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Message removed");</script>';
}
?>
<script>
    function replyU_clicked(clicked_id)
    {
        document.getElementById("ULect_ID").value=clicked_id;
    }
</script>