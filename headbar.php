<div class="HeaderBar">
    <p class="HeaderText" role="button" onclick="visitPage('index.php')" onmouseover="readText('اذهب للصفحة الرئيسيةِ')"
        onmouseleave="stopSpeak()">المكتبة الصوتية</p>
    <form class="SearchBar" method="GET">
        <input id="SrchBoxFn" class="SearchTextBox" type="search" onmouseover="readText('شريطُ البحث')"
            onmouseleave="stopSpeak()" name="search">

        <button type="submit" name="btn_search" id="search" class="SearchButton"><img id="SrchBooxBtnFn"
                src="_images/search-button-icon/search_button_icon.png" width="32px" role="button" onclick="searchBox()"
                onmouseover="readText('زر البحث')" onmouseleave="stopSpeak()"></button>
    </form>
    <div id="UsrInfoFn" class="UserInfo">
        <!--button class="LoginHeader" onclick="visitPage('SignUp_Login.php')" onmouseover="readText(this.innerText)"
            onmouseleave="stopSpeak()">Login</button>
        <button id="UsrIcnFn" class="UserIcon" onclick="openPopUP()" onmouseover="readText('User info')"
            onmouseleave="stopSpeak()">
            <img src="_images/guest-user-icon/guest_user_icon_transparent.png" width="32px">
        </button-->
    </div>
</div>