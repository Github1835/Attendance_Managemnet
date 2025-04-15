<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
      }
      .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
      }
      .option {
        display: inline-block;
        width: 150px;
        height: 150px;
        margin-right: 20px;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
        text-align: center;
        line-height: 150px;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-decoration:none;
        transition:all 0.2s;
    }
    .option:hover {
        background-color:#00FF62;
        color:white;
        box-shadow:0 0 4px 3px #555;
    }
    #main{
        background-position: center center;
        background-image:url('../Image/Lecturer.png');
        background-repeat: no-repeat;
    }
    #main:hover{
        background-color:white;
    }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="option" id="main"></div><br>
      <a href="Insert/Ins_lect.php" class="option">Insert</a>
      <a href="Delete/delete_lect.php" class="option">Update</a>
    </div>
  </body>
</html>
