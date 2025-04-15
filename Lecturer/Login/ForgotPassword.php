<?php
setcookie('SESSION','SESSION',time()+180);
?>
<!DOCTYPE Html>
<Html>
    <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <Title>Password</Title>
        <link rel="stylesheet" href="../../FacultyLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </Head>
    <Body>

        <!-- Link Form Code -->
        <Div Class="main">
            <Div Class="Container">
                <Form Action="OTP1.php" method="POST">
                    <Div Class="Data">
                        <Label style="font-size: 1em;">Lecturer ID To select Email</Label>
                        <Input Type="Text" placeholder="Lecturer ID" Required name="Lect_ID"/>
                    </Div>
                    <div class="Data">
                        <label style="font-size: 0.8em;">OTP will be sent your on email</label>
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