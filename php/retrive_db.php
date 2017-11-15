<?php

$db_host = 'localhost';
$db_user = 'tirth';
$db_pass = 'tirth';
$db_name = 'Project';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT id, name, FLOOR(DATEDIFF(CURDATE(),user_detail.dob)/365.25) as age FROM user_detail';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

?>
<html>

<head>
    <title> LeaderBoard </title>
</head>

<body>
<h1><span class="blue">&lt;</span>Table<span class="blue">&gt;</span> <span class="yellow">Responsive</span></h1>
<h2>Created with love by <a href="http://pablogarciafernandez.com" target="_blank">Pablo García Fernández</a></h2>

<table class="container">
    <thead>
    <tr>
        <th><h1>Sites</h1></th>
        <th><h1>Views</h1></th>
        <th><h1>Clicks</h1></th>
        <th><h1>Average</h1></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Google</td>
        <td>9518</td>
        <td>6369</td>
        <td>01:32:50</td>
    </tr>
    <tr>
        <td>Twitter</td>
        <td>7326</td>
        <td>10437</td>
        <td>00:51:22</td>
    </tr>
    <tr>
        <td>Amazon</td>
        <td>4162</td>
        <td>5327</td>
        <td>00:24:34</td>
    </tr>
    <tr>
        <td>LinkedIn</td>
        <td>3654</td>
        <td>2961</td>
        <td>00:12:10</td>
    </tr>
    <tr>
        <td>CodePen</td>
        <td>2002</td>
        <td>4135</td>
        <td>00:46:19</td>
    </tr>
    <tr>
        <td>GitHub</td>
        <td>4623</td>
        <td>3486</td>
        <td>00:31:52</td>
    </tr>
    </tbody>
</table>
</body>

</html>