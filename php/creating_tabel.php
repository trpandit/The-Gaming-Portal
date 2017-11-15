<?php

$servername = "localhost";
$username = "tirth";
$password = "tirth";
$dbname = "firstDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$sql = "CREATE TABLE Reg 
            (
              id INT(6)     UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
              firstname     VARCHAR(30) NOT NULL,
              lastname      VARCHAR(30) NOT NULL,
              email         VARCHAR(50),
              reg_date      TIMESTAMP
            )";

if ($conn->query($sql) === true) {
    echo "Tabel Reg Created";
} else {
    echo "ErroR Creating tabel" . $conn->error;
}

?>