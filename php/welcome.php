<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../HTML/login.html");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Gaming Portal</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/animate.min.css" rel="stylesheet">
        <link href="../js/wow.min.js" rel="script">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>

    <!--Navbar-->

    <div class="navbar navbar-inverse navbar-fixed-top navbar-inner">
        <div class="container">
            <a class="navbar-brand" href="#">
                The Gaming Portal
            </a>

            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome <?= $_SESSION['user']; ?></a></li>
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#games">Games</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li><a href="../HTML/developers.html">Developers</a></li>
                </ul>
            </div>





        </div>
    </div>

    <!--Header-->

    <div id="header" class="header navbar-header">
        <div class="container-fluid">
            <div class="row myheader">
                <div class="jumbotron col">
                    <h1 class="wow bounceInLeft" data-wow-delay="0.5s">The Gaming Portal</h1>
                    <p class="wow bounceInUp" data-wow-delay="1s">Lorem Ipsum is simply dummy text of the printing and
                        typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of
                        type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!--Games-->

    <div id="games" class="game">
        <div class="container-fluid">

            <h1>Games</h1>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="../HTML/tank.html"><img src="../img/login_face.png"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>Game 1</h2>
                    <p>Game 1 Description: It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="../HTML/dx.html"><img src="../img/login_face.png"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>Game 2</h2>
                    <p>Game 1 Description: It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="../HTML/Invaders.html"><img src="../img/login_face.png"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>Game 3</h2>
                    <p>Game 1 Description: It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>

    <!--Services-->
    <div class="services" id="services">
        <div class="container-fluid">
            <div class="row services-title">
                <div class="col-md-12 wow flipInX" data-wow-delay="0.8s">
                    <h1>Services</h1>
                    <p>Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum</p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 col-md-4 services-content wow flipInX" data-wow-delay="0.4s">
                    <img src="../img/playIcon.svg" width="320" height="320">
                    <h3>Play</h3>
                    <p>Play world-renowned games</p>
                </div>
                <div class="col-lg-4 col-md-4 services-content wow flipInX" data-wow-delay="0.8s">
                    <img src="../img/Compete.svg" width="320" height="320">
                    <h3>Compete</h3>
                    <p>Compete the best players in the world</p>
                </div>
                0297

                <div class="col-lg-4 col-md-4 services-content wow flipInX" data-wow-delay="1.2s">
                    <img src="../img/winIcon.svg" width="320" height="320">
                    <h3>Win</h3>
                    <p>Jump higher on the leaderboard</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mypanel">
        <div class="container-fluid">
            <p>2017-The Gaming Portal</p>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    </body>
    </html>

    <?php
}
?>