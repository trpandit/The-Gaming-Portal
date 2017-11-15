<?php

$name = $_GET["user_name"];
$email = $_GET["user_email"];
$pass = $_GET["user_password"];
//$age = $_POST["user_age"];
$age = $_GET["user_birth"];
$country = $_GET["user_country"];

$servername = "localhost";
$username = "tirth";
$password = "tirth";
$dbname = "Project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$sql = "INSERT INTO user_detail (name,password,age,country,email)
              VALUES ('$name','$pass','$age','$country','$email')";


if ($conn->query($sql) === true) {
    echo ' <script type="text/javascript">document.location.href="../HTML/login.html"</script> ';
} else {
    echo "ErroR Inserting tabel" . $conn->error;
}

?>