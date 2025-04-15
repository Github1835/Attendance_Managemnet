<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Data</title>
    
</head>
<body>
    <form action="Ins_branch_ser.php" method="POST">
        <table>
            <tr>
                <th>Branch ID</th>
                <td><input type="text" name="Branch_ID" placeholder="Enter Branch ID"></td>
            </tr>
            <tr>
                <th>Branch Name</th>
                <td><input type="text" name="BranchName" placeholder="Enter Branch Name"></td>
            </tr>
            <tr>
                <th>Lecturer ID</th>
                <td><input type="text" name="Lect_ID" placeholder="Enter Lecturer ID"></td>
            </tr>
           
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>