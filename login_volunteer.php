<!DOCTYPE html>
<html>

<head>
    <title>Blind's Library - Login (Volunteer)</title>
    <link rel="stylesheet" href="css/login_volunteer.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/pop_up.css">
    <link rel="stylesheet" href="css/side_bar.css">

    <script src="scripts/header.js"></script>
    <script src="scripts/side_bar.js"></script>
    <script src="scripts/tests.js"></script>
    <script src="scripts/main_func.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>
    <script src="scripts/p5.speech.js"></script>

</head>

<body class="mainBody" style="margin: 0; background-color: rgb(30, 200, 170);">

    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->
    <div class="HeaderBar">
        <p class="HeaderText" role="button" onclick="visitPage('home.html')"
            onmouseover="readText('Go to the home page')" onmouseleave="stopSpeak()">Blind's Library</p>
        <div class="SearchBar">
            <input id="SrchBoxFn" class="SearchTextBox" type="search" onmouseover="readText('Search bar')"
                onmouseleave="stopSpeak()">
            <img id="SrchBooxBtnFn" class="SearchButton" src="_images/search-button-icon/search_button_icon.png"
                width="32px" role="button" onclick="searchBox()" onmouseover="readText('Search button')"
                onmouseleave="stopSpeak()">
        </div>
        <div id="UsrInfoFn" class="UserInfo">
            <button class="LoginHeader" onclick="visitPage('SignUp_Login.html')" onmouseover="readText(this.innerText)"
                onmouseleave="stopSpeak()">Login</button>
            <button id="UsrIcnFn" class="UserIcon" onclick="openPopUP()" onmouseover="readText('User info')"
                onmouseleave="stopSpeak()">
                <img src="_images/guest-user-icon/guest_user_icon_transparent.png" width="32px">
            </button>
        </div>
    </div>

    <!--!!!!!!!!!!!!!!!!    POPUPS    !!!!!!!!!!!!!!!!-->
    <div id="PopUp1" class="LoginPopUp">
        <p> You are not Login yet<br>Log in or Create a new account </p>

        <div>
            <input id="Email" class="TextboxsPopUp" type="text" placeholder="Email" onmouseover="readText('Email box')"
                onmouseleave="stopSpeak()">
            <input id="Password" class="TextboxsPopUp" type="password" placeholder="Password"
                onmouseover="readText('password box')" onmouseleave="stopSpeak()">
        </div>

        <div>
            <button id="loginbtn" class="LoginButton" onclick="LoginCheak()" onmouseover="readText(this.innerText)"
                onmouseleave="stopSpeak()">Login</button><br><button class="SignUpButton"
                onclick="visitPage('SignUp_Login.html')" onmouseover="readText(this.innerText)"
                onmouseleave="stopSpeak()">Sign Up</button>
        </div>
        <p> or Login using your accounts: </p>
        <div>
            <button class="Socialicons"><img src="_images/social-media-icons/google_logo_pop.png" width="44px"
                    onmouseover="readText('Sign in with google')" onmouseleave="stopSpeak()"></button>
            <button class="Socialicons"><img src="_images/social-media-icons/facebook_logo_pop.png" width="44px"
                    onmouseover="readText('Sign in with facebook')" onmouseleave="stopSpeak()"></button>
            <button class="Socialicons"><img src="_images/social-media-icons/apple_logo_pop.png" width="44px"
                    onmouseover="readText('Sign in with Apple ID')" onmouseleave="stopSpeak()"></button>
        </div>
    </div>

    <!--!!!!!!!!!!!!!!!!    BODY    !!!!!!!!!!!!!!!!-->

    <div class="MainDiv">
        <div class="SignUpSide">
            <p style="font-size: 60px;">Sign up</p>
            <div class="FNname">
                <input id='NewUserFN' class="TextboxsPopUp" type="text" placeholder="First Name">
                <input id='NewUserLN' class="TextboxsPopUp" type="text" placeholder="Last Name">
            </div>
            <input id='NewEmail' class="TextboxsPopUp" type="text" placeholder="Email">
            <div>
                <input id='NewPassword' class="TextboxsPopUp" type="password" placeholder="Password">
                <input id='ReNewPassword' class="TextboxsPopUp" type="password" placeholder="Confirm Password">
            </div>
            <div>
                <button class="SignUpButton" onclick="SignUpCheak()">Trial Task</button>
            </div>
        </div>
        <div class="LoginSide">
            <p style="font-size: 60px;">Login</p>
            <div>
                <input id='Email' class="TextboxsPopUp" type="text" placeholder="Email">
                <input id='Password' class="TextboxsPopUp" type="password" placeholder="Password">
            </div>
            <div>
                <button class="LoginButton" onclick="LoginCheak()">Login</button>
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
        </div>
    </div>
</body>

</html>