<?php
session_start();
include('../db_connect.php');
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

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-brand text-center">
                <h3><i class="fa fa-desktop"></i><br><span>Admin Panel</span></h3>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="php/Dashboard.php" onclick="ChangeSrc(this);return false;"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
                    <li><button data-bs-toggle="collapse" data-bs-target="#user-profile"><i class="fa fa-user"></i> <span>Profile Info</span></a></li>
                    <li><button data-bs-toggle="collapse" data-bs-target="#edit-user-profile"><i class="fa fa-edit"></i> <span>Edit Info</span></button></li>
                    <li><a href="php/Messages.php" onclick="ChangeSrc(this);return false;"><i class="fa fa-wechat"></i><span>Messages</span></a></li>
                    <li><button data-bs-toggle="collapse" data-bs-target="#settings"><i class="fa fa-gear"></i> <span>Settings</span></a></li>
                </ul>
            </div>
        </div>
        <div class="nav-bar navbar navbar-expand">
            <div class="container">
                <h4 class="navbar-brand"><a href="php/Dashboard.php" onclick="ChangeSrc(this);return false;"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></h4>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="Login/ALogin2.php" class="nav-link">Logout</a></li>
                    <li class="nav-item"><a href="Login/ALogin2.php" class="fa fa-sign-out fa-lg nav-link text-dark" style="margin: 5px;"></a></li>
                </ul>
            </div>
        </div>
        <div class="main-container">
            <embed src="php/Dashboard.php" id="e-container">
        </div>
        <div class="user-profile user-profile-md card collapse fade" id="user-profile">
            <div class="card-header text-light">
                <center>
                    <h6 style="width: 90%; float: left;">Admin Profile</h6>
                    <div style="width: 10%; float: right;"><button class="fa fa-close fa-lg" style="float: right; color: white; padding: 5px;" data-bs-toggle="collapse" data-bs-target="#user-profile"></button></div>
                </center>
            </div>
            
            <?php
                $admin=fetchAdmin();
            ?>
            
            <div class="card-body">
                <center><i class="user-pic fa fa-light fa-user fa-5x"></i></center>
                <hr>
                <label for="id">ID :</label>
                <input type="text" class="form-control" value="<?php echo $admin['Admin_ID']; ?>" readonly>
                <label for="name">Name :</label>
                <input type="text" class="form-control" value="<?php echo $admin['AdminName']; ?>" readonly>
                <label for="email">Email :</label>
                <input type="text" class="form-control" value="<?php echo $admin['Email_ID']; ?>" readonly>
                <label for="mno">Contact No :</label>
                <input type="text" class="form-control" value="<?php echo $admin['Contact_no']; ?>" readonly>
            </div>
        </div>
        <div class="user-profile user-profile-lg card collapse fade" id="edit-user-profile">
            <div class="card-header text-light">
                <center>
                    <h6 style="width: 90%; float: left;">Admin Profile</h6>
                    <div style="width: 10%; float: right;"><button class="fa fa-close fa-lg" style="float: right; color: white; padding: 5px;" data-bs-toggle="collapse" data-bs-target="#edit-user-profile"></button></div>
                </center>
            </div>
            <form action="AdminHome.php" method="POST" novalidate>
                <div class="card-body">
                    <center><i class="user-pic fa fa-light fa-user fa-5x"></i></center>
                    <hr>
                    <div class="form-floating my-2">
                        <input id="Admin_ID" name="Admin_ID" type="text" class="form-control" placeholder="Admin ID" value="<?php echo $admin['Admin_ID']; ?>" readonly>
                        <label for="Admin_ID">ID :</label>
                    </div>
                    <div class="form-floating my-2">
                        <input id="AdminName" name="AdminName" type="text" class="form-control" placeholder="Admin-name" value="<?php echo $admin['AdminName']; ?>" required>
                        <label for="AdminName">Name :</label>
                    </div>
                    <div class="form-floating my-2">
                        <input id="Email_ID" name="Email_ID" type="email" class="form-control" placeholder="Email-id" value="<?php echo $admin['Email_ID']; ?>" required>
                        <label for="Email_ID">Email :</label>
                    </div>
                    <div class="form-floating my-2">
                        <input id="Contact_no" name="Contact_no" type="text" class="form-control" placeholder="mobile no" value="<?php echo $admin['Contact_no']; ?>" required>
                        <label for="Contact_no">Contact No :</label>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Update" name="action" class="dashboard-btn">
                </div>
            </form>
        </div>
        <div class="user-profile user-profile-sm card collapse fade" id="settings">
            <div class="card-header text-light">
                <center>
                    <h6 style="width: 90%; float: left;">Settings</h6>
                    <div style="width: 10%; float: right;"><button class="fa fa-close fa-lg" style="float: right; color: white; padding: 5px;" data-bs-toggle="collapse" data-bs-target="#settings"></button></div>
                </center>
            </div>
            <div class="card-body">
                <form action="AdminHome.php" method="POST">
                <div class="form-floating my-2">
                    <input id="email" name="email" type="email" value="<?php echo $admin['Email_ID']; ?>" class="form-control" placeholder="email" required>
                    <label for="email">Email: </label>
                </div>
                <button class="dashboard-btn" name="action" value="NewEmail">Change</button>
                <br>
                </form>
                <form action="AdminHome.php" method="POST">
                <br>
                <div class="form-floating my-2">
                    <input type="password" id="newPass" name="newPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" required>
                    <label for="newPass" class="form-label">New Password: </label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" id="confPass" name="confPass" class="form-control" placeholder="Name" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="getvalue()" required>
                    <label for="confPass">Confirm Password: </label>
                </div>
                <span id="Result"></span>
                <button class="dashboard-btn my-2" id="UpdatePass" name="action" value="NewPass">Change</button>
                </form>
            </div>
        </div>
    </body>
</html>

<!--Form Control-->
<?php

    if($_SERVER['REQUEST_METHOD']=="POST"&&$_POST['action']=="Update"){
        
        $aid=$_POST['Admin_ID'];
        $aname=$_POST['AdminName'];
        $aemail=$_POST['Email_ID'];
        $contact=$_POST['Contact_no'];
        
        updateAdmin($aid,$aname,$aemail,$contact);
    }
    
    if($_SERVER['REQUEST_METHOD']=="POST"&&$_POST['action']=="NewEmail"){
        
        $email=$_POST['email'];
        $aid=$_SESSION['Admin_ID'];
        
        updateEmail($aid,$email);
        
    }
    
    if($_SERVER['REQUEST_METHOD']=="POST"&&$_POST['action']=="NewPass"){
        
        $pass=$_POST['newPass'];
        $aid=$_SESSION['Admin_ID'];
        
        if($pass==null||$pass==''||$pass==' ')
        {
            echo '<script>alert("Password is not provided");</script>';
            echo "<script>window.location.href='AdminHome.php';</script>";
        }
        
        updatePass($aid,$pass);
        
    }

?>

<!--php Function-->
<?php
function fetchAdmin(){
    
    include('../db_connect.php');
    
    $aid=$_SESSION['Admin_ID'];
    $query="select *from admin where Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    $result=mysqli_fetch_array($cmd);
    
    return $result;
    
}
function updateAdmin($aid,$aname,$aemail,$contact){
    include('../db_connect.php');
    
    $query="update admin set AdminName='$aname', Email_ID='$aemail', Contact_no='$contact' where Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Your info has been updated");</script>';
    echo "<script>window.location.href='AdminHome.php';</script>";
}
function updateEmail($aid,$email){
    include('../db_connect.php');
    
    $query="update admin set Email_ID='$email' where Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Your Email has been updated");</script>';
    echo "<script>window.location.href='AdminHome.php';</script>";
}
function updatePass($aid,$pass){
    include('../db_connect.php');
    
    $query="update admin set Password='$pass' where Admin_ID='$aid'";
    $cmd=mysqli_query($con,$query);
    
    echo '<script>alert("Your Password has been updated");</script>';
    echo "<script>window.location.href='AdminHome.php';</script>";
}
?>

<!--Java script-->
<script>
    function ChangeSrc(whichsrc){
        var source=whichsrc.getAttribute("href");
        var game=document.getElementById("e-container");
        game.setAttribute("src",source);
    }
    function getvalue()
    {
        let txt = document.getElementById("newPass").value;
        let txt2 = document.getElementById("confPass").value;
        if(txt!=txt2)
        {
            document.getElementById("Result").innerHTML="Both password must be same";
            document.getElementById("UpdatePass").disabled=true;
        }else{
            document.getElementById("Result").innerHTML="Both Password are same";
            document.getElementById("UpdatePass").disabled=false;
        }
    }
    const form = document.querySelector("form")
    form.addEventListener('submit',e=> {
        if(!form.checkValidity()){
            e.preventDefault()
        }
        form.classList.add('was-validated')
    })
</script>