<!DOCTYPE html>
<html>

<head>
    <title>Blind's Library - About Us</title>
    <link rel="stylesheet" href="css/about_us.css">
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

    <div id="Body"></div>
    <div class="MainBody" style="color: white; font-size: 30px;">
        <div>
            <img src="_images/hola/TTU_LOGO.png">
        </div>
        <div>
            <p> The Blind Library is a graduation project submitted by a group of students from Tafila Technical University, majoring in Computer
                Engineering, for the second half of the academic year 2021-2022, under the supervision of Dr. Ziyad Al-Odat.
            </p>
        </div>
        <div>
            <p>Shams El-Deen Al-Hajjaj</p>
            <p>Mohammad Shamlakh</p>
            <p>Bara'a Al-Qatameen</p>
            <p>Eman Jaber</p>
        </div>
    </div>
</body>

</html>