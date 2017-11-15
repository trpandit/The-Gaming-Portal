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
                    <p class="wow bounceInUp" data-wow-delay="1s">Ladies and Gentlemen, hola!
                        You might be tired of that lame assignment your boss gave you and want to spend some quality time,
                        or you might just be procrastinating your submissions in school, or better yet, you might just be a
                        bored guy sitting all day doing nothing. What if I tell you all the solutions to your problems  are here?
                        If you are here already, Welcome to <b>The Gaming Portal</b>. So, bolster your guns, wear your armors and
                        be a part of this highly competitive phenomenon! See you on the other side.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!--Games-->

    <div id="games" class="game">
        <div class="container-fluid">

            <h1>Games</h1>
            <div class="row" style="padding-left: 1%">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="../HTML/tank.html"><img src="../img/tanks.jpg"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>Tanks</h2>
                    <p>You are a stranded tank in an island. Enemy tanks are coming to destroy you. You must
                        go to safety. But the only way is hold all tanks before your troops arrive. Destroyed as many tanks as
                        you can in 30 seconds. Go now before enemy tanks overpower you!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="#" onclick="alert('Please Log In !')"><img src="../img/dxball.gif"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>DX-Ball</h2>
                    <p>You have seen this game style before. DX Ball continues where Pong, Arkanoid and other games
                        before it left off. A ball is bouncing around and breaking bricks. You bounce it back up
                        to break more and if you let the ball pass your paddle, then you lose a life. Advance to
                        the next level by breaking all the bricks.
                        Of course it seems too simple to be addicting. But that is the beauty of DX Ball. The simplicity
                        means you don't have to spend hours climbing a learning curve before it is fun. You can download
                        the game and have fun playing immediately.</p>
                </div>
            </div>
            <div class="row" style="padding-left: 3%">
                <div class="col-lg-4 col-md-4 col-img wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="#" onclick="alert('Please Log In !')"><img src="../img/invaders.jpg"/></a>
                </div>
                <div class="col-lg-8 col-md-8 col-des wow lightSpeedIn" data-wow-delay="1s">
                    <h2>Invaders</h2>
                    <p>Remember this old classic? Space Invaders is one of the most addicting games that was ever made.
                        The idea is very simplistic. You are a space ship who must destroy the invading enemy space ships
                        as they descend upon your little 8-bit world. Use the [SPACE] bar to fire your gun at them and
                        blow each ship to pieces. Be careful though, because these ships fire back and as you deplete
                        their numbers, the space invaders get faster and faster until the last remaining ship appears
                        to move at near warp speed. To ensure you stay alive as long as possible, hide behind the green
                        walls and develop and a run-and-gun mentality. Try to blast out whole rows of space invaders at
                        once as it makes it easier to shoot into a crowd rather than pinpoint each individual ship.</p>
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