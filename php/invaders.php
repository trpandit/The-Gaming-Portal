<?php

session_start();

$u = $_SESSION["user"];

if (!isset($_SESSION["user"])) {
    header("Location: ../HTML/login.html");
} else {

    if (isset($_GET["scr"])) {
        $servername = "localhost";
        $username = "tirth";
        $password = "tirth";

        $score = $_GET["scr"];

        $dbname = "Project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $count = $_SESSION['id'];

        echo $count;

        $sql = "INSERT INTO user_game_info (user_id, game_id, score) VALUES ('$count','3', '$score')";

        if ($conn->query($sql) === false) {
            echo "ErroR Inserting tabel" . $conn->error;
        }

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>demo</title>

    <link href="../css/intermidiate.css" rel="stylesheet">
    <link href="../js/demo.js" rel="script">
</head>
<body>

<img src="../img/trophy%20(1).png" style="padding-left: 43%">
<div class="flappy-dialog">
    <h2> Congretulations !!</h2>

    <h1>Your Score is ..</h1>
    <h2 style="color: #0E1119"><?= $score ?></h2>

    <div class="flappy-dialog-buttons">
        <div class="left-flap"></div>
        <button onclick="openHome()">Home</button>
        <button onclick="openLB()">board</button>
        <div class="right-flap"></div>
    </div>
</div>

<script>

    function openHome() {
        location.href = 'welcome.php';
    }

    function openLB() {
        location.href = 'leaderBoard.php';
    }
</script>

</body>
</html>

