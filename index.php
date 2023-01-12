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

        if (resultArray.includes('تحديث.')) {
            mySpeech_en.stop();
            visitPage('index.php')

        } else if (resultArray[0] + ' ' + resultArray[1] == 'ابحث عن' || resultArray[0] + ' ' + resultArray[1] ==
            'أبحث عن') {
            resultArray.shift();
            resultArray.shift();
            search(resultArray.join(" ").slice(0, -1));
        } else if (resultArray[0] == 'شغل' || resultArray[0] == 'اذهب' || resultArray[0] == 'أفتح' || resultArray[
                0] ==
            'افتح') {
            if (resultArray.includes('واحد') || resultArray.includes('واحد.') || resultArray.includes('الأول.')) {
                openBook(1);
            } else if (resultArray.includes("تنين.") || resultArray.includes("الثاني.")) {
                openBook(2);
            } else if (resultArray.includes("تلاتة.") || resultArray.includes("الثالث.")) {
                openBook(3);
            } else if (resultArray.includes("أربعة.") || resultArray.includes("الرابع.")) {
                openBook(4);
            } else if (resultArray.includes("خمسة.") || resultArray.includes("الخامس.")) {
                openBook(5);
            } else if (resultArray.includes("ستة.") || resultArray.includes("السادس.")) {
                openBook(6);
            } else if (resultArray.includes("سبعة.") || resultArray.includes("السابع.")) {
                openBook(7);
            } else if (resultArray.includes("تمانة.") || resultArray.includes("الثامن.")) {
                openBook(8);
            } else if (resultArray.includes("التاسع.") || resultArray.includes("تسعة.")) {
                openBook(9);
            } else if (resultArray.includes("العاشر.") || resultArray.includes("عشرة.")) {
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