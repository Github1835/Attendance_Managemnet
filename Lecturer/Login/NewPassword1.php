<?php
session_start();
?>
<!DOCTYPE Html>
<Html>
    <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <Title>Password</Title>
        <link rel="stylesheet" href="../../FacultyLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            label{
                margin:40px;
            }
        </style>
    </Head>
    <Body>
        <?php
            if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
            {
        ?>
            <!-- Link Form Code -->
            <Div Class="main">
                <Div Class="Container">
                    <Form Action="NewPassword2.php" method="POST">
                        <Div Class="Data">
                            <Label style="font-size: 1em;">New Password</Label>
                            <Input Type="Password" name="newpass" required placeholder="Pasword"/>
                        </Div>
                        <input type="hidden" value="">
                        <Div Class="Data">
                            <Label style="font-size: 1em;">Confirm Password</Label>
                            <Input Type="Password" name="Confirmpass" required placeholder="Pasword"/>
                        </Div> 
                        <Div Class="Data">
                            <Label style="font-size: 0.6em;">
                                <?php
                                echo $_SESSION['Password'];
                                ?>
                            </Label>
                        </Div> 
                        <Div Class="Btn">
                            <Div Class="Inner"></Div>
                            <Button Type="Submit">Submit</Button>
                        </Div> 
                    </Form>
                </Div>
            </Div>
            <!-- Link form code Ends -->
        <?php
            }
            else
            {
                echo "<script>window.location.href='ForgotPassword.php';</script>";
            }
        ?>
    </Body>
</Html>