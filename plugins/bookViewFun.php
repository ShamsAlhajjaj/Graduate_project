<?php
function bookView($name, $des, $coverSrc)
{

    return
        '<div id="Book002" class="Book" onmouseover="readText(this.innerText)" onmouseleave="stopSpeak()"
            onclick="visitPage(\'listening.php\')">
                <img class="BookCover" src="' . $coverSrc . '">
                <div class="BookInfo">
                    <p class="BookName">' . $name . '</p>
                    <p class="BookDescription">' . $des . '</p>
                 </div>
            </div>';
}