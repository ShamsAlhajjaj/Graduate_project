<!DOCTYPE html>
<html>

<head>
    <title>Blind's Library - Help</title>
    <link rel="stylesheet" href="css/book_progress.css">
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
        <p class="HeaderText" role="button" onclick="visitPage('home.html')" onmouseover="readText('Go to the home page')" onmouseleave="stopSpeak()">Blind's Library</p>
        <div class="SearchBar">
            <input id="SrchBoxFn" class="SearchTextBox" type="search" onmouseover="readText('Search bar')"
                onmouseleave="stopSpeak()">
            <img id="SrchBooxBtnFn" class="SearchButton" src="_images/search-button-icon/search_button_icon.png" width="32px" role="button"
                onclick="searchBox()" onmouseover="readText('Search button')" onmouseleave="stopSpeak()">
        </div>
        <div id="UsrInfoFn" class="UserInfo">
            <div></div>
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
    <div class="Side_Body">
        <div id="SBMainFn" class="SideBar">
            <button class="SBBtns" onclick="visitPage('home.html')" onmouseover="readText(this.innerText)"
                onmouseleave="stopSpeak()">Home Page</button>
            <button class="SBBtns" onclick="visitPage('categories.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Categories</button>
            <button class="SBBtns" onclick="visitPage('advance_search.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Advanced Search</button>
            <button class="SBBtns" onclick="visitPage('request_book.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Request a Book</button>
            <button class="SBBtns" onclick="visitPage('login_volunteer.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Join Us As a Volunteer</button>
            <button class="SBBtns" onclick="visitPage('about_us.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">About Us</button>
            <button class="SBBtns" onclick="visitPage('help.html')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Help</button>
        </div>
        <button id="SBBtnFn" class="SBButton" onclick="SHButton()">
            <img id="SBArrwIcn" src="_images/side-bar-icons/close_button_icon.png" width="18px"></button>
    </div>
    <div class="Progress">
        <div class="ProgressHeader">
            <img src="_images/_un-optimized/books-cover/Book2thumb.jpg" width="160px">
            <div class="BookInfo">
                <div id="idBookName">Sherlock Holes: A Study In Scarlet </div>
                <div id="idBookVolunteer">no one working until now</div>
            </div>
        </div>
        <div><p>Book Progress 0%</p></div>
        <div class="Parts">
            <input type="radio" name="Pages"> <span>Pages 0 - 10</span><span></span>
            <input type="radio" name="Pages"> <span>Pages 10 - 20</span><span></span>
            <input type="radio" name="Pages"> <span>Pages 20 - 30</span><span></span>
            <input type="radio" name="Pages"> <span>Pages 30 - 40</span><span></span>
        </div>
        <div>
            <button class="UploadButton">Upload Your work</button>
            <button class="DownloadButton">Download the Book as PDF</button>
        </div>
    </div>
</body>
</html>