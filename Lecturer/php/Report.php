<?php
session_start();
if(isset($_SESSION['Lect_ID'])==1)
{
?>
<html>
    <head>
        <title>Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            .sidebar{
                height: 100%;
                background-color: #c9bfbf;
                width: 15%;
                overflow: hidden;
                position: fixed;
                right: 0;
            }
            .main-container{
                height: 100%;
                width: 85%;
                float: left;
            }
            button{
                width: 100%;
                background-color: #da4a4a;
                color: white;
                border: 0;
                border-radius: 5px;
                transition: all 0.2s;
                padding: 10px;
            }
            button:hover{
                background-color: rgb(0, 119, 255);
            }
            embed{
                height:100%;
                width:100%;
            }
        </style>
    </head>
    <body>
        <div id="myGroup">
            <div class="sidebar shadow">
                <div class="row row-cols-1 gy-3">
                    <div class="col pt-5">
                        <button class="dropdown" data-bs-toggle="collapse" data-bs-target="#thismonth">This Month</button>
                    </div>
                    <div class="col">
                        <button class="dropdown" data-bs-toggle="collapse" data-bs-target="#priviousmonth">Privious Month</button>
                    </div>
                    <div class="col">
                        <button class="dropdown" data-bs-toggle="collapse" data-bs-target="#custom">Custom</button>
                    </div>
                    <div class="col">
                        <button data-bs-toggle="collapse" data-bs-target="#tog">Select Date</button>
                    </div>
                    <div class="col collapse fade" id="tog">
                        <form action="Report.php" method="POST">
                            <div class="form-floating pt-1">
                                <input type="date" id="sdate" name="fdate" class="form-control" placeholder="select date" required value="<?php 
                                if($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    echo $_POST['fdate'];
                                }
                                ?>">
                                <label for="sdate" class="form-label">From: </label>
                            </div>
                            <div class="form-floating pt-2">
                                <input type="date" id="edate" name="tdate" class="form-control" placeholder="select date" required value="<?php
                                if($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    echo $_POST['tdate'];
                                }
                                ?>">
                                <label for="edate" class="form-label">To: </label>
                            </div>
                            <div class="form-floating pt-1">
                                <input type="number" id="per" name="pers" class="form-control" placeholder="select date" required value="<?php 
                                if($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    echo $_POST['pers'];
                                }else
                                {
                                    echo "100";
                                }
                                ?>" min="0" max="100">
                                <label for="per" class="form-label">Less than: </label>
                            </div>
                            <center><input type="submit" value="Generate" class="btn btn-primary pt-2"></center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="main-container collapse fade indent" id="thismonth" data-bs-parent="#myGroup">
                    <div class="row g-0" style="height:100%;">
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="ThisMonth/cont1(Report).php" >
                        </div>
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="ThisMonth/cont2(Report).php" >
                        </div>
                        <div class="col col-12 cont" style="height:50%;">
                            <embed src="ThisMonth/cont3(Report).php" >
                        </div>
                    </div>
                </div>
                <div class="main-container collapse fade indent" id="priviousmonth" data-bs-parent="#myGroup">
                    <div class="row g-0" style="height:100%;">
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="LastMonth/cont1(Report).php" >
                        </div>
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="LastMonth/cont2(Report).php" >
                        </div>
                        <div class="col col-12 cont" style="height:50%;">
                            <embed src="LastMonth/cont3(Report).php" > 
                        </div>
                    </div>
                </div>
                <div class="main-container collapse fade indent show" id="custom" data-bs-parent="#myGroup">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"||isset($_SESSION['fdate'])==1&&isset($_SESSION['fdate'])==1){
                            
                            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                                $_SESSION['fdate']=$_POST['fdate'];
                                $_SESSION['tdate']=$_POST['tdate'];
                                $_SESSION['pers']=$_POST['pers'];
                            }
                            
                            $from_date=$_SESSION['fdate'];
                            $to_date=$_SESSION['tdate'];

                            if($from_date<=date('Y-m-d')&&$to_date<=date('Y-m-d')){
                    ?>
                    <div class="row g-0" style="height:100%;">
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="CustomReport/cont1(Report).php" >
                            <!--<embed src="../../Test/Report.php" >-->

                        </div>
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="CustomReport/cont2(Report).php" >
                        </div>
                        <div class="col col-12 cont" style="height:50%;">
                            <embed src="CustomReport/cont3(Report).php" > 
                        </div>
                    </div>
                    <?php
                        }else
                        {
                            echo "<h2>NO DATA</h2>";
                        }
                    }
                    else{
                    ?>
                        <div class="container">
                            <center>
                                <div class="alert alert-danger alert-dismissible border-danger" style="width:80%; text-align:left;">
                                    Date is not selected
                                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </center>
                        </div>
                        
                        <center>Date is not selected</center>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
else
{
    echo "<script>window.location.href='../../FacultyLogin.html';</script>";
}
?>