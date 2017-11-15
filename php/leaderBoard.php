<?php

$db_host = 'localhost';
$db_user = 'tirth';
$db_pass = 'tirth';
$db_name = 'Project';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT * FROM user_detail JOIN ( SELECT * FROM ( SELECT user_id ,SUM(score) AS total FROM user_game_info GROUP BY user_id) AS T ORDER BY total DESC ) T ON user_detail.id = T.user_id';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

?>
<html>
<head>
    <link href="../css/demo.css" rel="stylesheet">
</head>

<img>

<img src="../img/podium%20(3).png" style="padding-left: 43%">
<h1> Leader Board </h1>


<table class="container">
    <thead>
    <tr>
        <th><h3>Name</h3></th>
        <th><h3>Score</h3></th>
        <th><h3>Country</h3></th>
        <th><h3>Age</h3></th>
    </tr>
    </thead>

    <tbody>
    <?php

    while ($row = mysqli_fetch_array($query)) {
        echo '<tr>
					<td>' . $row['name'] . '</td>
					<td>' . $row['total'] . '</td>
					<td>' . $row['country'] . '</td>
					<td>' . $row['age'] . '</td>
				</tr>';
    }
    ?>

    </tbody>

</table>
</body>
</html>
