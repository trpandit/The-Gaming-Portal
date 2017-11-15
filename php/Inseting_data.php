<?php

$servername = "localhost";
$username = "tirth";
$password = "tirth";
$dbname = "firstDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$sql = "INSERT INTO Reg (firstname, lastname, email)
            VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === true) {
    echo "Inserted into Reg ";
} else {
    echo "ErroR Inserting tabel" . $conn->error;
}

?>