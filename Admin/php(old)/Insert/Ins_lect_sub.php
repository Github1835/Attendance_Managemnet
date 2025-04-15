<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Data</title>
    
</head>
<body>
    <form action="Ins_lect_sub_ser.php" method="POST">
        <table>
            <tr>
                <th>Lecturer:</th>
                <td>
                    <select name="lect" Size="Number_of_options">
                        <?php
                            include('../../../db_connect.php');
                            $queryx="select *from lecturer";
                            $cmdx=mysqli_query($con,$queryx);
                            while($rowx=mysqli_fetch_array($cmdx))
                            {
                            ?>
                            <option value="<?php echo $rowx['Lect_ID'];?>"><?php echo $rowx['LectName'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                </td>
                <tr>
                <th>Subject:</th>
                <td>
                    <select name="sub" Size="Number_of_options">
                        <?php
                            include('../../../db_connect.php');
                            $queryx="select *from subject";
                            $cmdx=mysqli_query($con,$queryx);
                            while($rowx=mysqli_fetch_array($cmdx))
                            {
                            ?>
                            <option value="<?php echo $rowx['Sub_ID'];?>"><?php echo $rowx['SubName'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                </td>
                <tr>
           
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>