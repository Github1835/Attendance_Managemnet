<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event 1 Data</title>
    
</head>
<body>
    <form action="Ins_event1_ser.php" method="POST">
        <table>
            <tr>
                <th>Event No</th>
                <td><input type="number" name="evno" placeholder="Enter Event no"></td>
            </tr>
            <tr>
                <th>Event Name</th>
                <td><input type="text" name="evname" placeholder="Enter Name"></td>
            </tr>
            <tr>
                <th>Path</th>
                <td><input type="text" name="path" placeholder="Enter Path"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>