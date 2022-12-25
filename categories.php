<!DOCTYPE html>
<html>

<head>
    <title>Blind's Library - Categories</title>

    <link rel="stylesheet" href="css/categories.css">
    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/pop_up.css">
    <link rel="stylesheet" href="css/side_bar.css">

    <script src="scripts/header.js"></script>
    <script src="scripts/side_bar.js"></script>
    <script src="scripts/tests.js"></script>
    <script src="scripts/main_func.js"></script>
</head>

<body style="margin: 0;">
    <div class="background"
        style="z-index:-99; position: fixed; top:0; left: 0; background:linear-gradient(0deg, #AC6675, #534666, #534666); width: 100%; height: 100%">
    </div>
    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->
    <?php
    include 'headbar.php';
    ?>

    <!--!!!!!!!!!!!!!!!!    SIDE BAR    !!!!!!!!!!!!!!!!-->
    <?php
    include 'sidebar.php';
    ?>

    <!--!!!!!!!!!!!!!!!!    POPUPS    !!!!!!!!!!!!!!!!-->
    <?php
    include 'popups.php';
    ?>
</body>

</html>