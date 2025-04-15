<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Data</title>
    
</head>
<body>
    <form action="Ins_sub_ser.php" method="POST">
        <table>
            <tr>
                <th>Subject ID</th>
                <td><input type="text" name="Sub_ID" placeholder="Enter Subject ID"></td>
            </tr>
            <tr>
                <th>Subject Name</th>
                <td><input type="text" name="SubName" placeholder="Enter Subject Name"></td>
            </tr>
            <tr>
                <th>Sem ID</th>
                <td><input type="text" name="Sem" placeholder="Enter Semester"></td>
            </tr>
           
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>