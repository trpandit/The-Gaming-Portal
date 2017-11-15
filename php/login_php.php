<?php

$message = "";

$n = $_GET["u"];
$p = $_GET["p"];

if (count($_GET) > 0) {
    $servername = "localhost";
    $username = "tirth";
    $password = "tirth";
    $dbname = "Project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //$conn = mysqli_connect("localhost","root","","phppot_examples");

    $result = mysqli_query($conn, "SELECT * FROM user_detail WHERE name='" . $_GET["u"] . "' and password = '" . $_GET["p"] . "'");
    $count = mysqli_num_rows($result);

    $arr = mysqli_fetch_array($result);

    if ($count == 0) {
        $message = "Invalid Username or Password!";
        echo $message;
    } else {
        //$message = "You are successfully authenticated!"

        session_start();
        $_SESSION['user'] = $n;
        $_SESSION['id'] = $arr['id'];

        header("Location:welcome.php");
    }
}

?>