<?php

$imgSrc = $_GET['myImage'];

require_once '\htdocs\include\database.php';

    $sql="UPDATE products
               SET name_product   ='$nameProduct',
                      id_category ='$idCategory',
                            price ='$price',
                           imgSrc ='$imgSrc'                                     
            WHERE id_product = '$id';";

      $result = mysqli_query($conn,$sql);

