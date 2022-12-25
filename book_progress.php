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

<body style="margin: 0;">
    <div class="background"
        style="z-index:-99; position: fixed; top:0; left: 0; background:linear-gradient(0deg, #534666, #853065, #534666); width: 100%; height: 100%">
    </div>

    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->
    <?php
    include 'headbar.php';
    ?>

    <!--!!!!!!!!!!!!!!!!    POPUPS    !!!!!!!!!!!!!!!!-->
    <?php
    include 'popups.php';
    ?>

    <!--!!!!!!!!!!!!!!!!    BODY    !!!!!!!!!!!!!!!!-->
    <?php
    include 'sidebar.php';
    ?>
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