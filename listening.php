<!DOCTYPE html>
<html>

<head>

    <title>Book Playback</title>

    <link rel="stylesheet" href="css/header_styles.css">
    <link rel="stylesheet" href="css/pop_up.css">
    <link rel="stylesheet" href="css/side_bar.css">


    <script src="scripts/header.js"></script>
    <script src="scripts/side_bar.js"></script>
    <script src="scripts/Tests.js"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/playback.css">
    <script src="scripts/p5.speech.js" defer></script>
    <script src="scripts/main_func.js"></script>
    <script src="playback.js" defer></script>
    <link rel="shortcut icon" href="_images/playback_images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>


</head>

<body style="margin: 0; background: linear-gradient(320deg, #42E695, #3BB2B8);">

    <!--!!!!!!!!!!!!!!!!    HEADER BAR   !!!!!!!!!!!!!!!!-->
    <?php include 'headbar.php' ?>



    <!--!!!!!!!!!!!!!!!!    POPUPS    !!!!!!!!!!!!!!!!-->
    <?php include 'popups.php' ?>


    <!--!!!!!!!!!!!!!!!!    BODY    !!!!!!!!!!!!!!!!-->
    <?php
    include 'sidebar.php';
    ?>

    <!--!!!!!!!!!!!!!!!!    PLAYER    !!!!!!!!!!!!!!!!-->
    <div class="player">
        <div class="wrapper">
            <div class="details">
                <div class="now-playing">PLAYING x OF y</div>
                <div class="track-art"></div>
                <div class="track-name">Track Name</div>
                <div class="track-artist">Track Artist</div>
            </div>

            <div class="slider_container" onmouseover="readText('time slider')" onmouseleave="stopSpeak()">
                <div class="current-time">00:00</div>
                <input type="range" min="1" max="100" value="0" class="seek_slider" onchange="seekTo()">
                <div class="total-duration">00:00</div>
            </div>

            <div class="slider_container" onmouseover="readText('Volume slider')" onmouseleave="stopSpeak()">
                <i class="fa fa-volume-down"></i>
                <input type="range" min="1" max="100" value="99" class="volume_slider" onchange="setVolume()">
                <i class="fa fa-volume-up"></i>
            </div>

            <div class="buttons">
                <div class="random-track" onclick="randomTrack()" onmouseover="readText('shuffle')"
                    onmouseleave="stopSpeak()">
                    <i class="fas fa-random fa-2x" title="random"></i>
                </div>
                <div class="prev-track" onclick="prevTrack()" onmouseover="readText('previous')"
                    onmouseleave="stopSpeak()">
                    <i class="fa fa-step-backward fa-2x"></i>
                </div>
                <div class="playpause-track" onclick="playpauseTrack()" onmouseover="readText('playpause')"
                    onmouseleave="stopSpeak()">
                    <i class="fa fa-play-circle fa-5x"></i>
                </div>
                <div class="next-track" onclick="nextTrack()" onmouseover="readText('next')" onmouseleave="stopSpeak()">
                    <i class="fa fa-step-forward fa-2x"></i>
                </div>
                <div class="repeat-track" onclick="repeatTrack()" onmouseover="readText('repeat')"
                    onmouseleave="stopSpeak()">
                    <i class="fa fa-repeat fa-2x" title="repeat"></i>
                </div>
            </div>

            <div id="wave">
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
                <span class="stroke"></span>
            </div>
        </div>
    </div>
</body>

</html>