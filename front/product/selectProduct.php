<?php
    session_start();

    if(isset($_GET['idProduct'])){
        $currentIdProduct = $_GET['idProduct'];
        $_SESSION['currentIdProduct']=$currentIdProduct;
    }    

    if(isset($_SESSION['currentIdCategory'])){
      $idCategory = $_SESSION['currentIdCategory'];
    }
  
    $toSend = [
                "idCategory" => $idCategory               
               ];

print_r(json_encode($toSend));