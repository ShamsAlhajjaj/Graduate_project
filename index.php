<!DOCTYPE html>
<html>

<head>

    <title>Blind's Library</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/pop_up.css">
    <link rel="stylesheet" href="css/side_bar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="scripts/header.js"></script>
    <script src="scripts/side_bar.js"></script>
    <script src="scripts/tests.js"></script>
    <script src="scripts/main_func.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>
    <script src="scripts/p5.speech.js"></script>

</head>

<body style="margin: 0;">

    <div class="background"
        style="z-index:-99; position: fixed; top:0; left: 0; background:linear-gradient(0deg, #AC6675, #534666, #534666); width: 100%; height: 100%">
    </div>
    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->
    <?php include 'headbar.php' ?>

    <!--!!!!!!!!!!!!!!!!    POPUPS    !!!!!!!!!!!!!!!!-->
    <?php include 'popups.php' ?>

    <!--!!!!!!!!!!!!!!!!    BODY    !!!!!!!!!!!!!!!!-->
    <?php include 'sidebar.php' ?>


    <div id="Body" class="ListBooks">

        <?php
        include 'plugins\search.php';
        ?>


    </div>

    <script>
    function search(value) {
        var button = document.getElementById('search');
        var inputField = document.getElementById('SrchBoxFn');

        inputField.value = value;
        button.click();
        console.log("search by voice ok!");
    }



    let myRec = new p5.SpeechRec('ar-JO', parseResult);
    myRec.continuous = true;

    let micStatus = false;


    document.body.onkeydown = function(e) {
        if (e.key == " " ||
            e.code == "Space" ||
            e.keyCode == 32
        ) {
            if (!micStatus) {
                myRec.start();
                micStatus = true;
                mySpeech_en.pause();
            }

        }
    }

    document.body.onkeyup = function(e) {
        if (e.key == " " ||
            e.code == "Space" ||
            e.keyCode == 32
        ) {

            if (micStatus) {
                myRec.stop();
                micStatus = false;
                mySpeech_en.resume();
            }
        }
    }

    function parseResult() {
        myRec.resultString
        resultArray = myRec.resultString.split(" ");

        console.log(resultArray.join(" "));

        if (resultArray.includes('??????????.')) {
            mySpeech_en.stop();
            visitPage('index.php')

        } else if (resultArray[0] + ' ' + resultArray[1] == '???????? ????' || resultArray[0] + ' ' + resultArray[1] ==
            '???????? ????') {
            resultArray.shift();
            resultArray.shift();
            search(resultArray.join(" ").slice(0, -1));
        } else if (resultArray[0] == '??????' || resultArray[0] == '????????' || resultArray[0] == '????????' || resultArray[
                0] ==
            '????????') {
            if (resultArray.includes('????????') || resultArray.includes('????????.') || resultArray.includes('??????????.')) {
                openBook(1);
            } else if (resultArray.includes("????????.") || resultArray.includes("????????????.")) {
                openBook(2);
            } else if (resultArray.includes("??????????.") || resultArray.includes("????????????.")) {
                openBook(3);
            } else if (resultArray.includes("??????????.") || resultArray.includes("????????????.")) {
                openBook(4);
            } else if (resultArray.includes("????????.") || resultArray.includes("????????????.")) {
                openBook(5);
            } else if (resultArray.includes("??????.") || resultArray.includes("????????????.")) {
                openBook(6);
            } else if (resultArray.includes("????????.") || resultArray.includes("????????????.")) {
                openBook(7);
            } else if (resultArray.includes("??????????.") || resultArray.includes("????????????.")) {
                openBook(8);
            } else if (resultArray.includes("????????????.") || resultArray.includes("????????.")) {
                openBook(9);
            } else if (resultArray.includes("????????????.") || resultArray.includes("????????.")) {
                openBook(10);
            }
        }
    }

    function readText(text) {
        mySpeech_en.speak(text)
    }


    function stopSpeak() {
        mySpeech_en.stop();
    }




    // ------------------------------------------"Enter Pressing" Scripts ------------------------------------------
    document.getElementById("SrchBoxFn")
        .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("SrchBooxBtnFn").click();
            }
        });
    document.getElementById("Email")
        .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("loginbtn").click();
            }
        });
    document.getElementById("Password")
        .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("loginbtn").click();
            }
        });
    </script>
</body>

</html>