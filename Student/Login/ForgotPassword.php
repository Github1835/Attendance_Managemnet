<?php
setcookie('SESSION','SESSION',time()+180);
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

        <!-- Link Form Code -->
        <Div Class="Center">
            <Div Class="Container">
                <Form Action="OTP1.php" method="POST">
                    <Div Class="Data">
                        <Label>Enrollment number To select Email</Label>
                        <Input Type="Text" Required name="eno"/>
                    </Div>
                    <div class="Data">
                        <label>OTP will be sent your on email</label>
                    </div>
                    <Div Class="Btn">
                        <Div Class="Inner"></Div>
                        <Button Type="Submit">Submit</Button>
                    </Div>
                </Form>
            </Div>
        </Div>
        <!-- Link form code Ends -->
    </Body>
</Html>