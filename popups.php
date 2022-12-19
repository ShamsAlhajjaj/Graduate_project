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
            onclick="visitPage('SignUp_Login.php')" onmouseover="readText(this.innerText)"
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