<?php

session_start();

if(isset($_GET['idTicket'])){

  $idTicket=$_GET['idTicket'];

}

if(isset($_SESSION['currentIdUser'])){

    $idUser=$_SESSION['currentIdUser'];
    
}

$idUser = $_SESSION['User']['id_user'];



require_once "\htdocs\include\database.php";

//>> Get produits       
$sql = "DELETE FROM `lignes_ticket` 
        WHERE `id_ticket`=$idTicket;";

$result = mysqli_query($conn, $sql);

$sql=" UPDATE  `tickets`
          SET   total_ticket = 0
        WHERE   id_ticket   = $idTicket;";

$result = mysqli_query($conn, $sql);


$toSend = [          
           "idEmployee" => $idEmployee,
             "idTicket" => $idTicket
          ];

print_r(json_encode($toSend));

?>                                        
