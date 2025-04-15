<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Data</title>
    
</head>
<body>
    <center>
    <form action="Ins_admin_ser.php" method="POST">
        <table>
            <tr>
                <th>Admin ID</th>
                <td><input type="text" name="adminid" placeholder="Enter Admin ID"></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" placeholder="Enter Name"></td>
            </tr>
            <tr>
                <th>Email_ID</th>
                <td><input type="email" name="emailid" placeholder="Enter Email-ID"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password"  placeholder="Enter Password"></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><input type="number" name="contactno" placeholder="Enter Phone no"></td>
            </tr>
           
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>