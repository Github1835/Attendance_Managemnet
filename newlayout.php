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
                        <button data-bs-toggle="collapse" data-bs-target="#tog">Custom</button>
                    </div>
                    <div class="col collapse fade" id="tog">
                        <form action="">
                            <label for="sdate" class="form-label">From: </label>
                            <input type="date" id="sdate" name="sdate" class="form-control" required><br>
                            <label for="edate" class="form-label">To: </label>
                            <input type="date" id="edate" name="edate" class="form-control" required><br>
                            <center><input type="submit" value="Generate" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="main-container collapse fade indent show" id="thismonth" data-bs-parent="#myGroup">
                    <div class="row g-0" style="height:100%;">
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="Lecturer/php/ThisMonth/cont1(Report).php" >
                        </div>
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="Lecturer/php/ThisMonth/cont2(Report).php" >
                        </div>
                        <div class="col col-12 cont" style="height:50%;">
                            <embed src="Lecturer/php/ThisMonth/cont3(Report).php" >
                        </div>
                    </div>
                </div>
                <div class="main-container collapse fade indent" id="priviousmonth" data-bs-parent="#myGroup">
                    <div class="row g-0" style="height:100%;">
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="Lecturer/php/LastMonth/cont1(Report).php" >
                        </div>
                        <div class="col col-6 cont" style="height:50%;">
                            <embed src="Lecturer/php/LastMonth/cont2(Report).php" >
                        </div>
                        <div class="col col-12 cont" style="height:50%;">
                            <embed src="Lecturer/php/LastMonth/cont3(Report).php" > 
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
<?php
}
else
{
    echo "<script>window.location.href='../FacultyLogin.html';</script>";
}
?>