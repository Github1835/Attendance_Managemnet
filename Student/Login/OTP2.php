<?php
session_start();
?>
<!DOCTYPE Html>
<Html>
    <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <Title>Password</Title>
        <Link Rel="Stylesheet" Href="../css/StudentLogin.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </Head>
    <Body>
        <?php
            if(isset($_SESSION['Email_ID'])&&isset($_COOKIE['SESSION'])==1)
            {
        ?>
            <!-- Link Form Code -->
            <Div Class="Center">
                <Div Class="Container">
                    <Form Action="OTP3.php" method="POST">
                        <Div Class="Data">
                            <Label>Email</Label>
                            <Input Type="Text" name="email" value="<?php echo $_SESSION['Email_ID']; ?>" readonly/>
                        </Div>
                        <input type="hidden" value="">
                        <Div Class="Data">
                            <Label>OTP</Label>
                            <Input Type="Text" name="OTP" required/>
                        </Div> 
                        <Div Class="Data">
                            <Label><?php echo $_SESSION['otpinfo']; ?></Label>
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