<?php // require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php

$id = $_GET['id'];

require_once "C:\htdocs\include\database.php";

$sql = "DELETE FROM categories
         WHERE id_category=$id;";

$result = mysqli_query($conn, $sql); 

//Redirection
header('location:index.php');




