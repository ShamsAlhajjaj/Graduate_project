<!DOCTYPE html>
<html>

<head>
    <title>Login | Blind's Library</title>
    <link rel="stylesheet" href="css/signup_login.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/pop_up.css">

    <script src="scripts/main_func.js"></script>
    <script src="scripts/pop_up.js"></script>
    <script src="scripts/header.js"></script>

    <script src="scripts/Tests.js"></script>

</head>

<body style="margin: 0;">
    <div class="background"
        style="z-index:-99; position: fixed; top:0; left: 0; background:linear-gradient(0deg, #AC6675, #534666, #534666); width: 100%; height: 100%">
    </div>

    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->

    <?php include 'headbar.php' ?>

    <div class="MainDiv">
        <form class="SignUpSide" method="POST" action="#">
            <p style="font-size: 60px;">Sign up</p>
            <div class="FNname">
                <input id='NewUserFN' class="TextboxsPopUp" type="text" placeholder="First Name" name="firstName">
                <input id='NewUserLN' class="TextboxsPopUp" type="text" placeholder="Last Name" name="lastName">
            </div>
            <input id='NewEmail' class="TextboxsPopUp" type="email" placeholder="Email" name="email">
            <div>
                <input id='NewPassword' class="TextboxsPopUp" type="password" placeholder="Password" name="password">
                <input id='ReNewPassword' class="TextboxsPopUp" type="password" placeholder="Confirm Password">

            </div>
            <div>
                <button class="SignUpButton" onclick="SignUpCheak()" name="signUp">Sign Up</button>
            </div>
            
        <?php   
        if (isset($_POST['signUp'])) {
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $db = new PDO("mysql:host=localhost;dbname=shams; cahrset=tuf8;", 'root', '');

            $query = $db->prepare("INSERT INTO gettable (firstName, lastName, email, password) VALUES ('{$fname}', '{$lname}', '{$email}', '{$pass}')");

            $query->execute();
            echo "<h3>Sign Up OK</h3>";
        } else
            echo '<h3>There is a problem sign up!</h3>';
        ?>
        </form>
        <form class="LoginSide" method="POST" action="#">
            <p style="font-size: 60px;">Login</p>
            <div>
                <input id='Email' class="TextboxsPopUp" type="text" placeholder="Email" name="email">
                <input id='Password' class="TextboxsPopUp" type="password" placeholder="Password" name="password">
            </div>
            <div>
                <button class="LoginButton" onclick="LoginCheak()" name="logIn">Login</button>
            </div>
            <p> or Login using your accounts: </p>
            <div class="IconsMargin">
                <button class="Socialicons"><img src="_images/social-media-icons/google_logo_72.png"
                        width="38px"></button>
                <button class="Socialicons"><img src="_images/social-media-icons/facebook_logo_72.png"
                        width="42px"></button>
                <button class="Socialicons"><img src="_images/social-media-icons/apple_logo_pop.png"
                        width="42px"></button>
            </div>
        </form>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=shams; cahrset=tuf8;", 'root', '');

        if (isset($_POST['logIn'])) {
            if (empty($_POST['email']) || empty($_POST['email'])) {
                echo '<h1>all fields are required</h1>';
            } else {

                $query = $db->prepare("SELECT * FROM gettable WHERE email = :email AND password = :password");
                $query->execute(array(
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ));
                $count = $query->rowCount();
                if ($count > 0) {
                    echo '<h1>login ok</h1>';
                } else {
                    echo '<h1>there is a problem ...</h1>';
                }
            }
        }


        ?>
    </div>
</body>

</html>