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
    // let mySpeech_en = new p5.Speech();
    // mySpeech_en.setLang("en-US");
    // mySpeech_en.setVoice('Alice')
    //mySpeech_en.speak("Welcome to the library home page, you can hover your mouse to view the contents")

    function search(value) {
        var button = document.getElementById('search');
        var inputField = document.getElementById('SrchBoxFn');

        inputField.value = value;
        button.click();
        console.log("search by voice ok!");
    }



    let myRec = new p5.SpeechRec('en-US', parseResult);
    myRec.continuous = true;
    // myRec.interimResults = true;
    myRec.timeout = 100000;
    myRec.start();

    function parseResult() {
        myRec.resultString
        resultArray = myRec.resultString.split(" ");

        console.log(resultArray.join(" "));

        if (resultArray[0] == 'Search') {
            resultArray.shift();
            search(resultArray.join(" ").slice(0, -1));
        } else if (resultArray[0] == 'Open') {
            if (resultArray.includes('1.') || resultArray.includes('#1.') || resultArray.includes('1') || resultArray
                .includes('one') || resultArray.includes('one.')) {
                openBook(1);
            }
            if (resultArray.includes('2.') || resultArray.includes('#2.') || resultArray.includes('2') || resultArray
                .includes('two') || resultArray.includes('two.')) {
                openBook(2);
            }
            if (resultArray.includes('3.') || resultArray.includes('#3.') || resultArray.includes('3') || resultArray
                .includes('three') || resultArray.includes('three.')) {
                openBook(3);
            }
            if (resultArray.includes('4.') || resultArray.includes('#4.') || resultArray.includes('4') || resultArray
                .includes('four') || resultArray.includes('four.')) {
                openBook(4);
            }

            if (resultArray.includes('5.') || resultArray.includes('#5.') || resultArray.includes('5') || resultArray
                .includes('five') || resultArray.includes('five.')) {
                openBook(5);
            }
            if (resultArray.includes('6.') || resultArray.includes('#6.') || resultArray.includes('6') || resultArray
                .includes('six') || resultArray.includes('six.')) {
                openBook(6);
            }
            if (resultArray.includes('7.') || resultArray.includes('#7.') || resultArray.includes('7') || resultArray
                .includes('seven') || resultArray.includes('seven.')) {
                openBook(7);
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