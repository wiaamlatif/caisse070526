<?php

require_once 'database.php';

$sql = "SELECT * FROM users
        WHERE id_user=2;";


$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

echo "<pre>";
var_dump($user);
echo "</pre>";


