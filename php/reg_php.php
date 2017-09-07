<?php

$name = $_POST["user_name"];
$email = $_POST["user_email"];
$pass = $_POST["user_password"];
$age = $_POST["user_age"];
$dob = $_POST["user_birth"];
$country = $_POST["user_country"];

$servername = "localhost";
$username = "tirth";
$password = "tirth";
$dbname = "Project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$sql = "INSERT INTO user_detail (name,password,age,dob,country,email)
              VALUES ('$name', '$pass','$age','$dob' ,'$country','$email')";

if ($conn->query($sql) === true) {
    echo ' <script type="text/javascript">document.location.href="HTML/login.html"</script> ';
} else {
    echo "ErroR Inserting tabel" . $conn->error;
}

?>