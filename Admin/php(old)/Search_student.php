<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search Student</title>
        <link rel="stylesheet" href="../Menu/Menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="../../Lecturer/css/Insert.css">-->
        
        <style>
            *{
                margin:0;
                padding:0;
            }
            table{
                background-color:white;
            }
            .searchbar{
                padding-top:5%;
            }
            td{
                padding:10px;
            }
            .tb{
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.411);
                transition: 0.3s;
            }
            .tb:hover{
                box-shadow: 0 0 13px rgba(0, 0, 0, 1);
            }
            input[type='number'], input[type="text"]{
                padding: 5px;
                text-align: center;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.411);
                background-color: rgba(0, 0, 0, 0.075);
            }
            input[type='number']:hover, input[type="text"]:hover{
                box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.616);
            }
            .tb input[type='submit'], button{
                padding: 5px;
                width: 100%;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.411);
            }
            .tb input[type='submit']:hover ,button:hover{
                box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.616);
            }
            .tb a{
                text-decoration: none;
                color: black;
            }
            .tb a:hover{
                text-decoration:underline;
            }
            th
            {
                padding: 10px;
                box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.411);
                border-radius: 5px;
                background-color: bisque;
                border: 1px solid;
            }
            @media screen and (max-width:600px){
                .searchbar{
                padding-top:15%;
            }
            }
        </style>
    </head>
    <body>
        
        <form method="POST" action="Search_student.php">
        <center>
            <div class="searchbar">
                <table>
                <tr class="tb">
                    <td>
                        <input type="text" placeholder="Search..." name="StuInfo" style="width:70%" required style="float:left;"><button type="submit" style="width:30%;" style="padding:10px;">Search</button>
                    </td>
                </tr>
            </table>
            </div>
        </center>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

            include('../../db_connect.php');
            $stuinfo=$_POST['StuInfo'];

            if($stuinfo!=null)
            {
                $check=ord($stuinfo[0]);
            }

            $query="select *from student where";
            if($stuinfo==null)
            {
                $query="select *from student";
            }else if($check>=48&&$check<=57)
            {
                $query.=" StuRollno='$stuinfo'";
            }else
            {
                $query.=" StuName like '%$stuinfo%'";
            }
            
            $cmd=mysqli_query($con,$query);
            if(mysqli_fetch_row($cmd)!=0){
            ?>
            <center>
            
            <table cellspacing="5px">
                <tr>
                <th>Enrollment number</th>
                <th>Name</th>
                </tr>
                <?php
                        $cmd=mysqli_query($con,$query);
                        while ($row=mysqli_fetch_array($cmd)) {
                ?>
                <tr class="tb">
                    <td><a href="../../Lecturer/php/studentdata1.php?StuRollno=<?php echo $row['StuRollno'];?>"><?php echo $row['StuRollno'];?></a></td>
                    <td><?php echo $row['StuName']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            </center>

            <?php
                }
                else
                {
                    ?>
                    <center>
                    <tr>
                        <td><h3>No Data</h3></td>
                    </tr>
                    </center>
                    <?php
                }
            }
        ?>
    </body>
</html>